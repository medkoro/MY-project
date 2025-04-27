<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
=======
use App\Models\User;
use Illuminate\Http\Request;
>>>>>>> 5b49e6a373a032417f723546d5a545cedb7ebf06

class UserController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $users = User::latest()->paginate(10);
=======
        $users = User::all();
>>>>>>> 5b49e6a373a032417f723546d5a545cedb7ebf06
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'is_admin' => ['boolean'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin'),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
=======
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
>>>>>>> 5b49e6a373a032417f723546d5a545cedb7ebf06
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
<<<<<<< HEAD
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'is_admin' => ['boolean'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->has('is_admin'),
        ];

        if ($request->filled('password')) {
            $request->validate([
                'password' => ['confirmed', Rules\Password::defaults()],
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
=======
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
>>>>>>> 5b49e6a373a032417f723546d5a545cedb7ebf06
    }

    public function destroy(User $user)
    {
<<<<<<< HEAD
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'You cannot delete your own account');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
=======
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
} 
>>>>>>> 5b49e6a373a032417f723546d5a545cedb7ebf06
