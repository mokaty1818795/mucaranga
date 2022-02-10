<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            'students' => Student::count(),
            'administrators' => Role::with('users')->where('name','root')->first()->users->count(),
            'intructors' => Role::with('users')->where('name','default')->first()->users->count(),
            'employees' => Role::with('users')->where('name','funcionario')->first()->users->count()
        ]);
    }

    public function profile()
    {
        return view('dashboard.profile')->with('user',auth()->user());
    }
}
