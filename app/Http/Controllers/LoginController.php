<?php

namespace App\Http\Controllers;

use App\Ais;

use App\Fakulty;
use App\Firma;
use App\Kraj;
use App\Krajina;
use App\Student_Program;
use App\Studentske_Programy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request){
        $hasher=app()->make('hash');

        $email=$request->firma_email;
        $heslo=$request->firma_heslo;

        $login=Firma::where('email',$email)->first();
        if(!$login){
            $res['success']=false;
            $res['message']='Incorrect Email or Password';
            return response($res);
        }else{
            if($hasher->check($heslo,$login->heslo)){
                $api_token = sha1(time());
                $create_token=Firma::where('id',$login->id)->update(['api_token'=>$api_token]);
                if($create_token){
                    $login->login_id=null;
                    $res['success']=true;
                    $res['api_token']=$api_token;
                    $res['message']=$login;
                    $res['rola']=$login->rola_id;
                    return  response()->json($res);
                }
            }else{
                $res['success']=false;
                $res['message']='Incorrect Email or Password';
                return response($res);
            }
        }


    }

    public function loginAis(Request $request){
        $hasher=app()->make('hash');

        $id=$request-> student_ID;
        $heslo=$request->student_heslo;

        $login=Ais::where('login_ID',$id)->first();
        if(!$login){
            $res['success']=false;
            $res['message']='Incorrect Email or Password';
            return response($res);
        }else{
            if($hasher->check($heslo,$login->heslo)){
                $api_token = sha1(time());
                $create_token=Ais::where('id',$login->id)->update(['api_token'=>$api_token]);
                if($create_token){
                    if($login->rola_id==1) {
                        $Krajina = Krajina::where('id', $login->krajina_id)->get();
                        $Kraj = Kraj::where("id", $login->kraj_id)->get();
                        $login->krajina_id = $Krajina[0]->nazov;
                        $login->kraj_id = $Kraj[0]->nazov;
                    }
                    $res['success']=true;
                    $res['api_token']=$api_token;
                    $res['message']=$login;
                    $res['rola']=$login->rola_id;
                    return  response()->json($res);

                }
            }else{
                $res['success']=false;
                $res['message']='Incorrect Email or Password';
                return response($res);
            }
        }


    }
    public function logout(Request $request){
        return  response()->json(['message'=>'Succesfully Logout']);
    }
}
