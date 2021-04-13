<?php

namespace App\Http\Controllers;

use App\Ais;
use App\Ais_Ponuky;
use App\Firma;
use App\Firma_Files;
use App\Kraj;
use App\Krajina;
use App\Ponuky;
use App\Studentske_Programy;
use App\Zamerania;
use Illuminate\Http\Request;

class PonukyController extends Controller
{
    public function Add_Ponuka_Screen(Request $request){
        $Krajiny=Krajina::all();
        $Kraj=Kraj::all();
        $Programy=Studentske_Programy::all();
        $Zamerania=Zamerania::all();

        $res['kraje']=$Kraj;
        $res['krajiny']=$Krajiny;
        $res['programy']=$Programy;
        $res['zamerania']=$Zamerania;
        $res['success']=true;
        return  response()->json($res);

    }



    public function Add_Ponuka(Request $request){

        $Ponuka=new Ponuky();
        $Ponuka->nazov=$request->ponuka['nazov'];
        $Ponuka->informacie=$request->ponuka['info'];
        $Ponuka->datum_od=$request->ponuka['od'];
        $Ponuka->datum_do=$request->ponuka['do'];
        $Ponuka->mzda=$request->ponuka['mzda'];
        $Ponuka->firma_id=$request->firma['id'];
        $Ponuka->krajina_id=$request->ponuka['krajina_id'];
        $Ponuka->kraj_id=$request->ponuka['kraj_id'];
        $Ponuka->mesto=$request->ponuka['mesto'];
        $Ponuka->program_id=$request->ponuka['obor'];
        $Ponuka->zameranie_id=$request->ponuka['zameranie'];
        $Ponuka->save();

        $Ponuky=Ponuky::where('firma_id',$request->firma['id'])->get();
        $res['Ponuky']=$Ponuky;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Remove_Ponuka(Request $request){
        Ponuky::where('id',$request->id)->delete();

        $Ponuky=Ponuky::where('firma_id',$request->firma_id)->get();
        $res['Ponuky']=$Ponuky;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Edit_Ponuka(Request $request){
        $Ponuky=Ponuky::where('id',$request->id)->first();

        $Krajiny=Krajina::all();
        $Kraj=Kraj::all();
        $Programy=Studentske_Programy::all();
        $Zamerania=Zamerania::all();

        $res['kraje']=$Kraj;
        $res['krajiny']=$Krajiny;
        $res['programy']=$Programy;
        $res['zamerania']=$Zamerania;
        $res['Ponuky']=$Ponuky;
        $res['success']=true;
        return  response()->json($res);

    }

    public function  Update_Ponuka(Request $request){
        $Ponuka=Ponuky::where('id',$request->id)->first();
        $Ponuka->update([
            "nazov"=>$request['nazov'],
            "informacie"=>$request['informacie'],
            "datum_od"=>$request['datum_od'],
            "datum_do"=>$request['datum_do'],
            "mzda"=>$request['mzda'],
            "krajina_id"=>$request['krajina_id'],
            "kraj_id"=>$request['kraj_id'],
            "mesto"=>$request['mesto'],
            "program_id"=>$request['program_id'],
            "zameranie_id"=>$request['zameranie_id'],
        ]);

        $Ponuky=Ponuky::where('firma_id',$request->firma_id)->get();
        $res['Ponuky']=$Ponuky;
        $res['success']=true;
        return  response()->json($res);


    }

    public function Detail_Ponuka(Request $request){
        //Pristup ako žiadost
        if($request->firma_id==null){
            $request=Ponuky::where("id",$request->id)->first();
        }

        $Firma=Firma::where('id',$request->firma_id)->first();
        $Firma_I=Firma_Files::where('firma_id',$request->firma_id)->where('isProfile',true)->first();
        if($Firma_I == null){
            $Firma_I = new Firma_Files();
            $Firma_I->id=0;
            $Firma_I->file_URL="../assets/user.png";
            $Firma_I->file="user.png";
            $Firma_I->isProfile=true;
            $Firma_I->firma_id=$request->firma_id;
        }
        $Firma_Image = array(
            "image_URL" => $Firma_I->file_URL,
            "image" => $Firma_I->file,
        );



        $Ponuka =Ponuky::where('id',$request->id)->first();
        $Program_Nazov=Studentske_Programy::where('id',$Ponuka->program_id)->first();
        $Ponuka->program_id=$Program_Nazov->nazov;
        $Zameranie=Zamerania::where('id',$Ponuka->zameranie_id)->first();
        $Ponuka->zameranie_id=$Zameranie->nazov;
        $Krajina=Krajina::where('id',$Ponuka->krajina_id)->first();
        $Ponuka->krajina_id=$Krajina->nazov;
        $Kraj=Kraj::where('id',$Ponuka->kraj_id)->first();
        $Ponuka->kraj_id=$Kraj->nazov;

        $Ais_Ponuky=Ais_Ponuky::where('ponuka_id',$Ponuka->id)->get();

        foreach ($Ais_Ponuky as $AP){
            $Student=Ais::where('id',$AP->ais_id)->first();
            $AP['stud_meno']=$Student->meno;
            $AP['stud_priezvisko']=$Student->priezvisko;
        }


        $res['Ais_Ponuky']=$Ais_Ponuky;
        $res['Firma']=$Firma;
        $res['firma_image']=$Firma_Image;
        $res['Ponuka']=$Ponuka;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Decline_Student(Request $request){
        $Student_Ponuka=Ais_Ponuky::where('id',$request->id)->first();
        $Student_Ponuka->update([
            "status"=>"Zamietnuté",
        ]);

        $Ais_Ponuky=Ais_Ponuky::where('ponuka_id',$request->ponuka_id)->get();
        foreach ($Ais_Ponuky as $AP){
            $Student=Ais::where('id',$AP->ais_id)->first();
            $AP['stud_meno']=$Student->meno;
            $AP['stud_priezvisko']=$Student->priezvisko;
        }

        $res['Ais_Ponuky']=$Ais_Ponuky;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Accept_Student(Request $request){
        $Student_Ponuka=Ais_Ponuky::where('id',$request->id)->first();
        $Student_Ponuka->update([
            "status"=>"Prijatý",
        ]);

        $Ais_Ponuky=Ais_Ponuky::where('ponuka_id',$request->ponuka_id)->get();
        foreach ($Ais_Ponuky as $AP){
            $Student=Ais::where('id',$AP->ais_id)->first();
            $AP['stud_meno']=$Student->meno;
            $AP['stud_priezvisko']=$Student->priezvisko;
        }

        $res['Ais_Ponuky']=$Ais_Ponuky;
        $res['success']=true;
        return  response()->json($res);
    }

    public function  Show_Ponuky(Request $request){
       $Ponuky=Ponuky::where('je_aktualna',true)->get();

       $Ponuky_Edited  = collect([]);

       foreach ($Ponuky as $p){
           $Firma=Firma::where('id',$p->firma_id)->first();
           $Firma_File=Firma_Files::where('firma_id',$Firma->id)->where('isProfile',true)->first();
           if($Firma_File==null){
               $Firma_File=new Firma_Files();
               $Firma_File->file="user.png";
               $Firma_File->file_URL="../../assets/user.png";
           }
           $Ponuka_Array=array(
               "id"=>$p->id,
               "nazov"=>$p->nazov,
               "firma"=>$Firma->nazov,
               "firma_id"=>$p->firma_id,
               "firma_image"=>$Firma_File->file,
               "firma_image_url"=>$Firma_File->file_URL,
               "mesto"=>$p->mesto,
               "mzda"=>$p->mzda,
               "krajina_id"=>$p->krajina_id,
               "kraj_id"=>$p->kraj_id,
               "obor_id"=>$p->program_id,
               "zameranie_id"=>$p->zameranie_id,
               "is_visible"=>true,

           );
           $Ponuky_Edited->push($Ponuka_Array);
       }

       $Obory=Studentske_Programy::all();
       $Zamerania=Zamerania::all();
       $Krajiny=Krajina::all();
       $Kraje=Kraj::all();

        $res['obory']=$Obory;
        $res['zamerania']=$Zamerania;
        $res['krajiny']=$Krajiny;
        $res['kraje']=$Kraje;
        $res['ponuky']=$Ponuky_Edited;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Student_Remove(Request $request){
        $Ziadost=Ais_Ponuky::where('id',$request->ziadost_id)->first();
        $Ziadost->update([
            "status"=>"Zrušene Študentom",
        ]);

        $res['success']=true;
        return  response()->json($res);
    }

    public function Add_Ziadost(Request $request){

        $Ziadost=new Ais_Ponuky();
        $Ziadost->status="V procese";
        $Ziadost->ais_id=$request->student['id'];
        $Ziadost->komentar="";
        $Ziadost->hodnotenie=0;
        $Ziadost->ponuka_id=$request->ponuka['id'];
        $Ziadost->save();

        $res['je_ziadost']=true;
        $res['success']=true;
        return  response()->json($res);


    }

}
