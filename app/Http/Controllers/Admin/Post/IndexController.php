<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tags;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
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
        try {
            $data = $request->validated();

            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            $data['preview_image'] = Storage::put('/images', $data['preview_image']);
            $data['main_image'] = Storage::put('/images', $data['main_image']);

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);

        } catch (\Exception $exception) {
            abort(404);
        }

        return redirect()->route('admin.post.index');
    }

    public function show(Post $post): View
    {

        return view('admin.post.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        return view('admin.post.edit', compact('post'));
    }

    public function update(UpdateRequest $request, Post $post): View
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
