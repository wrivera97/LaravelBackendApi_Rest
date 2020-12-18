<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{

    public function _construct(){}

    /*public function getUsers()
    {
    $data = User::select(
        'name',
        'dni',
        'country',
        'address',
        'email')->orderby('id')->get();
    return response()->json(['found' => $data],  200);
    }*/
    public function postUser(Request $request){
    $data=$request->json()->all();
    $dataUser=$data['user'];
    $user= User::create([
        'name'=>$dataUser['name'],
        'email'=>$dataUser['email'],
        'password'=> Hash::Make( $dataUser [ 'password']),//encrypt pass
        'address'=>$dataUser['address'],
        'dni'=>$dataUser['dni'],
        'country'=>$dataUser['country']
    ]);
    return response()->json(['user'=>$user],200);

    }
}
