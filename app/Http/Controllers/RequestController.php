<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function queryString(Request $request)
    {
        $keyword = "未設定";
        if ($request->has($keyword)){
        $keyword = $request -> keyword;
        }
        return 'キーワードは'.$keyword."です。";
    }
}
