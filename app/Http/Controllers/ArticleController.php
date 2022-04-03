<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $data = [
            ["name"=>"zaw", "title"=>"one"],
            ["name"=>"kyaw", "title"=>"two"],
        ];

        return view('articles.index', [
            'articles' => $data
        ]);
    }
}
