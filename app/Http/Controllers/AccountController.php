<?php

namespace App\Http\Controllers;

use App\Ais;
use App\Ais_Ponuky;
use App\Firma;
use App\Firma_Files;
use App\kontakt_osoba;
use App\Kraj;
use App\Krajina;
use App\Ponuky;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AccountController extends Controller
{
    public function register(Request $request){
        $Firma = new Firma();

        $Firma->email=$request->email;
        $Firma->heslo=Hash::make($request->heslo);
        $Firma->nazov=$request->nazov;
        $Firma->ico=$request->ico;
        $Firma->informacie=$request->info;
        $Firma->krajina_id=$request->krajina_id;
        $Firma->kraj_id=$request->kraj_id;
        $Firma->mesto=$request->mesto;
        $Firma->psc=$request->psc;
        $Firma->ulica=$request->ulica;
        $Firma->tel=$request->tel;
        $Firma->web=$request->web;
        $Firma->api_token=sha1(time());
        $Firma->rola_id=4;
        $Firma->save();

        $K_osoba=new kontakt_osoba;
        $K_osoba->meno=$request->osoba_meno;
        $K_osoba->priezvisko=$request->osoba_priezvisko;
        $K_osoba->tel=$request->osoba_tel;
        $K_osoba->email=$request->osoba_email;
        $ORG_Osoba=Firma::where("email", "=", $Firma->email)->pluck('id');
        $K_osoba->firma_id=$ORG_Osoba[0];

        $K_osoba->save();


        return response()->json(['message'=>'Succesfully Added']);

    }

    public function profil(Request $request){
        //Acces as Admin
        if($request->krajina_id==null){
            $request=Firma::where('id',$request->id)->first();
        }

        $Image=Firma_Files::where('firma_id',$request->id)->where('isProfile', true)->first();
        if($Image == null){
            $Image = new Firma_Files();
            $Image->id=0;
            $Image->file_URL="../assets/user.png";
            $Image->file="user.png";
            $Image->isProfile=true;
            $Image->firma_id=$request->id;
        }

        $PP=Firma_Files::where('firma_id',$request->id)->where('isProfile', false)->first();
        if($PP == null){
            $PP = new Firma_Files();
            $PP->id=0;
            $PP->file_URL=" ";
            $PP->file="NO_PP";
            $PP->isProfile=false;
            $PP->firma_id=$request->id;
        }

        $Krajina=Krajina::where('id',$request->krajina_id)->get();
        $Kraj=Kraj::where('id',$request->kraj_id)->get();

        $Cont_Osoba=kontakt_osoba::where('firma_id',$request->id)->first();


        $Firma_Profil= array(
            "image_URL"=>$Image->file_URL,
            "image"=>$Image->file,
            "pp_URL"=>$PP->file_URL,
            "pp"=>$PP->file
        );


        $Firma=Firma::where('id',$request->id)->first();
        $res['firma']=$Firma;
        $res['firma_profil']=$Firma_Profil;
        $res['image']=$Image;
        $res['pp']=$PP;
        $res['krajina']=$Krajina;
        $res['kraj']=$Kraj;
        $res['Cont_Osoba']=$Cont_Osoba;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Edit_Firma_profil(Request $request){
        $Krajiny=Krajina::all();
        $Kraj=Kraj::all();

        $res['kraj']=$Kraj;
        $res['krajiny']=$Krajiny;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Update_Firma_profil(Request $request){

        //Image
        if ($request->hasFile('image')) {
            $imagename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('../storage/firma/',$imagename);

            //Remove Old Photo
            $Firma_Files=Firma_Files::where('firma_id',$request['userid'])->where('isProfile', true)->first();
            if($Firma_Files != null) {
                if (File::exists("../../backend/storage/firma/$Firma_Files->file")) {
                    File::delete("../../backend/storage/firma/$Firma_Files->file");
                    $Firma_Files::where('firma_id', $request['userid'])->where('isProfile', true)->delete();
                }
            }

            //Upload new Photo
            $Firma_Image=new Firma_Files();
            $Firma_Image->file_URL="backend/storage/firma/$imagename";
            $Firma_Image->file=$imagename;
            $Firma_Image->isProfile=true;
            $Firma_Image->firma_id=$request['userid'];
            $Firma_Image->save();


        }else{
            $Firma_Image=Firma_Files::where('firma_id',$request['userid'])->where('isProfile', true)->first();
        }

        //PP
        $Firma_PP=new Firma_Files();
        if ($request->hasFile('pp')) {
            $ppName = $request->file('pp')->getClientOriginalName();
            $request->file('pp')->move('../storage/firma/',$ppName);

            //Remove Old PP
            $Firma_Files_PP=Firma_Files::where('firma_id',$request['userid'])->where('isProfile', false)->first();
            if($Firma_Files_PP != null) {
                if (File::exists("../../backend/storage/firma/$Firma_Files_PP->file")) {
                    File::delete("../../backend/storage/firma/$Firma_Files_PP->file");
                    Firma_Files::where('firma_id', $request['userid'])->where('isProfile', false)->delete();
                }
            }

            //Upload new PDF
            $Firma_PP->file_URL="backend/storage/firma/$ppName";
            $Firma_PP->file=$ppName;
            $Firma_PP->isProfile=false;
            $Firma_PP->firma_id=$request['userid'];
            $Firma_PP->save();


        }else{
            $Firma_PP=Firma_Files::where('firma_id',$request['userid'])->where('isProfile', false)->first();
        }

            $Firma_Profil = array(
                "image_URL" => $Firma_Image->file_URL,
                "image" => $Firma_Image->file,
                "pp_URL" => $Firma_PP->file_URL,
                "pp" => $Firma_PP->file
            );
            $res['firma_profil']=$Firma_Profil;



        //Update Firma
        $Firma=Firma::where('id',$request['userid'])->first();
        $Firma->update([
            "email"=>$request['email'],
            "ico"=>$request['ico'],
            "informacie"=>$request['info'],
            "krajina_id"=>$request['krajina'],
            "kraj_id"=>$request['kraj'],
            "mesto"=>$request['mesto'],
            "psc"=>$request['psc'],
            "ulica"=>$request['ulica'],
            "tel"=>$request['tel'],
            "web"=>$request['web'],
        ]);

        //Update Kontaktná Osoba
        //Update Firma
        $Cont_Osoba=kontakt_osoba::where('firma_id',$request['userid'])->first();
        $Cont_Osoba->update([
            "meno"=>$request['CO_meno'],
            "priezvisko"=>$request['CO_priezvisko'],
            "tel"=>$request['CO_tel'],
            "email"=>$request['CO_email'],
        ]);

        $Krajina=Krajina::where('id',$Firma->krajina_id)->get();
        $Kraj=Kraj::where('id',$Firma->kraj_id)->get();


        $res['krajina']=$Krajina;
        $res['kraj']=$Kraj;
        $res['firma']=$Firma;
        $res['Cont_Osoba']=$Cont_Osoba;
        $res['message']="Profil Succesfully Updated";
        $res['success']=true;

        return  response()->json($res);


    }

    public function Firma_ponuky(Request $request){
        $Ponuky=Ponuky::where('firma_id',$request->id)->get();

        $res['Ponuky']=$Ponuky;
        $res['success']=true;

        return  response()->json($res);
    }

    public function Show_Student_Profil(Request $request){
        $Student=Ais::where('id',$request->ais_id)->first();


        $res['Student']=$Student;
        $res['success']=true;

        return  response()->json($res);
    }

    public function Show_Komentare(Request $request){
        $Ponuky=Ponuky::where('firma_id',$request->id)->where("je_aktualna",false)->get();

        $Komentare=collect([]);
        foreach ($Ponuky as $P){
            $Absolvovane_Ponuky=Ais_Ponuky::where('ponuka_id',$P->id)->where("komentar_schvaleny",true)->get();
            foreach ($Absolvovane_Ponuky as $AP){
                $Student=Ais::where('id',$AP->ais_id)->first();
                $Komentar=array(
                    "id"=>$AP->id,
                    "Student_Meno"=>$Student->meno,
                    "Student_Priezvisko"=>$Student->priezvisko,
                    "Komentar"=>$AP->komentar,
                    "Hodnotenie"=>$AP->hodnotenie,
                );
                $Komentare->push($Komentar);
            }
        }


        $res['komentare']=$Komentare;
        $res['success']=true;

        return  response()->json($res);
    }
}
