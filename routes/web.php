<?php


use Illuminate\Support\Facades\Route;

$router->get('/', 'HomeController@show');



Route::group(['prefix'=>'api'],function (){
    Route::post('/login','LoginController@index');
    Route::post('/loginAis','LoginController@loginAis');
    Route::post('/Registracia_values','HomeController@Registracia_values');
    Route::post('/register','AccountController@register');
    Route::post('/logout','LoginController@logout');
    Route::post('/profil','StudentController@profil');
    Route::post('/profil_Update','StudentController@profil_Update');
    Route::post('/Edit_Profil','StudentController@Edit_Profil');
    Route::post('/Firma_profil','AccountController@profil');
    Route::post('/Edit_Firma_profil','AccountController@Edit_Firma_profil');
    Route::post('/firma_profil_update','AccountController@Update_Firma_profil');
    Route::post('/Firma_ponuky','AccountController@Firma_ponuky');
    Route::post('/Add_Ponuka','PonukyController@Add_Ponuka');
    Route::post('/Add_Ponuka_Screen','PonukyController@Add_Ponuka_Screen');
    Route::post('/Remove_Ponuka','PonukyController@Remove_Ponuka');
    Route::post('/Edit_Ponuka','PonukyController@Edit_Ponuka');
    Route::post('/Update_Ponuka','PonukyController@Update_Ponuka');
    Route::post('/Detail_Ponuka','PonukyController@Detail_Ponuka');
    Route::post('/Show_Student_Profil','AccountController@Show_Student_Profil');
    Route::post('/Decline_Student','PonukyController@Decline_Student');
    Route::post('/Accept_Student','PonukyController@Accept_Student');
    Route::post('/Show_Ponuky','PonukyController@Show_Ponuky');
    Route::post('/Show_Student_ZH','StudentController@Show_Student_ZH');
    Route::post('/Stud_Add_Komentar','StudentController@Stud_Add_Komentar');
    Route::post('/Stud_Update_Komentar','StudentController@Stud_Update_Komentar');
    Route::post('/Stud_Delete_Komentar','StudentController@Stud_Delete_Komentar');
    Route::post('/Je_Ziadost','StudentController@Je_Ziadost');
    Route::post('/Student_Remove','PonukyController@Student_Remove');
    Route::post('/Add_Ziadost','PonukyController@Add_Ziadost');
    Route::post('/Show_Komentare','AccountController@Show_Komentare');
    Route::post('/Statistiky','HomeController@Statistiky');
    Route::post('/Napiste_Nam','HomeController@Napiste_Nam');
    Route::post('/Admin_Profil','AdminController@Admin_Profil');
    Route::post('/Edit_Admin_Profil','AdminController@Edit_Admin_Profil');
    Route::post('/Update_Admin_Profil','AdminController@Update_Admin_Profil');
    Route::post('/Admin_Get_Spravy','AdminController@Admin_Get_Spravy');
    Route::post('/Admin_Sprava_Odpoved','AdminController@Admin_Sprava_Odpoved');
    Route::post('/Admin_Get_Zoznam_UKF','AdminController@Admin_Get_Zoznam_UKF');
    Route::post('/Admin_Add_Program','AdminController@Admin_Add_Program');
    Route::post('/Admin_Update_Program','AdminController@Admin_Update_Program');
    Route::post('/Admin_Delete_Program','AdminController@Admin_Delete_Program');
    Route::post('/Admin_Add_Admin','AdminController@Admin_Add_Admin');
    Route::post('/Admin_Remove_Admin','AdminController@Admin_Remove_Admin');
    Route::post('/Admin_Get_Zoznam_Firiem','AdminController@Admin_Get_Zoznam_Firiem');
    Route::post('/Admin_Delete_Firma','AdminController@Admin_Delete_Firma');
    Route::post('//Admin_Accept_Firma','AdminController@Admin_Accept_Firma');
    Route::post('/Admin_Get_Zoznam_Ponuk','AdminController@Admin_Get_Zoznam_Ponuk');
    Route::post('/Admin_Potvrdit_Komentar','AdminController@Admin_Potvrdit_Komentar');
    Route::post('/Admin_Delete_Komentar','AdminController@Admin_Delete_Komentar');
    Route::post('/Admin_Add_Zameranie','AdminController@Admin_Add_Zameranie');
    Route::post('/Admin_Update_Zameranie','AdminController@Admin_Update_Zameranie');
    Route::post('/Admin_Delete_Zameranie','AdminController@Admin_Delete_Zameranie');
    Route::post('/Admin_Get_Zoznam_Znalosti','AdminController@Admin_Get_Zoznam_Znalosti');
    Route::post('/Admin_Add_JZ','AdminController@Admin_Add_JZ');
    Route::post('/Admin_Update_JZ','AdminController@Admin_Update_JZ');
    Route::post('/Admin_Add_PCZ','AdminController@Admin_Add_PCZ');
    Route::post('/Admin_Update_PCZ','AdminController@Admin_Update_PCZ');
    Route::post('/Admin_Get_Zoznam_Regionov','AdminController@Admin_Get_Zoznam_Regionov');
    Route::post('/Admin_Add_Krajina','AdminController@Admin_Add_Krajina');
    Route::post('/Admin_Update_Krajina','AdminController@Admin_Update_Krajina');
    Route::post('/Admin_Add_Kraj','AdminController@Admin_Add_Kraj');
    Route::post('/Admin_Update_Kraj','AdminController@Admin_Update_Kraj');






});
