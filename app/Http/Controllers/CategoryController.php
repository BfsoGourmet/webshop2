<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Models\category;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;

class CategoryController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $categories = category::paginate(15);
        return view('categories.index', ['categories' => $categories]);
    }
}
