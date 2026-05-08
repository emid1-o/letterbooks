<?php

namespace App\Http\Controllers;

use App\Models\BookLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookLogController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $goal = $user->reading_goal ?? 12;
        
        $booksReadThisYear = BookLog::where('user_id', $user->id)
            ->whereYear('read_date', date('Y'))
            ->count();

        $percentage = ($goal > 0) ? ($booksReadThisYear / $goal) * 100 : 0;
        $percentage = min($percentage, 100);

        $books = BookLog::where('user_id', $user->id)
            ->orderBy('read_date', 'desc')
            ->get();

        return view('booklogs.index', compact('books', 'booksReadThisYear', 'goal', 'percentage'));
    }

    public function updateGoal(Request $request)
    {
        $request->validate([
            'reading_goal' => 'required|integer|min:1|max:999'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $user->reading_goal = $request->reading_goal;
        $user->save();

        return back()->with('success', 'Meta atualizada!');
    }

    public function all()
    {
        $books = BookLog::where('user_id', Auth::id())->orderByDesc('read_date')->get();
        return view('booklogs.all', compact('books'));
    }

    public function create()
    {
        return view('booklogs.create');
    }

    public function update(Request $request, BookLog $booklog)
    {
        if ($booklog->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'rating' => 'nullable|integer|min:1|max:5',
            'review' => 'nullable|string',
            'read_date' => 'nullable|date',
        ]);

        $validated['is_favorite'] = $request->has('is_favorite');

        $booklog->update($validated);

        return redirect()->route('booklogs.index');
    }

    public function edit(BookLog $booklog)
    {
        if ($booklog->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('booklogs.edit', compact('booklog'));
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

    public function toggleLike(BookLog $booklog)
    {
        $booklog->likes()->toggle(Auth::id());
        return back();
    }
}