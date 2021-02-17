<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Kelas;
use App\Models\Member;
use App\Models\Tugas;
use App\Models\File;
use App\Models\Jawaban;
use App\Models\Challenge;
use App\Models\JawabanChallenge;
use App\Models\Materi;
use App\Models\Ujian;
use App\Models\JawabanUjian;
use App\Models\User;
use Auth;

class DashboardController extends Controller
{
  function cekregis(Request $req){
    $nim = $req->nim;
    $cek = count(DB::select("SELECT*FROM users WHERE nim_nip = '$nim'"));
    if($cek>0){
      return "NIM/NIP sudah digunakan";
    }else {
      return "Allow";
    }
  }

  function cekemail(Request $req){
    $email = $req->email;
    $cek = count(DB::select("SELECT*FROM users WHERE email = '$email'"));
    if($cek>0){
      return "Email sudah digunakan";
    }else {
      return "Allow";
    }
  }

    function index(){
      if(Auth::user()->hak_akses == "Admin"){
        return redirect('/admin');
      }else {
        $nimnip = Auth::user()->nim_nip;
        $topleaderboard = DB::select("SELECT*FROM users WHERE hak_akses='Mahasiswa' order by jumlah_poin DESC LIMIT 3");
        $tugas = DB::select("SELECT tugas.id, deadline_tanggal, deadline_jam, judul_tugas, deskripsi_tugas, tugas.id_kelas, DAYOFMONTH(deadline_tanggal) as day, MONTHNAME(deadline_tanggal) as month FROM tugas,kelas,members WHERE tugas.id_kelas =kelas.id AND tugas.status='Open' AND members.nim_nip_user='$nimnip' AND members.id_kelas=kelas.id ORDER BY deadline_tanggal DESC, deadline_jam DESC");
        $myclass = DB::select("SELECT kelas.id, nama_mk, profile_photo_path FROM kelas,members,users WHERE members.id_kelas = kelas.id AND kelas.id_dosen = users.nim_nip AND members.nim_nip_user='$nimnip'");
        $members = Member::all();
        $ujian = DB::select("SELECT ujians.id, judul_ujian,ujians.id_kelas, deskripsi_ujian, tipe_ujian,ujians.id_kelas, DATE_FORMAT(deadline_tanggal, '%W, %D') as hari, deadline_jam FROM ujians,kelas,members WHERE ujians.id_kelas=kelas.id AND members.id_kelas = kelas.id AND members.nim_nip_user='$nimnip' ORDER BY deadline_tanggal DESC, deadline_jam DESC");

        $materi = DB::select("SELECT materis.id, judul_materi, deskripsi_materi, materis.created_at, nama_mk, materis.id_kelas, profile_photo_path, nama_user,nim_nip,level  FROM materis,kelas,members,users WHERE materis.id_kelas = kelas.id AND members.id_kelas=kelas.id AND members.nim_nip_user='$nimnip' AND kelas.id_dosen=users.nim_nip ");
        $tugasfeed = DB::select("SELECT tugas.id, judul_tugas, deskripsi_tugas, tugas.created_at, nama_mk, tugas.id_kelas ,profile_photo_path, nama_user,nim_nip,level FROM tugas,kelas,members,users WHERE tugas.id_kelas=kelas.id AND tugas.id_kelas = kelas.id AND members.nim_nip_user='$nimnip' AND members.id_kelas=kelas.id AND kelas.id_dosen=users.nim_nip");
        $challengefeed = DB::select("SELECT challenges.id, judul_challenge, deskripsi_challenge, challenges.created_at, nama_mk, challenges.id_kelas ,profile_photo_path,level, nama_user,nim_nip FROM challenges,kelas,members,users WHERE challenges.id_kelas=kelas.id AND challenges.id_kelas = kelas.id AND members.nim_nip_user='$nimnip' AND members.id_kelas=kelas.id AND kelas.id_dosen=users.nim_nip");
        $files = DB::select("SELECT*FROM files");
        $feed = array();
        foreach($materi as $materi){
          $fill['id'] = $materi->id;
          $fill['tipe'] = "Materi";
          $fill['id_kelas'] = $materi->id_kelas;
          $fill['nama_mk'] = $materi->nama_mk;
          $fill['level'] = $materi->level;
          $fill['nama_user'] = $materi->nama_user;
          $fill['profile_photo_path'] = $materi->profile_photo_path;
          $fill['judul'] = $materi->judul_materi;
          $fill['deskripsi'] = $materi->deskripsi_materi;
          $fill['created_at'] = $materi->created_at;
          array_push($feed,$fill);
        }
        foreach($tugasfeed as $tugascek){
          $fill['id'] = $tugascek->id;
          $fill['tipe'] = "Tugas";
          $fill['id_kelas'] = $tugascek->id_kelas;
          $fill['nama_mk'] = $tugascek->nama_mk;
          $fill['level'] = $tugascek->level;
          $fill['nama_user'] = $tugascek->nama_user;
          $fill['profile_photo_path'] = $tugascek->profile_photo_path;
          $fill['judul'] = $tugascek->judul_tugas;
          $fill['deskripsi'] = $tugascek->deskripsi_tugas;
          $fill['created_at'] = $tugascek->created_at;
          array_push($feed,$fill);
        }
        foreach($challengefeed as $challenge){
          $fill['id'] = $challenge->id;
          $fill['tipe'] = "Challenge";
          $fill['id_kelas'] = $challenge->id_kelas;
          $fill['nama_mk'] = $challenge->nama_mk;
          $fill['level'] = $challenge->level;
          $fill['nama_user'] = $challenge->nama_user;
          $fill['profile_photo_path'] = $challenge->profile_photo_path;
          $fill['judul'] = $challenge->judul_challenge;
          $fill['deskripsi'] = $challenge->deskripsi_challenge;
          $fill['created_at'] = $challenge->created_at;
          array_push($feed,$fill);
        }
        $keys = array_column($feed, 'created_at');
        array_multisort($keys, SORT_DESC, $feed);

        return view('page.dashboard',['topleaderboard' => $topleaderboard,'tugas'=> $tugas, 'myclass' => $myclass,'members'=> $members, 'ujians' => $ujian,'feeds'=> $feed,'files'=> $files]);
      }
      }

