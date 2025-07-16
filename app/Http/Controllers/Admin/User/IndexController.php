<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.user.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        User::firstOrCreate(['email' => $data['email']], $data);

        return redirect()->route('admin.user.index');
    }

    public function show(User $user): View
    {

        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user): View
    {
        // $data = $request->validated();
        // User::update($data);

        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return view('admin.user.show', compact('user'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.user.index');
    }
}
