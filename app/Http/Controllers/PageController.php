<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View; // Add this

class PageController extends Controller
{
    /**
     * Display all categories on the homepage.
     */
    public function index(): View // Add method
    {
        $categories = Category::orderBy('name')->get();
        return view('index', compact('categories'));
    }

    /**
     * Display content for a specific category.
     */
    public function showCategory(Category $category): View // Add method
    {
        // Eager load contents to avoid N+1 problem
        $category->load('contents');
        return view('category', compact('category'));
    }
}
