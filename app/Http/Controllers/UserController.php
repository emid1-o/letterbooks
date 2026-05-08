<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        
        $users = User::where('name', 'like', "%{$query}%")
                     ->where('id', '!=', auth()->id())
                     ->get();

        return view('users.search', compact('users', 'query'));
    }

    public function show(User $user)
    {
        $books = $user->bookLogs()->withCount('likes')->orderByDesc('read_date')->get();
        return view('users.show', compact('user', 'books'));
    }
}