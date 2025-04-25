<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::orderBy('created_at', 'desc')->get();
        return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'url' => 'required|string',
            'is_active' => 'sometimes|boolean',
        ]);

        $game = new Game();
        $game->title = $validated['title'];
        $game->description = $validated['description'];
        $game->url = $validated['url'];
        $game->is_active = $request->has('is_active');

        if ($request->hasFile('image')) {
            $game->image_path = $request->file('image')->store('game_images', 'public');
        }

        $game->save();

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Created game: ' . $game->title,
        ]);

        return redirect()->route('admin.games.index')
            ->with('success', 'Game created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('admin.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'url' => 'required|string',
            'is_active' => 'sometimes|boolean',
        ]);

        $game->title = $validated['title'];
        $game->description = $validated['description'];
        $game->url = $validated['url'];
        $game->is_active = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($game->image_path) {
                Storage::disk('public')->delete($game->image_path);
            }
            $game->image_path = $request->file('image')->store('game_images', 'public');
        }

        $game->save();

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Updated game: ' . $game->title,
        ]);

        return redirect()->route('admin.games.index')
            ->with('success', 'Game updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        // Delete image if exists
        if ($game->image_path) {
            Storage::disk('public')->delete($game->image_path);
        }

        $gameTitle = $game->title;
        $game->delete();

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Deleted game: ' . $gameTitle,
        ]);

        return redirect()->route('admin.games.index')
            ->with('success', 'Game deleted successfully');
    }
}
