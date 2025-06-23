<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function show(): View
    {
        return view('admin.categories.index');
    }
    public function create()
    {
        return view('admin.categories.create');
    }
}
