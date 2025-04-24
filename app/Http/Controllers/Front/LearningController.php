<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;

class LearningController extends Controller
{
    public function index()
    {
        $categories = Category::with('contents')->get();
        return view('front.home', compact('categories'));
    }

    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->with('contents')->firstOrFail();
        return view('front.category', compact('category'));
    }

    public function showContent(Content $content)
    {
        return view('front.content', compact('content'));
    }
}