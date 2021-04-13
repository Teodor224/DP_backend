<?php

namespace App\Http\Controllers;


use App\Ais;
use App\Firma;
use App\Firma_Files;
use App\Kraj;
use App\Krajina;
use App\Napiste_Nam;
use App\Ponuky;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function Statistiky(Request $request){
      $Studenti=Ais::where("rola_id",1)->get();
      $AKT_Ponuky=Ponuky::where("je_aktualna",true)->get();
      $ABS_Ponuky=Ponuky::where("je_aktualna",false)->get();
      $Firmy=Firma::all();
      $Firmy_Images=collect([]);
      foreach ($Firmy as $Firma){
          $Firma_Image=Firma_Files::where('firma_id',$Firma->id)->where("isProfile",true)->first();
          if($Firma_Image!=null) {
              $Image = array(
                  "id" => $Firma_Image->id,
                  "image" => $Firma_Image->file,
                  "image_url" => $Firma_Image->file_URL,
              );
              $Firmy_Images->push($Image);
          }
      }


       $res['pocet_s']=count($Studenti);
       $res['pocet_akt_p']=count($AKT_Ponuky);
       $res['pocet_abs_p']=count($ABS_Ponuky);
       $res['pocet_f']=count($Firmy);
       $res['firmy']=$Firmy_Images;
       $res['success']=true;

       return  response()->json($res);
   }

   public function Napiste_Nam(Request $request){
       $Sprava=new Napiste_Nam();
       $Sprava->meno=$request->meno;
       $Sprava->priezvisko=$request->priezvisko;
       $Sprava->email=$request->email;
       $Sprava->sprava=$request->sprava;
       $Sprava->save();

       $res['success']=true;

       return  response()->json($res);
   }

   public function Registracia_values(Request $request){
       $Krajiny=Krajina::all();
       $Kraje=Kraj::all();

       $res['krajiny']=$Krajiny;
       $res['kraje']=$Kraje;
       $res['success']=true;
       return  response()->json($res);
   }

}
