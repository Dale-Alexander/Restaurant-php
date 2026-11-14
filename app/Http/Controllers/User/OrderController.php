<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function store(Request $request) : RedirectResponse {
        $validated = $request.validate([
            
        ]);
    }
}
