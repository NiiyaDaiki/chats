<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\UserIcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserIconsController extends Controller
{
    public function upload(Request $request)
    {
        $userIcon = new UserIcon();
        //s3アップロード開始
        $image = $request->file('file');
        // バケットの`images`フォルダへアップロード
        $path = Storage::disk('s3')->put('/images', $image, 'public');
        // アップロードした画像のフルパスを取得
        $userIcon->image_path = Storage::url($path);
        $user = User::where('id', auth()->id())->first();
        $userIcon->user_id = $user->id;

        $userIcon->save();

        return response(null, 200);
    }
}
