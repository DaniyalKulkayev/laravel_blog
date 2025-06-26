<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tags\StoreRequest;
use App\Http\Requests\Admin\Tags\UpdateRequest;
use App\Models\Tags;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class IndexController extends Controller
{
    public function index(): View
    {
        $tags = Tags::all();

        return view('admin.tag.index', compact('tags'));
    }

    public function create(): View
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Tags::firstOrCreate($data);

        return redirect()->route('admin.tag.index');
    }

    public function show(Tags $tag): View
    {

        return view('admin.tag.show', compact('tag'));
    }

    public function edit(Tags $tag): View
    {

        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tags $tag): View
    {
        $data = $request->validated();
        $tag->update($data);

        return view('admin.tag.show', compact('tag'));
    }

    public function destroy(Tags $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('admin.tag.index');
    }
}
