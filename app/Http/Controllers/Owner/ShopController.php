<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        // オーナーが別のオーナーのページを閲覧できなくするための処理
        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('shop'); // shopのid取得
            if (!is_null($id)) {
                $shopsOwnerId = shop::findOrFail($id)->owner->id; // shopのオーナーid、文字列
                $shopId = (int)$shopsOwnerId; // キャスト
                $ownerId = Auth::id(); // ログインオーナーのid
                if ($shopId !== $ownerId) {
                    abort(404); // 404画面表示
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        // $ownerId = Auth::id(); // ログインしているユーザーのidを取得
        $shops = Shop::where('owner_id', Auth::id())->get();

        return view('owner.shops.index', compact('shops'));
    }

    public function edit($id)
    {
        // dd(Shop::findOrFail($id));
        $shop = Shop::findOrFail($id);
        return view('owner.shops.edit', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $imageFile = $request->image;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            Storage::putFile('public/shops', $imageFile);
        }

        return redirect()->route('owner.shops.index');
    }
}
