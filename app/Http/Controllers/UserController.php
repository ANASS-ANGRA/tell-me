<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\controlle_inscri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\send_validation;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function register(Request $request){
        
          //validate request   
           $this->validate($request,[
                'fake_name'=>'required',
                'name'=>'required',
                'email'=>'required',
               // "pass_v"=>'required',
                'password'=>'required'
            ]);
           // $e=controlle_inscri::whereEmail($request->email)->first();
            //if(isset($e->id)){
              
                    
                    $code=Str::random(6);
                      // create user  
                      $user= new User;
                      $user->fake_name = $request->fake_name;
                      $user->name=$request->name;
                      $user->email=$request->email;
                      $user->code_validation=$code;
                       // hachage cryptographique de password
                      $user->password=Hash::make($request->password);
                      $user->save();
                      $data=[
                        "name"=>$request->name,
                        "name_compte"=>"$request->fake_name",
                        "code"=>$code,
                    ];
                    $email=new send_validation($data);
                    Mail::to($request->email)->send($email);


                     return response()->json(
                        ["message"=>"create compte "]
                    ); 
                  
            //}else{
            //    return response()->json(
            //        ["message"=>"le email ne pas email de ista"]
            //    );
            //}    
    }

    public function login(Request $request){
        $user=User::whereEmail($request->email)->first();
        if(isset($user->id)){
           if(isset($user->email_verified_at)){
                if(Hash::check($request->password,$user->password)){
                    $token=$user->createToken('auth_token')->plainTextToken;
                    return response()->json([
                        "message"=>"connected",
                        "token"=>$token
                    ]);
               }
               else{
                     return response()->json([
                       "message"=>"password incorrect"
                    ]);
                }
            }else{
                return "vrefie votre email";
            }
            

        }
        else{
            return response()->json([
                "message"=>"email incorrect"
            ]);
        }
    }
    function profile(){
        return auth()->user();
    }
    function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            "message"=>"logout"
        ]);
    }
    function update_password(Request $request){
        $user=User::find(auth()->user()->id);
        $user->password=Hash::make($request->password);
        $user->save();
    }
   public function validation(Request $request){
        $user=User::whereEmail($request->email)->first();
        if($user->code_validation==$request->code){
            $user->email_verified_at = now();
            $user->save();
            return "email_verifie";
        } else{
            return"code validation incorrect";
        } 
   }
    
}
