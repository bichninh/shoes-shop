<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function show(){
        $categories = Category::panigate(10);
        $viewData=[
         'categories' =>$categories

        ];

        return view('admin.category');

    }
}
