<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::with('category')->get();
        return view('admin.contents.index', compact('contents'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.contents.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio' => 'nullable|mimes:mp3,wav|max:5120',
            'video' => 'nullable|mimes:mp4,mov,ogg|max:10240',
        ]);

        $content = new Content();
        $content->fill($validated);

        if ($request->hasFile('image')) {
            $content->image_path = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('audio')) {
            $content->audio_path = $request->file('audio')->store('audio', 'public');
        }

        if ($request->hasFile('video')) {
            $content->video_path = $request->file('video')->store('video', 'public');
        }

        $content->save();

        return redirect()->route('admin.contents.index')
            ->with('success', 'Content created successfully.');
    }

    public function show(Content $content)
    {
        return view('admin.contents.show', compact('content'));
    }

    public function edit(Content $content)
    {
        $categories = Category::all();
        return view('admin.contents.edit', compact('content', 'categories'));
    }

    public function update(Request $request, Content $content)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio' => 'nullable|mimes:mp3,wav|max:5120',
            'video' => 'nullable|mimes:mp4,mov,ogg|max:10240',
        ]);

        $content->fill($validated);

        if ($request->hasFile('image')) {
            if ($content->image_path) {
                Storage::disk('public')->delete($content->image_path);
            }
            $content->image_path = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('audio')) {
            if ($content->audio_path) {
                Storage::disk('public')->delete($content->audio_path);
            }
            $content->audio_path = $request->file('audio')->store('audio', 'public');
        }

        if ($request->hasFile('video')) {
            if ($content->video_path) {
                Storage::disk('public')->delete($content->video_path);
            }
            $content->video_path = $request->file('video')->store('video', 'public');
        }

        $content->save();

        return redirect()->route('admin.contents.index')
            ->with('success', 'Content updated successfully');
    }

    public function destroy(Content $content)
    {
        if ($content->image_path) {
            Storage::disk('public')->delete($content->image_path);
        }
        if ($content->audio_path) {
            Storage::disk('public')->delete($content->audio_path);
        }
        if ($content->video_path) {
            Storage::disk('public')->delete($content->video_path);
        }

        $content->delete();

        return redirect()->route('admin.contents.index')
            ->with('success', 'Content deleted successfully');
    }
}