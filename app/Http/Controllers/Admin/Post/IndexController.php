<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class IndexController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.post.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Post::firstOrCreate($data);

        return redirect()->route('admin.post.index');
    }

    public function show(Post $post): View
    {

        return view('admin.post.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        // $data = $request->validated();
        // Category::update($data);

        return view('admin.post.edit', compact('post'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);

        return view('admin.post.show', compact('post'));
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.post.index');
    }
}
