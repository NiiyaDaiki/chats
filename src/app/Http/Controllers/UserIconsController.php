<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserIconResource;
use App\User;
use App\Models\UserIcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Events\FriendIconEvent;
use Mtownsend\RemoveBg\RemoveBg;



class UserIconsController extends Controller
{
    public function upload(Request $request)
    {
        // バリデーション
        // Validator::make($request->all(), [
        //     'image' => 'file|image|max:1024|required'
        // ])->validate();

        $userIcon = new UserIcon();
        //s3アップロード開始
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        // 保存先は"storage/app/public/image"
        // ファイル名は自動で割り振られる
        $up_pass = $file->store('public/image');
        $image_pass = '/var/www/storage/app/public/image/' . basename($up_pass);

        // Image::make($image_pass)
        //     ->resize(72, 72, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->greyscale()->save();

        // 画像の2値化
        $imagick = new \Imagick($image_pass);
        $imagick->thresholdImage('32000');

        // 画像を縦横72px・縦幅アスペクト比維持の自動サイズへリサイズ
        $imagick->thumbnailImage(72,72);

        // // 画像の切り抜き(外部API(remove.bg)を使用)
        $api_key = 'SreXhaL18UoakKbGmJbNHASn';
        $removebg = new RemoveBg($api_key);
        $removebg->file($file->path())->save($image_pass);

        // // バケットの`images`フォルダへアップロード
        $fixedImage = Image::make($image_pass)->encode();
        Storage::disk('s3')->put('/images//' . $fileName, $fixedImage, 'public');
        // // アップロードした画像のフルパスを取得
        $userIcon->image_path = Storage::cloud()->url($fileName);
        $user = User::where('id', auth()->id())->first();
        $userIcon->user_id = $user->id;

        $userIcon->save();
        // broadcast(new FriendIconEvent($userIcon));
        return response(null, 200);
    }

    public function get(int $id)
    {
        if (UserIcon::where('user_id', $id)->count()) {
            $userIcon = UserIcon::where('user_id', $id)->first();
            return response(new UserIconResource($userIcon), 200);
        } else {
            return response('画像データがありません', 201);
        }
    }
}
