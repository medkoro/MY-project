<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Content;
use App\Models\Game;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'users' => [
                'total' => User::count(),
                'active' => User::where('last_login_at', '>=', now()->subDays(30))->count(),
                'new' => User::where('created_at', '>=', now()->subDays(7))->count(),
            ],
            'games' => [
                'total' => Game::count(),
                'active' => Game::where('is_active', true)->count(),
                'plays' => Game::sum('play_count'),
            ],
            'content' => [
                'total' => Content::count(),
                'published' => Content::where('status', 'published')->count(),
                'draft' => Content::where('status', 'draft')->count(),
            ],
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function storeContent(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
        ]);

        Content::create($validated);

        return redirect()->back()->with('success', 'Content created successfully');
    }

    public function updateContent(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
        ]);

        $content = Content::findOrFail($id);
        $content->update($validated);

        return redirect()->back()->with('success', 'Content updated successfully');
    }

    public function deleteContent($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->back()->with('success', 'Content deleted successfully');
    }
}