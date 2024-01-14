<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display a listing of the users
    public function index(string $mentionName)
    {
        return view("user");
    }

    // Show the form for creating a new user
    public function create()
    {
        
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            // Add other validation rules as needed
        ]);

        // Create the user
        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    // Display the specified user
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    // Update the specified user in the database
    public function update(Request $request, User $user)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // Add other validation rules as needed
        ]);

        // Update the user
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    // Remove the specified user from the database
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
