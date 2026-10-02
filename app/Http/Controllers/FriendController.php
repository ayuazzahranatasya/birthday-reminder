<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $friends = Friend::latest()->get();
        return view('friends.index', compact('friends'));
    }

    public function create()
    {
        return view('friends.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'nullable|string',
            'email'    => 'nullable|email',
            'birthday' => 'required|date',
            'photo'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $path;
        }

        Friend::create($validated);

        return redirect()->route('friends.index')
            ->with('success', 'Teman berhasil ditambahkan!');
    }
}