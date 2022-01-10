<?php

namespace App\Http\Controllers;

use App\ClassLecturer;
use App\lecturer;
use App\Role;
use app\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddAdminController extends Controller
{
    public function index()
    {
        return view('admin.add_admin');
    }

    protected function create(array $data)
    {
        $user = User::create([
            'nim' => $data['nim'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user
            ->roles()
            ->attach(Role::where('name', 'admin')->first());

        return $user;

    }



}