    function admin(Request $req){
      if($req->cari){
        $cari = $req->cari;
      }else {
        $cari = "";
      }
      $member = DB::select("SELECT*FROM users WHERE nama_user LIKE '%$cari%' OR nim_nip LIKE '%$cari%'  order by id DESC");
      return view('page.adminuser',['member'=>$member]);
    }

    function showfile(Request $req){
      $namafile = $req->file;
      $lokasi = $req->kelas;
      $tipe = $req->tipe;
      if($tipe == "Tugas"){
        $path = "file/$lokasi/tugas/$namafile";
      }elseif ($tipe=="Materi") {
      $path = "file/$lokasi/materi/$namafile";
    }elseif ($tipe=="Ujian") {
      $path = "file/$lokasi/ujian/$namafile";
    }
      return view('page.display',['path'=>$path]);
    }

    function searchpage(Request $req){
      if($req->search){
        $cari = $req->search;
      }else {
        $cari = "";
      }
      $users = DB::select("SELECT*FROM users WHERE nama_user LIKE '%$cari%' OR nim_nip LIKE '%$cari%'");
      return view('page.searchpage',['users'=> $users]);
    }

    function rewards(){
      $nimnip = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $rewards = DB::select("SELECT rewards.id, rewards.judul_reward, nama_mk, rewards.created_at, nama_mk, kelas.id as idkelas  FROM rewards,kelas,members WHERE members.id_kelas = kelas.id AND rewards.id_kelas=kelas.id AND members.nim_nip_user='$nimnip' ORDER BY id DESC");
      }else {
        $rewards = DB::select("SELECT rewards.id, rewards.judul_reward, nama_mk, rewards.created_at, nama_mk, kelas.id as idkelas FROM rewards,kelas WHERE rewards.id_kelas=kelas.id AND kelas.id_dosen='$nimnip' ORDER BY id DESC");
      }
      return view('page.rewards',['rewards' => $rewards]);
    }

    function leaderboard(Request $req){
      $nimnip = Auth::user()->nim_nip;
      $myself = DB::select("SELECT * FROM users WHERE nim_nip=$nimnip");
      $ranking = DB::select("SELECT*FROM users WHERE hak_akses='Mahasiswa' order by jumlah_poin DESC");
      $myrank = 1;
      foreach($ranking as $rank){
        if($rank->nim_nip == $nimnip){
          break;
        }
        $myrank+=1;
      }
      $kelas = Kelas::all();
      if($req->filter == "all" || !$req->filter){
        $leaderboards = DB::select("SELECT*FROM users  WHERE hak_akses ='Mahasiswa' order by jumlah_poin DESC");
        $leadtype = "Global";
      }else {
        $kelasid = $req->filter;
        $leaderboards = DB::select("SELECT members.id , nama_user, nim_nip, level, poin as jumlah_poin, profile_photo_path FROM members,users WHERE members.nim_nip_user = users.nim_nip AND members.id_kelas='$kelasid' AND users.hak_akses='Mahasiswa' ORDER BY poin DESC");
        $leadtype = "Kelas";
      }
      return view('page.leaderboard',['leaderboards' => $leaderboards , 'leadtype' => $leadtype,'self' => $myself, 'kelas' => $kelas,'myrank' => $myrank]);
    }


    function profilesettings(){
      $nimnip = Auth::user()->nim_nip;
      $users = User::where('nim_nip',$nimnip)->get();
      return view('page.profilsettings',['users' => $users]);
    }

    function gantipassword(Request $req){
      $id = Auth::user()->id;
      $users = User::find($id);
      $users->password = Hash::make($req->password);
      $users->save();
      return back()->with('sukses','Password telah diubah');

    }

    function saveprofile(Request $req){
      $id = Auth::user()->id;
      $users = User::find($id);
      $cekphoto = User::where('id',$id)->first();
      if($cekphoto == ""){
        $users->nama_user = $req->nama_user;
        $users->displaynim = $req->nim_nip;
        $users->email = $req->email;
      }else {
        if($req->hasFile('photo')){
          $file = $req->file('photo');
          $namafile = $file->getClientOriginalName();
          $pathfile = round(microtime(true)).$namafile;
          $file->move("img/avatar",$pathfile);
          $photo = $pathfile;
        }else {
          $photo = "user.jpg";
        }
        $users->nama_user = $req->nama_user;
        $users->displaynim = $req->nim_nip;
        $users->email = $req->email;
        $users->profile_photo_path = $photo;
      }
      $users->save();
      return back()->with('sukses','Data telah diupdate');
    }

    function passwordpage(){
      return view('page.profilechangepassword');
    }

    function profile(Request $req){
      if($req->nama){
        $nama = $req->nama;
        $find = DB::select("SELECT*FROM users WHERE nama_user LIKE '%$nama%' OR nim_nip LIKE '%$nama%'");
        foreach($find as $user){
          $nimnip = $user->nim_nip;
        }
      }else {
        $nimnip = Auth::user()->nim_nip;
      }

      $users = DB::select("SELECT*FROM users WHERE nim_nip = '$nimnip'");
      $badges = DB::select("SELECT pathfile FROM transaksi_poins,rewards,files WHERE transaksi_poins.id_reward = rewards.id AND files.type='Reward' AND transaksi_poins.id_user ='$nimnip' AND files.id_foreign = rewards.id ");
      $totalbadges = DB::select("SELECT*FROM files,rewards,members WHERE files.id_foreign = rewards.id AND files.type = 'Reward' AND rewards.id_kelas = members.id_kelas AND members.nim_nip_user ='$nimnip'");
      $challengedone = DB::select("SELECT*FROM jawaban_challenges WHERE id_user ='$nimnip'");
      $riwayat = DB::select("SELECT judul_reward, deskripsi_reward, DATE(transaksi_poins.created_at) AS tahun, transaksi_poins.poin_reward FROM transaksi_poins, rewards WHERE transaksi_poins.id_reward = rewards.id AND transaksi_poins.id_user = '$nimnip' order by transaksi_poins.created_at DESC");
      $challengetotal = DB::select("SELECT*FROM challenges,kelas, members WHERE challenges.id_kelas = kelas.id AND members.id_kelas= kelas.id AND members.nim_nip_user ='$nimnip'");
      //return $badges;
      return view('page.profile',['users' => $users,'badges' => $badges,'riwayat' => $riwayat,'challenge' => $challengedone,'challengetotal' => $challengetotal , 'totalbadges' => $totalbadges]);
    }
}
