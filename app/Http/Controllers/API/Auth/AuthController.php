<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// Model
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if($user->password ===  $password)
        {
            $token = Str::random(40);

            $user->update([
                'api_token' => $token
            ]);

            return response()->json([
                'pesan' => 'Berhasil Melakukan Login',
                'token' => $token,
                'data' => $user
            ]);
            
        }else{
            return response()->json([
                'pesan' => 'Login gagal',
                'data' => ''
            ]);
        }
    }

    public function register(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'level' => 'pelanggan',
            'api_token' => 'initoken',
            'status' => 1,
            'relasi' => $request->input('relasi')
        ];

        $user = User::create($data);

        return response()->json($user);
    }
}
