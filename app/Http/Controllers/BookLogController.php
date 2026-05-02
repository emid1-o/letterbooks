<?php

namespace App\Http\Controllers;

use App\Models\BookLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookLogController extends Controller
{
    public function index()
    {
        $books = BookLog::where('user_id', Auth::id())->orderByDesc('read_date')->get();
        return view('booklogs.index', compact('books'));
    }

    public function create()
    {
        return view('booklogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'cover_url' => 'nullable|url',
            'rating' => 'nullable|integer|min:1|max:5',
            'review' => 'nullable|string',
            'read_date' => 'nullable|date',
        ]);
        $validated['is_favorite'] = $request->has('is_favorite');
        $validated['user_id'] = Auth::id();
        BookLog::create($validated);

        return redirect()->route('booklogs.index');
    }

    public function destroy(BookLog $booklog)
    {
        if ($booklog->user_id === Auth::id()) {
            $booklog->delete();
        }
        return redirect()->route('booklogs.index');
    }
}