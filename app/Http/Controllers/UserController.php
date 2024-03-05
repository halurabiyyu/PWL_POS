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
        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data);

        // // SELECT DATA 
        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        // Jobsheet 4 
        // $data = [
        //     'level_id' => 2, 
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345'),
        // ];
        // UserModel::create($data);

        // $user = UserModel::all();
        // return view('user', ['data' => $user]);


        // JOBSHEET 4 Praktikum 2.1
        // $user = UserModel::find(1);
        // return view('user', ['data' => $user]);

        // $user = UserModel::where('level_id', 1)->first();
        // return view('user', ['data'=> $user]);
        
        // $user = UserModel::firstWhere('level_id', 1);
        // return view('user', ['data'=> $user]);

        // $user = UserModel::findOr(1, ['username', 'nama'], function(){
        //     abort(404);
        // });
        // return view('user', ['data'=> $user]);
        
        $user = UserModel::findOr(20, ['username', 'nama'], function(){
            abort(404);
        });
        return view('user', ['data'=> $user]);
    }
}
