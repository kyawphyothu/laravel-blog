<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $data = Article::all();

        return view('articles.index', [
            'articles' => $data
        ]);
    }
}
