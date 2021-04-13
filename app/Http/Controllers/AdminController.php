<?php

namespace App\Http\Controllers;


use App\Ais;
use App\Ais_Files;
use App\Ais_Ponuky;
use App\Fakulty;
use App\Firma;
use App\Firma_Files;
use App\Jazykove_Znalosti;
use App\kontakt_osoba;
use App\Kraj;
use App\Krajina;
use App\Napiste_Nam;
use App\PC_Znalosti;
use App\Ponuky;
use App\Student_Program;
use App\Studentske_Programy;
use App\Zamerania;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function Admin_Profil(Request $request){

        $Image=Ais_Files::where('ais_id',$request->id)->where('isProfile', true)->first();
        if($Image == null){
            $Image = new Ais_Files();
            $Image->id=0;
            $Image->file_URL="../assets/user.png";
            $Image->file="user.png";
            $Image->isProfile=true;
            $Image->ais_id=$request->id;
        }

        $Admin_Image= array(
            "image_URL"=>$Image->file_URL,
            "image"=>$Image->file,
        );



        $Admin=Ais::where('id',$request->id)->first();
        $Krajina=Krajina::where('id',$Admin->krajina_id)->first();
        $Kraj=Kraj::where('id',$Admin->kraj_id)->first();



        $res['admin_image']=$Admin_Image;
        $res['krajina']=$Krajina;
        $res['kraj']=$Kraj;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Edit_Admin_Profil(Request $request){
        $Krajiny=Krajina::all();
        $Kraje=Kraj::all();

        $res['krajiny']=$Krajiny;
        $res['kraje']=$Kraje;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Update_Admin_Profil(Request $request){

        //Image
        if ($request->hasFile('image')) {
            $imagename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('../storage/ais/',$imagename);

            //Remove Old Photo
            $Ais_Image=Ais_Files::where('ais_id',$request['userid'])->where('isProfile', true)->first();
            if($Ais_Image != null) {
                if (File::exists("../../backend/storage/ais/$Ais_Image->file")) {
                    File::delete("../../backend/storage/ais/$Ais_Image->file");
                    $Ais_Image::where('ais_id', $request['userid'])->where('isProfile', true)->delete();
                }
            }

            //Upload new Photo
            $Image=new Ais_Files();
            $Image->file_URL="backend/storage/ais/$imagename";
            $Image->file=$imagename;
            $Image->isProfile=true;
            $Image->ais_id=$request['userid'];
            $Image->save();

        }else{
            $Image=Ais_Files::where('ais_id',$request['userid'])->where('isProfile', true)->first();
        }

        if($Image != null) {
            $New_Image = array(
                "image_URL" => $Image->file_URL,
                "image" => $Image->file,
            );
            $res['image'] = $New_Image;
        }



        //Update Admin
        $Admin=Ais::where('id',$request['userid'])->first();
        $Admin->update([
            "meno"=>$request['meno'],
            "priezvisko"=>$request['priezvisko'],
            "skolsky_email"=>$request['skolsky_email'],
            "sukromny_email"=>$request['sukromny_email'],
            "krajina_id"=>$request['krajina_id'],
            "kraj_id"=>$request['kraj_id'],
            "mesto"=>$request['mesto'],
            "ulica"=>$request['ulica'],
            "tel_cislo"=>$request['tel_cislo'],
        ]);


        $Krajina=Krajina::where('id',$Admin->krajina_id)->first();
        $Kraj=Kraj::where('id',$Admin->kraj_id)->first();


        $res['krajina']=$Krajina;
        $res['kraj']=$Kraj;
        $res['admin']=$Admin;
        $res['message']="Profil Succesfully Updated";
        $res['success']=true;

        return  response()->json($res);


    }

    public function Admin_Get_Spravy(Request $request){
        $Spravy=Napiste_Nam::orderBy('id','desc')->get();



        $res['spravy']=$Spravy;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Admin_Sprava_Odpoved(Request $request){
        //Update Sprava
        $Sprava=Napiste_Nam::where('id',$request['id'])->first();
        $Sprava->update([
            "nova_sprava"=>false,
        ]);


        $Spravy=Napiste_Nam::orderBy('id','desc')->get();
        $res['spravy']=$Spravy;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Get_Zoznam_UKF(Request $request){
        //Get Zoznam Studentov
        $Ais_Studenti=Ais::where('rola_id',1)->get();
        $Studenti= collect([]);
        foreach ($Ais_Studenti as $AS){
            $Student_Programy=Student_Program::where('ais_id',$AS->id)->get();
            $SProgram=collect([]);
            foreach ($Student_Programy as $SP){
                $Program=Studentske_Programy::where('id',$SP->studentske_programy_id)->first();
                $Full_Program=array(
                    "id"=>$SP->id,
                    "nazov"=>"$Program->nazov, $SP->stupen $SP->rocnik.ročník",
                );
                $SProgram->push($Full_Program);

            }

            $Student=array(
                "id"=>$AS->id,
                "meno"=>$AS->meno,
                "priezvisko"=>$AS->priezvisko,
                "datum_narodenia"=>$AS->datum_narodenia,
                "skolsky_email"=>$AS->skolsky_email,
                "program"=>$SProgram,
                "is_visible"=>true,
            );
            $Studenti->push($Student);
        }


        //Get Zoznam Programov
        $Studentske_Programy=Studentske_Programy::all();
        $Programy= collect([]);
        foreach ($Studentske_Programy as $SP){
            $Fakulta=Fakulty::where('id',$SP->fakulty_id)->first();
            $Program=array(
                "id"=>$SP->id,
                "nazov"=>$SP->nazov,
                "fakulta"=>$Fakulta->nazov,
                "mesto"=>$Fakulta->mesto,
                "ulica"=>$Fakulta->ulica,
                "is_visible"=>true,
            );
            $Programy->push($Program);

        }

        $Fakulty=Fakulty::all();

        //Get Zoznam Zamestnancov
        $Zamestnanci_Original=Ais::where('rola_id',2)->orwhere('rola_id',3)->get();
        $Zamestnanci= collect([]);
        foreach ($Zamestnanci_Original as $ZO){
            $Zamestnanec=array(
                "id"=>$ZO->id,
                "meno"=>$ZO->meno,
                "priezvisko"=>$ZO->priezvisko,
                "datum_narodenia"=>$ZO->datum_narodenia,
                "skolsky_email"=>$ZO->skolsky_email,
                "rola_id"=>$ZO->rola_id,
                "is_visible"=>true,
            );
            $Zamestnanci->push($Zamestnanec);

        }

        //Get Zoznam Zamerani
        $Zamerania=Zamerania::all();
        $Zoznam_Zamerani= collect([]);
        foreach ($Zamerania as $Z){
            $Program=Studentske_Programy::where('id',$Z->studentske_programy_id)->first();
            $Zameranie=array(
                "id"=>$Z->id,
                "nazov"=>$Z->nazov,
                "program"=>$Program->nazov,
                "program_id"=>$Z->studentske_programy_id,
                "is_visible"=>true,
            );
            $Zoznam_Zamerani->push($Zameranie);

        }

        $res['zamerania']=$Zoznam_Zamerani;
        $res['zamestnaci']=$Zamestnanci;
        $res['fakulty']=$Fakulty;
        $res['studenti']=$Studenti;
        $res['programy']=$Programy;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Add_Program(Request $request){
        $Program=new Studentske_Programy();
        $Program->nazov=$request->nazov;
        $Program->fakulty_id=$request->fakulta_id;
        $Program->save();

        //Get Zoznam Programov
        $Studentske_Programy=Studentske_Programy::all();
        $Programy= collect([]);
        foreach ($Studentske_Programy as $SP){
            $Fakulta=Fakulty::where('id',$SP->fakulty_id)->first();
            $Program=array(
                "id"=>$SP->id,
                "nazov"=>$SP->nazov,
                "fakulta"=>$Fakulta->nazov,
                "mesto"=>$Fakulta->mesto,
                "ulica"=>$Fakulta->ulica,
                "is_visible"=>true,
            );
            $Programy->push($Program);

        }

        $res['programy']=$Programy;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Admin_Update_Program(Request $request){
        $Program=Studentske_Programy::where('id',$request->id)->first();
        $Program->nazov=$request->nazov;
        $Program->fakulty_id=$request->fakulta;
        $Program->save();

        //Get Zoznam Programov
        $Studentske_Programy=Studentske_Programy::all();
        $Programy= collect([]);
        foreach ($Studentske_Programy as $SP){
            $Fakulta=Fakulty::where('id',$SP->fakulty_id)->first();
            $Program=array(
                "id"=>$SP->id,
                "nazov"=>$SP->nazov,
                "fakulta"=>$Fakulta->nazov,
                "mesto"=>$Fakulta->mesto,
                "ulica"=>$Fakulta->ulica,
                "is_visible"=>true,
            );
            $Programy->push($Program);

        }

        $res['programy']=$Programy;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Admin_Delete_Program(Request $request){
        $Program=Studentske_Programy::where('id',$request->id)->delete();

        //Get Zoznam Programov
        $Studentske_Programy=Studentske_Programy::all();
        $Programy= collect([]);
        foreach ($Studentske_Programy as $SP){
            $Fakulta=Fakulty::where('id',$SP->fakulty_id)->first();
            $Program=array(
                "id"=>$SP->id,
                "nazov"=>$SP->nazov,
                "fakulta"=>$Fakulta->nazov,
                "mesto"=>$Fakulta->mesto,
                "ulica"=>$Fakulta->ulica,
                "is_visible"=>true,
            );
            $Programy->push($Program);

        }

        $res['programy']=$Programy;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Admin_Add_Admin(Request $request){
        $Zamestnanec=Ais::where('id',$request->id)->first();
        $Zamestnanec->rola_id=3;
        $Zamestnanec->save();

        //Get Zoznam Zamestnancov
        $Zamestnanci_Original=Ais::where('rola_id',2)->orwhere('rola_id',3)->get();
        $Zamestnanci= collect([]);
        foreach ($Zamestnanci_Original as $ZO){
            $Zamestnanec=array(
                "id"=>$ZO->id,
                "meno"=>$ZO->meno,
                "priezvisko"=>$ZO->priezvisko,
                "datum_narodenia"=>$ZO->datum_narodenia,
                "skolsky_email"=>$ZO->skolsky_email,
                "rola_id"=>$ZO->rola_id,
                "is_visible"=>true,
            );
            $Zamestnanci->push($Zamestnanec);

        }

        $res['zamestnaci']=$Zamestnanci;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Remove_Admin(Request $request){
        $Zamestnanec=Ais::where('id',$request->id)->first();
        $Zamestnanec->rola_id=2;
        $Zamestnanec->save();

        //Get Zoznam Zamestnancov
        $Zamestnanci_Original=Ais::where('rola_id',2)->orwhere('rola_id',3)->get();
        $Zamestnanci= collect([]);
        foreach ($Zamestnanci_Original as $ZO){
            $Zamestnanec=array(
                "id"=>$ZO->id,
                "meno"=>$ZO->meno,
                "priezvisko"=>$ZO->priezvisko,
                "datum_narodenia"=>$ZO->datum_narodenia,
                "skolsky_email"=>$ZO->skolsky_email,
                "rola_id"=>$ZO->rola_id,
                "is_visible"=>true,
            );
            $Zamestnanci->push($Zamestnanec);

        }

        $res['zamestnaci']=$Zamestnanci;
        $res['success']=true;
        return  response()->json($res);
    }


    public function Admin_Get_Zoznam_Firiem(Request $request){
        //Get Zoznam Firiem
        $All_Firmy=Firma::all();
        $Firmy= collect([]);
        foreach ($All_Firmy as $AF){
            $Krajina=Krajina::where('id',$AF->krajina_id)->first();
                $Firma=array(
                    "id"=>$AF->id,
                    "nazov"=>$AF->nazov,
                    "email"=>$AF->email,
                    "krajina"=>$Krajina->nazov,
                    "mesto"=>$AF->mesto,
                    "je_schvalena"=>$AF->je_schvalena,
                    "is_visible"=>true,
                );
            $Firmy->push($Firma);

            }



        $res['firmy']=$Firmy;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Delete_Firma(Request $request){
        kontakt_osoba::where('firma_id',$request->id)->delete();
        $Firma_Files=Firma_Files::where('firma_id',$request->id)->get();
        foreach ($Firma_Files as $FF){
            File::delete("../../backend/storage/firma/$FF->file");
        }
        Firma_Files::where('firma_id',$request->id)->delete();
        $Ponuky=Ponuky::where('firma_id',$request->id)->get();
        foreach ($Ponuky as $P){
            Ais_Ponuky::where('ponuka_id',$P->id)->delete();
        }
        Ponuky::where('firma_id',$request->id)->delete();
        Firma::where('id',$request->id)->delete();


        $res['success']=true;
        return  response()->json($res);

    }

    public function Admin_Accept_Firma(Request $request){
        $Firma=Firma::where('id',$request->id)->first();
        $Firma->je_schvalena=true;
        $Firma->save();

        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Get_Zoznam_Ponuk(Request $request){
        $AKT_Ponuky=Ponuky::where('je_aktualna',true)->get();

        $AKT_Zoznam_Ponuk=collect([]);
        foreach ($AKT_Ponuky as $P){
            $Firma=Firma::where('id',$P->firma_id)->first();
            $Ponuka=array(
                "id"=>$P->id,
                "nazov"=>$P->nazov,
                "firma"=>$Firma->nazov,
                "od"=>$P->datum_od,
                "do"=>$P->datum_do,
                "mesto"=>$P->mesto,
                "is_visible"=>true,
            );
            $AKT_Zoznam_Ponuk->push($Ponuka);
        }

        $ABS_Ponuky=Ponuky::where('je_aktualna',false)->get();

        $ABS_Zoznam_Ponuk=collect([]);
        foreach ($ABS_Ponuky as $P){
            $Firma=Firma::where('id',$P->firma_id)->first();
            $Ponuka=array(
                "id"=>$P->id,
                "nazov"=>$P->nazov,
                "firma"=>$Firma->nazov,
                "od"=>$P->datum_od,
                "do"=>$P->datum_do,
                "mesto"=>$P->mesto,
                "is_visible"=>true,
            );
            $ABS_Zoznam_Ponuk->push($Ponuka);
        }

        $Komentare=Ais_Ponuky::where("komentar_schvaleny",true)->where("status","Prijatý")->get();
        $Zoznam_Komentarov=collect([]);
        foreach ($Komentare as $K){
            $Ponuka=Ponuky::where('id',$K->ponuka_id)->first();
            $Firma=Firma::where('id',$Ponuka->firma_id)->first();
            $Student=Ais::where('id',$K->ais_id)->first();
            $Komentar=array(
                "id"=>$K->id,
                "meno"=>$Student->meno,
                "priezvisko"=>$Student->priezvisko,
                "firma"=>$Firma->nazov,
                "ponuka"=>$Ponuka->nazov,
                "ponuka_id"=>$K->ponuka_id,
                "hodnotenie"=>$K->hodnotenie,
                "komentar"=>$K->komentar,
                "is_visible"=>true,
            );
            $Zoznam_Komentarov->push($Komentar);
        }

        $Nove_Komentare=Ais_Ponuky::where("komentar_schvaleny",false)->where("hodnotenie",">",-1)->get();
        $Zoznam_Novych_Komentarov=collect([]);
        foreach ($Nove_Komentare as $K){
            $Ponuka=Ponuky::where('id',$K->ponuka_id)->first();
            $Firma=Firma::where('id',$Ponuka->firma_id)->first();
            $Student=Ais::where('id',$K->ais_id)->first();
            $Komentar=array(
                "id"=>$K->id,
                "meno"=>$Student->meno,
                "priezvisko"=>$Student->priezvisko,
                "firma"=>$Firma->nazov,
                "ponuka"=>$Ponuka->nazov,
                "ponuka_id"=>$K->ponuka_id,
                "hodnotenie"=>$K->hodnotenie,
                "komentar"=>$K->komentar,
            );
            $Zoznam_Novych_Komentarov->push($Komentar);
        }


        $res['AKT_ponuky']=$AKT_Zoznam_Ponuk;
        $res['ABS_ponuky']=$ABS_Zoznam_Ponuk;
        $res['komentare']=$Zoznam_Komentarov;
        $res['nove_komentare']=$Zoznam_Novych_Komentarov;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Admin_Potvrdit_Komentar(Request $request){
        $Komentar=Ais_Ponuky::where("id",$request->id)->first();
        $Komentar->komentar_schvaleny=true;
        $Komentar->save();


        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Delete_Komentar(Request $request){
        Ais_Ponuky::where("id",$request->id)->delete();

        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Add_Zameranie(Request $request){
        $Zameranie=new Zamerania();
        $Zameranie->nazov=$request->nazov;
        $Zameranie->studentske_programy_id=$request->program_id;
        $Zameranie->save();

        //Get Zoznam Zamerani
        $Zamerania=Zamerania::all();
        $Zoznam_Zamerani= collect([]);
        foreach ($Zamerania as $Z){
            $Program=Studentske_Programy::where('id',$Z->studentske_programy_id)->first();
            $Zameranie=array(
                "id"=>$Z->id,
                "nazov"=>$Z->nazov,
                "program"=>$Program->nazov,
                "program_id"=>$Z->studentske_programy_id,
                "is_visible"=>true,
            );
            $Zoznam_Zamerani->push($Zameranie);

        }

        $res['zamerania']=$Zoznam_Zamerani;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Admin_Update_Zameranie(Request $request){
        $Zameranie=Zamerania::where('id',$request->id)->first();
        $Zameranie->nazov=$request->nazov;
        $Zameranie->studentske_programy_id=$request->program_id;
        $Zameranie->save();

        //Get Zoznam Zamerani
        $Zamerania=Zamerania::all();
        $Zoznam_Zamerani= collect([]);
        foreach ($Zamerania as $Z){
            $Program=Studentske_Programy::where('id',$Z->studentske_programy_id)->first();
            $Zameranie=array(
                "id"=>$Z->id,
                "nazov"=>$Z->nazov,
                "program"=>$Program->nazov,
                "program_id"=>$Z->studentske_programy_id,
                "is_visible"=>true,
            );
            $Zoznam_Zamerani->push($Zameranie);

        }

        $res['zamerania']=$Zoznam_Zamerani;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Admin_Delete_Zameranie(Request $request){
        Zamerania::where('id',$request->id)->delete();

        //Get Zoznam Zamerani
        $Zamerania=Zamerania::all();
        $Zoznam_Zamerani= collect([]);
        foreach ($Zamerania as $Z){
            $Program=Studentske_Programy::where('id',$Z->studentske_programy_id)->first();
            $Zameranie=array(
                "id"=>$Z->id,
                "nazov"=>$Z->nazov,
                "program"=>$Program->nazov,
                "program_id"=>$Z->studentske_programy_id,
                "is_visible"=>true,
            );
            $Zoznam_Zamerani->push($Zameranie);

        }

        $res['zamerania']=$Zoznam_Zamerani;
        $res['success']=true;
        return  response()->json($res);

    }

    public function Admin_Get_Zoznam_Znalosti(Request $request){
        $JZ=Jazykove_Znalosti::all();
        $PCZ=PC_Znalosti::all();

        $res['pc_z']=$PCZ;
        $res['j_z']=$JZ;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Add_JZ(Request $request){
        $New_JZ=new Jazykove_Znalosti();
        $New_JZ->nazov=$request->nazov;
        $New_JZ->save();

        $JZ=Jazykove_Znalosti::all();
        $res['j_z']=$JZ;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Update_JZ(Request $request){
        $Update_JZ=Jazykove_Znalosti::where("id",$request->id)->first();
        $Update_JZ->nazov=$request->nazov;
        $Update_JZ->save();

        $JZ=Jazykove_Znalosti::all();
        $res['j_z']=$JZ;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Add_PCZ(Request $request){
        $New_PCZ=new PC_Znalosti();
        $New_PCZ->nazov=$request->nazov;
        $New_PCZ->save();

        $PCZ=PC_Znalosti::all();
        $res['pc_z']=$PCZ;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Update_PCZ(Request $request){
        $New_PCZ=PC_Znalosti::where("id",$request->id)->first();
        $New_PCZ->nazov=$request->nazov;
        $New_PCZ->save();

        $PCZ=PC_Znalosti::all();
        $res['pc_z']=$PCZ;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Get_Zoznam_Regionov(Request $request){
        $Krajiny=Krajina::all();

        $All_Kraje=Kraj::all();
        $Kraje=collect([]);
        foreach ($All_Kraje as $K){
            $Krajina=Krajina::where('id',$K->krajina_id)->first();
            $Kraj=array(
                "id"=>$K->id,
                "nazov"=>$K->nazov,
                "stat"=>$Krajina->nazov,
                "krajina_id"=>$K->krajina_id,
                "is_visible"=>true,
            );
            $Kraje->push($Kraj);
        }

        $res['krajiny']=$Krajiny;
        $res['kraje']=$Kraje;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Add_Krajina(Request $request){
        $Nova_Krajina= new Krajina();
        $Nova_Krajina->nazov=$request->nazov;
        $Nova_Krajina->kontinent=$request->kontinent;
        $Nova_Krajina->save();

        $Krajiny=Krajina::all();
        $res['krajiny']=$Krajiny;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Update_Krajina(Request $request){
        $Nova_Krajina= Krajina::where('id',$request->id)->first();
        $Nova_Krajina->nazov=$request->nazov;
        $Nova_Krajina->kontinent=$request->kontinent;
        $Nova_Krajina->save();

        $Krajiny=Krajina::all();
        $res['krajiny']=$Krajiny;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Add_Kraj(Request $request){
        $Nova_Kraj= new Kraj();
        $Nova_Kraj->nazov=$request->nazov;
        $Nova_Kraj->krajina_id=$request->krajina_id;
        $Nova_Kraj->save();

        $All_Kraje=Kraj::all();
        $Kraje=collect([]);
        foreach ($All_Kraje as $K){
            $Krajina=Krajina::where('id',$K->krajina_id)->first();
            $Kraj=array(
                "id"=>$K->id,
                "nazov"=>$K->nazov,
                "stat"=>$Krajina->nazov,
                "krajina_id"=>$K->krajina_id,
                "is_visible"=>true,
            );
            $Kraje->push($Kraj);
        }
        $res['kraje']=$Kraje;
        $res['success']=true;
        return  response()->json($res);
    }

    public function Admin_Update_Kraj(Request $request){
        $Kraj= Kraj::where('id',$request->id)->first();
        $Kraj->nazov=$request->nazov;
        $Kraj->krajina_id=$request->krajina_id;
        $Kraj->save();

        $All_Kraje=Kraj::all();
        $Kraje=collect([]);
        foreach ($All_Kraje as $K){
            $Krajina=Krajina::where('id',$K->krajina_id)->first();
            $Kraj=array(
                "id"=>$K->id,
                "nazov"=>$K->nazov,
                "stat"=>$Krajina->nazov,
                "krajina_id"=>$K->krajina_id,
                "is_visible"=>true,
            );
            $Kraje->push($Kraj);
        }
        $res['kraje']=$Kraje;
        $res['success']=true;
        return  response()->json($res);
    }


}
