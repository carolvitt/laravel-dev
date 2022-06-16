<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;

class ApiController extends Controller
{
    use HasApiTokens; 

    /**
     * Validates login and return
     * inscriptions data
     */

    public function login(Request $request) {

        $credencials = $request->only('email', 'password');
       
        $data = User::select('name','email')
                     ->where('email','=', $credencials['email'])
                     ->get();
        
        if(!auth()->attempt($credencials)) 
            abort(401, 'Credenciais inválidas.');

        $token = auth()->user()->createToken($credencials);

        
        return response()->json([
                'data' => $data,
                'token' => $token->plainTextToken,
                'inscriptions' => [
                    $this->getInscriptions($credencials)
                ]
        ]);

    }

    /**
     * Get inscriptions data from database
     */

    public function getInscriptions($credencials) {
        // return $credencials;
        try {
            $validate = Inscription::select('uni.*','u.name','u.email')
                                    ->join('users as u','inscriptions.user_id','=','u.id')
                                    ->join('universities as uni','inscriptions.university_id','=','uni.id')
                                    ->where('u.email','=',$credencials)
                                    ->get();
          
            if($validate) {
                return $validate;
            } else {
                return response()->json([
                    "message" => "Inscrição não encontrada."
                ]);
            }
        } catch (\Exception $e){

            return response()->json([
                'erro' => $e->getMessage()
            ]);

        }
    }
}
