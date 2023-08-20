<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

// use Illuminate\Foundation\Auth\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    
    public function index(){

    
        function rocity(){

            $api_key = 'c94dcd12b8b3fd72d036803317f4e88b';

            $response = Http::withHeaders(['key'=> $api_key])->get('https://api.rajaongkir.com/starter/city');
    
            $result = collect($response->json())['rajaongkir']['results'];
            return $result;
        }
    


       


        return view('register.register', [
            'title' => 'Register',
            'active' => 'register',
            'kota' => rocity()
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|max:255',
            'no_telp' => '',
            'no_rekening' => '',
            'gender' => 'in:Male,Female',
            'tgl_lahir'=> '',
            'alamat' => '',
            'kecamatan' => '',
            'kota' =>'',
            'kode_pos'=>'',
            'kota_id' => ''
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }


    public function rajaOngkirCity() {

        $api_key = 'c94dcd12b8b3fd72d036803317f4e88b';

        $response = Http::withHeaders(['key'=> $api_key])->get('https://api.rajaongkir.com/starter/province');

        $result = collect($response->json())['rajaongkir']['results'];

        dd($result);

        return $result;



        
    }
}
