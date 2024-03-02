<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// PRAKTIKUM 6 

class UserController extends Controller
{
    public function index(){
        // INSERT DATA 
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => '4',
        // ];
        // UserModel::insert($data);

        // UPDATE DATA 
        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('username', 'customer-1')->update($data);

        // SELECT DATA 
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
