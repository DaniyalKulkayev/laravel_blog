<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tags;
use App\Service\PostService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    protected PostService $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    public function create(): View
    {
        $categories = Category::all();
        $tags = Tags::all();

        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }

    public function show(Post $post): View
    {
        $post->load('tags');
        return view('admin.post.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        $categories = Category::all();
        $tags = Tags::all();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        $this->service->update($data, $post);

        return redirect()->route('admin.post.show', $post->id);
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.post.index');
    }
}
