<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserIconResource;
use App\User;
use App\Models\UserIcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Events\FriendIconEvent;

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

        // 画像を縦横72px・縦幅アスペクト比維持の自動サイズへリサイズ
        $image = Image::make($file)
            ->resize(72, 72, function ($constraint) {
                $constraint->aspectRatio();
            })->greyscale()->limitColors(2);
        // バケットの`images`フォルダへアップロード
        Storage::disk('s3')->put('/images//' . $fileName, $image->encode(), 'public');
        // アップロードした画像のフルパスを取得
        $userIcon->image_path = Storage::cloud()->url($fileName);
        $user = User::where('id', auth()->id())->first();
        $userIcon->user_id = $user->id;

        $userIcon->save();
        broadcast(new FriendIconEvent($userIcon));
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
