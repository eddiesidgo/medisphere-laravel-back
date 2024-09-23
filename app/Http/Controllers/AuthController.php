<?php

namespace App\Http\Controllers;

use \stdClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6', // 'confirmed' comprueba que password y password_confirmation coincidan
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encriptar la contraseña
        ]);

        return response()->json([
            'data' => $user,
            'token' => $user->createToken('api-key')->plainTextToken
        ], 200);
        

        // $validator = Validator::make($request->all(), [
        //     'name' =>'required|string|max:255',
        //     'email' =>'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 401);
        // }

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // $token = $user->createToken('authToken')->plainTextToken;

        // // $response = new stdClass();
        // // $response->user = $user;
        // // $response->token = $token;

        // return response()
        //     ->json(['data' => $user,'access_token' => $token,'token_type' => 'Bearer']);
    }


    public function login(Request $request)
    {
        // Validar solo que el email sea válido y que ambos campos estén presentes
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()
            ], 400);
        } else {
            // Intentar autenticar al usuario
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Autenticación exitosa
                $user = Auth::user(); // Obtener el usuario autenticado

                // Crea una respuesta JSON que se enviará al cliente
                return response()->json([
                    // Incluye los datos del usuario autenticado en la respuesta
                    'data' => $user,

                    // Genera un nuevo token de autenticación para el usuario
                    // 'api-key' es un nombre descriptivo para el token
                    'token' => $user->createToken('api-key')->plainTextToken
                ], 200); // 200 indica que la respuesta es exitosa

            } else {
                // Si la autenticación falla
                return response()->json([
                    'code' => 401,
                    'message' => 'Usuario no autorizado'
                ], 401);
            }
        }

        // {
        //     if (!Auth::attempt($request->only('email', 'password')))
        //     {
        //         return response()->json(['error' => 'Unauthorized'], 401);
        //     }
    
        //     $user = User::where('email', $request['email'])->firstOrFail();
        //     $token = $user->createToken('authToken')->plainTextToken;
    
        //     return response()
        //         ->json(['message' => 'Hi '.$user->name,'access_token' => $token,'token_type' => 'Bearer','data'=>$user]);
    
        // }
    
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out successfully'
        ];
    }
}
