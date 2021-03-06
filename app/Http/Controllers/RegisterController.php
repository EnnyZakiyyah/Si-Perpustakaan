<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.sign-up',[
            'title' => 'Sign-Up'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'no_ktp' => 'required|unique:users',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required|email:dns|unique:users',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' =>'required|min:5|max:255',
            'no_tlpn' => 'required',
            'alamat' => 'required',
            'upload_foto' => '',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        
        User::create($validateData);

        // $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/sign-in')->with('success', 'Registration successfull! Please login');
        // dd('berhasil');
    }
}
