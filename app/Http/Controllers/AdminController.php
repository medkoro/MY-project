<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Added for logging
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the content for management.
     */
    public function index(): View
    {
        Log::info('AdminController@index called'); // Add logging
        $contents = Content::with('category')->latest()->paginate(10); // Paginate for better management
        return view('admin.content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function createCategory(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function storeCategory(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($validated);

        return redirect()->route('admin.content.index')->with('success', 'Category created successfully!'); // Redirect to content index or a category list page
    }


    /**
     * Show the form for creating new content.
     */
    public function createContent(): View
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.content.create', compact('categories'));
    }

    /**
     * Store newly created content in storage.
     */
    public function storeContent(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'text' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Example validation rules
            'audio' => 'nullable|file|mimes:mp3,wav,ogg|max:10240', // Example validation rules
            'video' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200', // Example validation rules
        ]);

        $contentData = [
            'category_id' => $validated['category_id'],
            'text' => $validated['text'] ?? null,
        ];

        // Handle file uploads
        if ($request->hasFile('image')) {
            $contentData['image_path'] = $request->file('image')->store('content/images', 'public');
        }
        if ($request->hasFile('audio')) {
            $contentData['audio_path'] = $request->file('audio')->store('content/audio', 'public');
        }
        if ($request->hasFile('video')) {
            $contentData['video_path'] = $request->file('video')->store('content/videos', 'public');
        }

        Content::create($contentData);

        return redirect()->route('admin.content.index')->with('success', 'Content added successfully!');
    }

    /**
     * Show the form for editing the specified content.
     */
    public function editContent(Content $content): View
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.content.edit', compact('content', 'categories'));
    }

    /**
     * Update the specified content in storage.
     */
    public function updateContent(Request $request, Content $content): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'text' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'audio' => 'nullable|file|mimes:mp3,wav,ogg|max:10240',
            'video' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200',
        ]);

        $contentData = [
            'category_id' => $validated['category_id'],
            'text' => $validated['text'] ?? null,
        ];

        // Handle file uploads and deletion of old files if new ones are provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($content->image_path) {
                Storage::disk('public')->delete($content->image_path);
            }
            $contentData['image_path'] = $request->file('image')->store('content/images', 'public');
        }
        if ($request->hasFile('audio')) {
            if ($content->audio_path) {
                Storage::disk('public')->delete($content->audio_path);
            }
            $contentData['audio_path'] = $request->file('audio')->store('content/audio', 'public');
        }
        if ($request->hasFile('video')) {
            if ($content->video_path) {
                Storage::disk('public')->delete($content->video_path);
            }
            $contentData['video_path'] = $request->file('video')->store('content/videos', 'public');
        }

        $content->update($contentData);

        return redirect()->route('admin.content.index')->with('success', 'Content updated successfully!');
    }

    /**
     * Remove the specified content from storage.
     */
    public function destroyContent(Content $content): RedirectResponse
    {
        // Delete associated files first
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

        return redirect()->route('admin.content.index')->with('success', 'Content deleted successfully!');
    }
}
