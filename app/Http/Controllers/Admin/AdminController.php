<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // Middleware closure to restrict to admin users
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
            }
            abort(403, 'Access denied. Admins only.');
        });
    }
    //
    public function index()
    {
        return view('admin.dashboard');
    }
}
