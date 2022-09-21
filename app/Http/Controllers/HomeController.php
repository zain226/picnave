<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $images = Images::take(10)->get();
        return view('home', get_defined_vars());
    }

    public function filter($name)
    {
        $category = Category::where('name',$name)->first();
        $images = Images::where('category_id',$category->id)->take(10)->get();
        return view('front.pages.filter', get_defined_vars());
    }

    public function selectRole()
    {
        return view('front.pages.selectRole', get_defined_vars());
    }
    public function register($type)
    {
        return view('auth.register', get_defined_vars());
    }
}
