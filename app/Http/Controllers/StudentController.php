<?php

namespace App\Http\Controllers;

use App\Ais;
use App\Ais_Files;
use App\Ais_Ponuky;
use App\Fakulty;
use App\Firma;
use App\Jazykove_Znalosti;
use App\Kraj;
use App\Krajina;
use App\PC_Znalosti;
use App\Ponuky;
use App\Stud_Jazykove_Znalosti;
use App\Stud_PC_Znalosti;
use App\Student_Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class StudentController extends Controller
{
   public function profil(Request $request){
       //If Firma accesing this profil
       if($request->ais_id!=null){
           $request=Ais::where('id',$request->ais_id)->first();
       }

       $Student=Ais::where('id',$request->id)->first();
       $Student_Program_Origin=Student_Program::where('ais_id',$request->id)->get();
       $Student_Profil=[];
       $index=0;
       foreach ($Student_Program_Origin as $S){
           $Student_Profil[$index]=$S->studentske_programy;
           $Fakulty=Fakulty::where('id',$Student_Profil[$index]->fakulty_id)->get();
           $Student_Profil[$index]->fakulty_id=$Fakulty[0]->nazov;
           $Student_Profil[$index]->stupen=$S->stupen;
           $index=$index+1;
       }

        $Image=Ais_Files::where('ais_id',$request->id)->where('isProfile', true)->first();
        if($Image == null){
            $Image = new Ais_Files();
            $Image->id=0;
            $Image->file_URL="../assets/user.png";
            $Image->file="user.png";
            $Image->isProfile=true;
            $Image->ais_id=$request->id;
        }
        $PDF=Ais_Files::where('ais_id',$request->id)->where('isProfile', false)->first();
       if($PDF == null){
           $PDF = new Ais_Files();
           $PDF->id=0;
           $PDF->file_URL=" ";
           $PDF->file="NO_PDF";
           $PDF->isProfile=false;
           $PDF->ais_id=$request->id;
       }

       $Student_Files= array(
           "image_URL"=>$Image->file_URL,
           "image"=>$Image->file,
           "pdf_URL"=>$PDF->file_URL,
           "pdf"=>$PDF->file
       );

        $Stud_Jazykove_Znalosti=Stud_Jazykove_Znalosti::where('ais_id',$request->id)->get();
       $res['j_znalosti']=$Stud_Jazykove_Znalosti;
       foreach ( $res['j_znalosti'] as $Stud){
           $Jazykove_Znalosti=Jazykove_Znalosti::where('id',$Stud->jazykove_znalosti_id)->get();
           $Stud->nazov=$Jazykove_Znalosti[0]->nazov;
       }

       $Stud_PC_Znalosti=Stud_PC_Znalosti::where('ais_id',$request->id)->get();
       $res['pc_znalosti']=$Stud_PC_Znalosti;
       foreach ($res['pc_znalosti'] as $Stud){
           $PC_Znalosti=PC_Znalosti::where('id',$Stud->pc_znalosti_id)->get();
           $Stud->nazov=$PC_Znalosti[0]->nazov;
       }

       $Krajina=Krajina::where('id',$Student->krajina_id)->first();
       $Kraj=Kraj::where('id',$Student->kraj_id)->first();
       $Student->krajina_id=$Krajina->nazov;
       $Student->kraj_id=$Kraj->nazov;


        $res['student_files']=$Student_Files;
        $res['success']=true;
        $res['student_profil']=$Student_Profil;
        $res['student']=$Student;
        return  response()->json($res);

   }

   public function Edit_Profil(Request $request){
        $J_Z=Jazykove_Znalosti::all();
        $PC_Z=PC_Znalosti::all();

        $res['j_z']=$J_Z;
        $res['pc_z']=$PC_Z;
       $res['success']=true;
       return  response()->json($res);
   }

   public function profil_Update(Request $request){

       //Image
       if ($request->hasFile('image')) {
           $imagename = $request->file('image')->getClientOriginalName();
           $request->file('image')->move('../storage/ais/',$imagename);

           //Remove Old Photo
           $Ais_Files=Ais_Files::where('ais_id',$request['userid'])->where('isProfile', true)->first();
           if($Ais_Files != null) {
               if (File::exists("../../backend/storage/ais/$Ais_Files->file")) {
                   File::delete("../../backend/storage/ais/$Ais_Files->file");
                   Ais_Files::where('ais_id', $request['userid'])->where('isProfile', true)->delete();
               }
           }

           //Upload new Photo
           $Ais_Image=new Ais_Files();
           $Ais_Image->file_URL="backend/storage/ais/$imagename";
           $Ais_Image->file=$imagename;
           $Ais_Image->isProfile=true;
           $Ais_Image->ais_id=$request['userid'];
           $Ais_Image->save();

       }else{
           $Ais_Image=Ais_Files::where('ais_id',$request['userid'])->where('isProfile', true)->first();
       }

       //PDF
       if ($request->hasFile('pdf')) {
           $pdfName = $request->file('pdf')->getClientOriginalName();
           $request->file('pdf')->move('../storage/ais/',$pdfName);

           //Remove Old Pdf
           $Ais_Files_PDF=Ais_Files::where('ais_id',$request['userid'])->where('isProfile', false)->first();
           if($Ais_Files_PDF != null) {
               if (File::exists("../../backend/storage/ais/$Ais_Files_PDF->file")) {
                   File::delete("../../backend/storage/ais/$Ais_Files_PDF->file");
                   Ais_Files::where('ais_id', $request['userid'])->where('isProfile', false)->delete();
               }
           }

           //Upload new PDF
           $Ais_PDF=new Ais_Files();
           $Ais_PDF->file_URL="backend/storage/ais/$pdfName";
           $Ais_PDF->file=$pdfName;
           $Ais_PDF->isProfile=false;
           $Ais_PDF->ais_id=$request['userid'];
           $Ais_PDF->save();


       }else{
           $Ais_PDF=Ais_Files::where('ais_id',$request['userid'])->where('isProfile', false)->first();
       }

       $Student_Files = array(
           "image_URL" => $Ais_Image->file_URL,
           "image" => $Ais_Image->file,
           "pdf_URL" => $Ais_PDF->file_URL,
           "pdf" => $Ais_PDF->file
       );
       $res['student_files']=$Student_Files;


       //Update Student
       $Student=Ais::where('id',$request['userid'])->first();
       $Student->update([
           "sukromny_email"=>$request['stud_email'],
           "tel_cislo"=>$request['stud_tel'],
           "informacie"=>$request['stud_info']
       ]);


       //Update Jazykove Znalosti
       Stud_Jazykove_Znalosti::where('ais_id',$request['userid'])->delete();
       if($request['JZ0']!=''){
           $Stud_JZ=new Stud_Jazykove_Znalosti();
           $Stud_JZ->ais_id=$request['userid'];
           $Stud_JZ->jazykove_znalosti_id=$request['JZ0'];
           $Stud_JZ->uroven="Materinský Jazyk";
           $Stud_JZ->save();
       }
       if($request['JZ1']!='' && $request['JZU1']!=''){
           $Stud_JZ=new Stud_Jazykove_Znalosti();
           $Stud_JZ->ais_id=$request['userid'];
           $Stud_JZ->jazykove_znalosti_id=$request['JZ1'];

           $Uroven='';
           switch ($request['JZU1']){
               case 2:$Uroven="Expert (C2)";break;
               case 3:$Uroven="Pokročilý (C1)";break;
               case 4:$Uroven="Stredne Pokročilý (B2)";break;
               case 5:$Uroven="Mierne Pokročilý (B1)";break;
               case 6:$Uroven="Začiatočník (A2)";break;
               case 7:$Uroven="Úplný začiatočník (A1)";break;
           }

           $Stud_JZ->uroven=$Uroven;
           $Stud_JZ->save();
       }
       if($request['JZ2']!='' && $request['JZU2']!=''){
           $Stud_JZ=new Stud_Jazykove_Znalosti();
           $Stud_JZ->ais_id=$request['userid'];
           $Stud_JZ->jazykove_znalosti_id=$request['JZ2'];

           $Uroven='';
           switch ($request['JZU2']){
               case 2:$Uroven="Expert (C2)";break;
               case 3:$Uroven="Pokročilý (C1)";break;
               case 4:$Uroven="Stredne Pokročilý (B2)";break;
               case 5:$Uroven="Mierne Pokročilý (B1)";break;
               case 6:$Uroven="Začiatočník (A2)";break;
               case 7:$Uroven="Úplný začiatočník (A1)";break;
           }

           $Stud_JZ->uroven=$Uroven;
           $Stud_JZ->save();
       }
       if($request['JZ3']!='' && $request['JZU3']!=''){
           $Stud_JZ=new Stud_Jazykove_Znalosti();
           $Stud_JZ->ais_id=$request['userid'];
           $Stud_JZ->jazykove_znalosti_id=$request['JZ3'];

           $Uroven='';
           switch ($request['JZU3']){
               case 2:$Uroven="Expert (C2)";break;
               case 3:$Uroven="Pokročilý (C1)";break;
               case 4:$Uroven="Stredne Pokročilý (B2)";break;
               case 5:$Uroven="Mierne Pokročilý (B1)";break;
               case 6:$Uroven="Začiatočník (A2)";break;
               case 7:$Uroven="Úplný začiatočník (A1)";break;
           }

           $Stud_JZ->uroven=$Uroven;
           $Stud_JZ->save();
       }
       if($request['JZ4']!='' && $request['JZU4']!=''){
           $Stud_JZ=new Stud_Jazykove_Znalosti();
           $Stud_JZ->ais_id=$request['userid'];
           $Stud_JZ->jazykove_znalosti_id=$request['JZ4'];

           $Uroven='';
           switch ($request['JZU4']){
               case 2:$Uroven="Expert (C2)";break;
               case 3:$Uroven="Pokročilý (C1)";break;
               case 4:$Uroven="Stredne Pokročilý (B2)";break;
               case 5:$Uroven="Mierne Pokročilý (B1)";break;
               case 6:$Uroven="Začiatočník (A2)";break;
               case 7:$Uroven="Úplný začiatočník (A1)";break;
           }

           $Stud_JZ->uroven=$Uroven;
           $Stud_JZ->save();
       }
       if($request['JZ5']!='' && $request['JZU5']!=''){
           $Stud_JZ=new Stud_Jazykove_Znalosti();
           $Stud_JZ->ais_id=$request['userid'];
           $Stud_JZ->jazykove_znalosti_id=$request['JZ5'];

           $Uroven='';
           switch ($request['JZU5']){
               case 2:$Uroven="Expert (C2)";break;
               case 3:$Uroven="Pokročilý (C1)";break;
               case 4:$Uroven="Stredne Pokročilý (B2)";break;
               case 5:$Uroven="Mierne Pokročilý (B1)";break;
               case 6:$Uroven="Začiatočník (A2)";break;
               case 7:$Uroven="Úplný začiatočník (A1)";break;
           }

           $Stud_JZ->uroven=$Uroven;
           $Stud_JZ->save();
       }
       if($request['JZ6']!='' && $request['JZU6']!=''){
           $Stud_JZ=new Stud_Jazykove_Znalosti();
           $Stud_JZ->ais_id=$request['userid'];
           $Stud_JZ->jazykove_znalosti_id=$request['JZ6'];

           $Uroven='';
           switch ($request['JZU6']){
               case 2:$Uroven="Expert (C2)";break;
               case 3:$Uroven="Pokročilý (C1)";break;
               case 4:$Uroven="Stredne Pokročilý (B2)";break;
               case 5:$Uroven="Mierne Pokročilý (B1)";break;
               case 6:$Uroven="Začiatočník (A2)";break;
               case 7:$Uroven="Úplný začiatočník (A1)";break;
           }

           $Stud_JZ->uroven=$Uroven;
           $Stud_JZ->save();
       }
       if($request['JZ7']!='' && $request['JZU7']!=''){
           $Stud_JZ=new Stud_Jazykove_Znalosti();
           $Stud_JZ->ais_id=$request['userid'];
           $Stud_JZ->jazykove_znalosti_id=$request['JZ7'];

           $Uroven='';
           switch ($request['JZU7']){
               case 2:$Uroven="Expert (C2)";break;
               case 3:$Uroven="Pokročilý (C1)";break;
               case 4:$Uroven="Stredne Pokročilý (B2)";break;
               case 5:$Uroven="Mierne Pokročilý (B1)";break;
               case 6:$Uroven="Začiatočník (A2)";break;
               case 7:$Uroven="Úplný začiatočník (A1)";break;
           }

           $Stud_JZ->uroven=$Uroven;
           $Stud_JZ->save();
       }
       if($request['JZ8']!='' && $request['JZU8']!=''){
           $Stud_JZ=new Stud_Jazykove_Znalosti();
           $Stud_JZ->ais_id=$request['userid'];
           $Stud_JZ->jazykove_znalosti_id=$request['JZ8'];

           $Uroven='';
           switch ($request['JZU8']){
               case 2:$Uroven="Expert (C2)";break;
               case 3:$Uroven="Pokročilý (C1)";break;
               case 4:$Uroven="Stredne Pokročilý (B2)";break;
               case 5:$Uroven="Mierne Pokročilý (B1)";break;
               case 6:$Uroven="Začiatočník (A2)";break;
               case 7:$Uroven="Úplný začiatočník (A1)";break;
           }

           $Stud_JZ->uroven=$Uroven;
           $Stud_JZ->save();
       }
       if($request['JZ9']!='' && $request['JZU9']!=''){
           $Stud_JZ=new Stud_Jazykove_Znalosti();
           $Stud_JZ->ais_id=$request['userid'];
           $Stud_JZ->jazykove_znalosti_id=$request['JZ9'];

           $Uroven='';
           switch ($request['JZU9']){
               case 2:$Uroven="Expert (C2)";break;
               case 3:$Uroven="Pokročilý (C1)";break;
               case 4:$Uroven="Stredne Pokročilý (B2)";break;
               case 5:$Uroven="Mierne Pokročilý (B1)";break;
               case 6:$Uroven="Začiatočník (A2)";break;
               case 7:$Uroven="Úplný začiatočník (A1)";break;
           }

           $Stud_JZ->uroven=$Uroven;
           $Stud_JZ->save();
       }

       //Update PC Znalosti
       Stud_PC_Znalosti::where('ais_id',$request['userid'])->delete();
       if($request['PCZ0']!='' && $request['PCZU0']!=''){
           $Stud_PCZ=new Stud_PC_Znalosti();
           $Stud_PCZ->ais_id=$request['userid'];
           $Stud_PCZ->pc_znalosti_id=$request['PCZ0'];

           $Uroven='';
           switch ($request['PCZU0'] ){
               case 1:$Uroven="Základy";break;
               case 2:$Uroven="Pokročilý";break;
               case 3:$Uroven="Expert";break;
           }

           $Stud_PCZ->uroven=$Uroven;
           $Stud_PCZ->save();
       }

       if($request['PCZ1']!='' && $request['PCZU1']!=''){
           $Stud_PCZ=new Stud_PC_Znalosti();
           $Stud_PCZ->ais_id=$request['userid'];
           $Stud_PCZ->pc_znalosti_id=$request['PCZ1'];

           $Uroven='';
           switch ($request['PCZU1']){
               case 1:$Uroven="Základy";break;
               case 2:$Uroven="Pokročilý";break;
               case 3:$Uroven="Expert";break;
           }

           $Stud_PCZ->uroven=$Uroven;
           $Stud_PCZ->save();
       }

       if($request['PCZ2']!='' && $request['PCZU2']!=''){
           $Stud_PCZ=new Stud_PC_Znalosti();
           $Stud_PCZ->ais_id=$request['userid'];
           $Stud_PCZ->pc_znalosti_id=$request['PCZ2'];

           $Uroven='';
           switch ($request['PCZU2']){
               case 1:$Uroven="Základy";break;
               case 2:$Uroven="Pokročilý";break;
               case 3:$Uroven="Expert";break;
           }

           $Stud_PCZ->uroven=$Uroven;
           $Stud_PCZ->save();
       }

       if($request['PCZ3']!='' && $request['PCZU3']!=''){
           $Stud_PCZ=new Stud_PC_Znalosti();
           $Stud_PCZ->ais_id=$request['userid'];
           $Stud_PCZ->pc_znalosti_id=$request['PCZ3'];

           $Uroven='';
           switch ($request['PCZU3']){
               case 1:$Uroven="Základy";break;
               case 2:$Uroven="Pokročilý";break;
               case 3:$Uroven="Expert";break;
           }

           $Stud_PCZ->uroven=$Uroven;
           $Stud_PCZ->save();
       }

       if($request['PCZ4']!='' && $request['PCZU4']!=''){
           $Stud_PCZ=new Stud_PC_Znalosti();
           $Stud_PCZ->ais_id=$request['userid'];
           $Stud_PCZ->pc_znalosti_id=$request['PCZ4'];

           $Uroven='';
           switch ($request['PCZU4']){
               case 1:$Uroven="Základy";break;
               case 2:$Uroven="Pokročilý";break;
               case 3:$Uroven="Expert";break;
           }

           $Stud_PCZ->uroven=$Uroven;
           $Stud_PCZ->save();
       }

       if($request['PCZ5']!='' && $request['PCZU5']!=''){
           $Stud_PCZ=new Stud_PC_Znalosti();
           $Stud_PCZ->ais_id=$request['userid'];
           $Stud_PCZ->pc_znalosti_id=$request['PCZ5'];

           $Uroven='';
           switch ($request['PCZU5']){
               case 1:$Uroven="Základy";break;
               case 2:$Uroven="Pokročilý";break;
               case 3:$Uroven="Expert";break;
           }

           $Stud_PCZ->uroven=$Uroven;
           $Stud_PCZ->save();
       }

       if($request['PCZ6']!='' && $request['PCZU6']!=''){
           $Stud_PCZ=new Stud_PC_Znalosti();
           $Stud_PCZ->ais_id=$request['userid'];
           $Stud_PCZ->pc_znalosti_id=$request['PCZ6'];

           $Uroven='';
           switch ($request['PCZU6']){
               case 1:$Uroven="Základy";break;
               case 2:$Uroven="Pokročilý";break;
               case 3:$Uroven="Expert";break;
           }

           $Stud_PCZ->uroven=$Uroven;
           $Stud_PCZ->save();
       }

       if($request['PCZ7']!='' && $request['PCZU7']!=''){
           $Stud_PCZ=new Stud_PC_Znalosti();
           $Stud_PCZ->ais_id=$request['userid'];
           $Stud_PCZ->pc_znalosti_id=$request['PCZ7'];

           $Uroven='';
           switch ($request['PCZU7']){
               case 1:$Uroven="Základy";break;
               case 2:$Uroven="Pokročilý";break;
               case 3:$Uroven="Expert";break;
           }

           $Stud_PCZ->uroven=$Uroven;
           $Stud_PCZ->save();
       }

       if($request['PCZ8']!='' && $request['PCZU8']!=''){
           $Stud_PCZ=new Stud_PC_Znalosti();
           $Stud_PCZ->ais_id=$request['userid'];
           $Stud_PCZ->pc_znalosti_id=$request['PCZ8'];

           $Uroven='';
           switch ($request['PCZU8']){
               case 1:$Uroven="Základy";break;
               case 2:$Uroven="Pokročilý";break;
               case 3:$Uroven="Expert";break;
           }

           $Stud_PCZ->uroven=$Uroven;
           $Stud_PCZ->save();
       }

       if($request['PCZ9']!='' && $request['PCZU9']!=''){
           $Stud_PCZ=new Stud_PC_Znalosti();
           $Stud_PCZ->ais_id=$request['userid'];
           $Stud_PCZ->pc_znalosti_id=$request['PCZ9'];

           $Uroven='';
           switch ($request['PCZU9']){
               case 1:$Uroven="Základy";break;
               case 2:$Uroven="Pokročilý";break;
               case 3:$Uroven="Expert";break;
           }

           $Stud_PCZ->uroven=$Uroven;
           $Stud_PCZ->save();
       }


       $res["j_z"]=Stud_Jazykove_Znalosti::where("ais_id",$request['userid'])->get();
       $res["pc_z"]=Stud_PC_Znalosti::where("ais_id",$request['userid'])->get();

       foreach ( $res['j_z'] as $Stud){
           $Jazykove_Znalosti=Jazykove_Znalosti::where('id',$Stud->jazykove_znalosti_id)->get();
           $Stud->nazov=$Jazykove_Znalosti[0]->nazov;
       }

       foreach ($res['pc_z'] as $Stud){
           $PC_Znalosti=PC_Znalosti::where('id',$Stud->pc_znalosti_id)->get();
           $Stud->nazov=$PC_Znalosti[0]->nazov;
       }

       $Krajina=Krajina::where('id',$Student->krajina_id)->first();
       $Kraj=Kraj::where('id',$Student->kraj_id)->first();
       $Student->krajina_id=$Krajina->nazov;
       $Student->kraj_id=$Kraj->nazov;


       $res['success']=true;
       $res['stud']=$Student;
       $res['message']="Profil Succesfully Updated";
       return  response()->json($res);
   }

   public function Show_Student_ZH(Request $request){
       $STUD_Ponuka=Ais_Ponuky::where("ais_id",$request->id)->get();

       $Ziadosti = collect([]);

       foreach ($STUD_Ponuka as $SP){
        $Firma_Ponuka=Ponuky::where('id',$SP->ponuka_id)->first();
        $Firma=Firma::where('id',$Firma_Ponuka->firma_id)->first();
           $Ponuka=array(
               "id"=>$SP->ponuka_id,
               "ziadost_id"=>$SP->id,
               "nazov"=>$Firma_Ponuka->nazov,
               "firma"=>$Firma->nazov,
               "od"=>$Firma_Ponuka->datum_od,
               "do"=>$Firma_Ponuka->datum_do,
               "status"=>$SP->status,
               "komentar"=>$SP->komentar,
               "hodnotenie"=>$SP->hodnotenie
           );
           $Ziadosti->push($Ponuka);
       }


       $res['success']=true;
       $res['ziadosti']=$Ziadosti;
       return  response()->json($res);
   }

   public function Je_Ziadost(Request $request){
       $Ziadost=Ais_Ponuky::where('ais_id',$request->student['id'])->where('ponuka_id',$request->ponuka['id'])->first();

       if($Ziadost==null){
           $res['je_ziadost']=false;
       }else{
           $res['je_ziadost']=true;
       }
       $res['success']=true;
       return  response()->json($res);
   }

   public function Stud_Add_Komentar(Request $request){
        $Komentar= Ais_Ponuky::where("id",$request->ziadost_id)->first();
        $Komentar->komentar=$request->komentar;
        $Komentar->hodnotenie=$request->hodnotenie;
        $Komentar->komentar_schvaleny=false;
        $Komentar->save();

       $res['success']=true;
       return  response()->json($res);
   }

    public function Stud_Update_Komentar(Request $request){
        $Komentar= Ais_Ponuky::where("id",$request->ziadost_id)->first();
        $Komentar->komentar=$request->komentar;
        $Komentar->hodnotenie=$request->hodnotenie;
        $Komentar->komentar_schvaleny=false;
        $Komentar->save();

        $res['success']=true;
        return  response()->json($res);
    }

    public function Stud_Delete_Komentar(Request $request){
        $Komentar= Ais_Ponuky::where("id",$request->ziadost_id)->first();
        $Komentar->komentar="";
        $Komentar->hodnotenie=-1;
        $Komentar->komentar_schvaleny=false;
        $Komentar->save();

        $res['success']=true;
        return  response()->json($res);
    }
}
