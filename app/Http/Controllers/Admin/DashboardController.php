<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Models\Category;
use App\Models\ActivityLog;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'games' => Game::count(),
            'categories' => Category::count(),
        ];

        // Fetch recent activities
        $recentActivities = ActivityLog::with('user')->latest()->take(10)->get();

        return view('admin.dashboard', compact('stats', 'recentActivities'));
    }
} 