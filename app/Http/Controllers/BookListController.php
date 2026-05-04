<?php

namespace App\Http\Controllers;

use App\Models\BookList;
use App\Models\BookLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookListController extends Controller
{
    public function index()
    {
        $lists = BookList::where('user_id', Auth::id())->withCount('bookLogs')->latest()->get();
        return view('booklists.index', compact('lists'));
    }

    public function create()
    {
        $books = BookLog::where('user_id', Auth::id())->orderByDesc('read_date')->get();
        return view('booklists.create', compact('books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'books' => 'nullable|array',
            'books.*' => 'exists:book_logs,id'
        ]);

        $bookList = BookList::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        if (!empty($validated['books'])) {
            $bookList->bookLogs()->attach($validated['books']);
        }

        return redirect()->route('booklists.index');
    }

    public function show(BookList $booklist)
    {
        if ($booklist->user_id !== Auth::id()) {
            abort(403);
        }

        $books = $booklist->bookLogs;
        return view('booklists.show', compact('booklist', 'books'));
    }

    public function destroy(BookList $booklist)
    {
        if ($booklist->user_id === Auth::id()) {
            $booklist->delete();
        }
        return redirect()->route('booklists.index');
    }
}