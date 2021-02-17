<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ChallengesController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\RewardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('index');
Route::post('/log',[LoginController::class,'login']);

Route::post('/regis',[LoginController::class,'regis']);
Route::post('/cekregis',[DashboardController::class,'cekregis']);
Route::post('/cekemail',[DashboardController::class,'cekemail']);

Route::group(['middleware' => ['auth:sanctum', 'verified']],function(){
  Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
  //kelasfunction
  Route::get('/kelas' , [KelasController::class,'index']);
  Route::get('/kelas/info/{id}',[KelasController::class,'detailkelas']);
  Route::get('/kelas/member/{id}',[KelasController::class,'memberkelas']);
  Route::post('/kelas/buatkelas',[KelasController::class,'buatkelas']);
  Route::get('/kelas/info/{id}/tugas/{idtugas}',[KelasController::class,'detailtugas']);
  Route::get('/kelas/classwork/{id}',[KelasController::class,'classwork']);
  Route::post('/kelas/jawabtugas',[KelasController::class,'jawabtugas']);
  Route::post('/kelas/tugas/hapusjawaban',[KelasController::class,'hapusjawaban']);
  Route::post('/berinilai',[KelasController::class,'berinilai']);
  Route::post('/kelas/info/buatmateri',[KelasController::class,'buatmateri']);
  Route::post('/kelas/hapuspost',[KelasController::class,'hapuspost']);
  Route::post('/kelas/getpostdata',[KelasController::class,'getpostdata']);
  Route::post('/kelas/deletepostfile',[KelasController::class,'deletepostfile']);
  Route::post('/kelas/info/editpost',[KelasController::class,'editpost']);
  Route::get('kelas/tugas/updatestatus',[KelasController::class,'updatestatus']);
  //Kelas Challenge
  Route::get('/kelas/challenge/{id}',[KelasController::class,'challengepage']);
  Route::get('/kelas/challenge/{id}/info/{idchallenge}',[ChallengesController::class,'detailpagechallenge']);
  Route::post('/kelas/challenge/jawabchallenge',[ChallengesController::class,'jawabchallenge']);
  Route::post('/challenge/updatestatus',[ChallengesController::class,'updatestatus']);
  Route::get('/challenge/updatestatusall',[ChallengesController::class,'updatestatusall']);
  //Kelas Ujian
  Route::get('/kelas/ujian/{id}',[UjianController::class,'index']);
  Route::post('/berinilaiujian',[UjianController::class,'berinilaiujian']);
  Route::get('/kelas/ujian/{id}/info/{idujian}',[UjianController::class,'detailujian']);
  Route::post('/kelas/jawabujian',[UjianController::class,'jawabujian']);
  Route::post('/kelas/ujian/hapusjawaban',[UjianController::class,'hapusjawaban']);
  Route::get('/ujian/updatestatusall',[UjianController::class,'updatestatusall']);
  //kelas setting
  Route::get('/kelas/settings/kelas/general/{id}',[KelasController::class,'settingskelas']);
  Route::post('/kelas/settings/ubahkelas/{id}',[KelasController::class,'ubahkelas']);
  Route::get('/kelas/settings/kelas/cover/{id}',[KelasController::class,'coverkelas']);
  Route::post('/kelas/settings/setcover',[KelasController::class,'setcover']);
  Route::get('/kelas/settings/tugas/{id}',[KelasController::class,'tugas']);
  Route::post('/kelas/settings/buattugas',[KelasController::class,'buattugas']);
  Route::get('/kelas/settings/tugas/listtugas/{id}',[KelasController::class,'listtugas']);
  Route::post('/kelas/settings/hapustugas',[KelasController::class,'hapustugas']);
  Route::get('/kelas/settings/tugas/edittugas/{id}/{idtugas}',[KelasController::class,'formedittugas']);
  Route::post('/kelas/settings/hapusfile',[KelasController::class,'hapusfile']);
  Route::post('/kelas/settings/edittugas',[KelasController::class,'edittugas']);
  Route::get('/kelas/settings/challenge/{id}',[ChallengesController::class,'settingschallenge']);
  Route::get('/kelas/settings/challenge/{id}/buatchallenge',[ChallengesController::class,'pagechallenge']);
  Route::post('/kelas/settings/buatchallenge',[ChallengesController::class,'buatchallenge']);
  Route::post('/kelas/settings/hapuschallenge',[ChallengesController::class,'hapuschallenge']);
  Route::get('/kelas/settings/challenge/{id}/editchallenge/{idchallenge}',[ChallengesController::class,'pageeditchallenge']);
  Route::post('/kelas/settings/editchallenge',[ChallengesController::class,'editchallenge']);
  Route::get('/kelas/settings/ujian/{id}',[UjianController::class,'listujian']);
  Route::get('/kelas/settings/ujian/buatujian/{id}',[UjianController::class,'formujian']);
  Route::post('/kelas/settings/buatujian',[UjianController::class,'buatujian']);
  Route::post('/kelas/settings/hapusujian',[UjianController::class,'hapusujian']);
  Route::get('/kelas/settings/ujian/editujian/{id}/{idujian}',[UjianController::class,'formeditujian']);
  Route::post('/kelas/settings/hapusfileujian',[UjianController::class,'hapusfile']);
  Route::post('/kelas/settings/editujian',[UjianController::class,'editujian']);
  Route::get('/kelas/settings/member/managemember/{id}',[MemberController::class,'settingsmember']);
  Route::post('/kelas/kickmember',[MemberController::class,'kickmember']);
  Route::post('/kelas/settings/hapuskelas',[KelasController::class,'hapuskelas']);
  Route::post('/setowncover',[KelasController::class,'setowncover']);

  //Challenge function
  Route::get('/challenge' , [ChallengesController::class,'index']);

  //Leaderboard function
  Route::get('/leaderboard',[DashboardController::class,'leaderboard']);

  //Rewards function
  Route::get('/rewards',[DashboardController::class,'rewards']);
  Route::get('/kelas/rewards/{id}',[RewardController::class,'kelasreward']);
  Route::get('/kelas/settings/rewards/{id}',[RewardController::class,'settingsreward']);
  Route::get('kelas/settings/rewards/{id}/buatreward',[RewardController::class,'formbuatreward']);
  Route::post('/kelas/settings/buatreward',[RewardController::class,'buatreward']);
  Route::post('/kelas/settings/hapusreward',[RewardController::class,'hapusreward']);
  Route::get('/kelas/settings/rewards/{id}/editreward/{idreward}',[RewardController::class,'formeditreward']);
  Route::post('/kelas/settings/editreward',[RewardController::class,'editreward']);
  Route::get('/kelas/rewards/{id}/info/{idreward}',[RewardController::class,'rewarddetail']);
  Route::post('/klaimreward',[RewardController::class,'klaimreward']);

  //profile function
  Route::get('/searchpage',[DashboardController::class,'searchpage']);
  Route::get('/profile',[DashboardController::class,'profile']);
  Route::get('/myprofile',[DashboardController::class,'profilesettings']);
  Route::post('/saveprofile',[DashboardController::class,'saveprofile']);
  Route::get('/myprofile/gantipassword',[DashboardController::class,'passwordpage']);
  Route::post('/gantipassword',[DashboardController::class,'gantipassword']);

  Route::get('/show',[DashboardController::class,'showfile']);
  Route::get('/admin',[DashboardController::class,'admin']);

  //memberfunction
  Route::post('/kelas/joinkelas',[MemberController::class,'joinkelas']);







});
