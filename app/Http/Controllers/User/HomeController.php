<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;

class HomeController extends Controller
{
    public function index(){
        $menu_items = MenuItem::with('category:id,name')->select('category_id', 'name', 'price', 'description', 'imageUrl')->get();
        return view('user.items.index', $menu_items);
    }
}
