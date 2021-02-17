<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\Member;
use App\Models\Tugas;
use App\Models\File;
use App\Models\Jawaban;
use App\Models\Challenge;
use App\Models\JawabanChallenge;
use App\Models\Materi;
use Auth;

class ChallengesController extends Controller
{
    function index(Request $req){
      $show = $req->show;
      $orderby = $req->orderby;
      $nimnip = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses == "Mahasiswa"){
          if($show == "All" && $orderby == "DESC"){
            $challenge = DB::select("SELECT challenges.id, judul_challenge, deskripsi_challenge, waktu_mulai, waktu_selesai, poin_challenge, challenges.status, kode_mk, nama_mk, kelas.id as idkelas FROM challenges,kelas,members WHERE challenges.id_kelas = kelas.id AND members.id_kelas = kelas.id AND members.nim_nip_user = '$nimnip' ORDER BY challenges.id DESC");
          }elseif ($show == "All" && $orderby == "ASC") {
            $challenge = DB::select("SELECT challenges.id, judul_challenge, deskripsi_challenge, waktu_mulai, waktu_selesai, poin_challenge, challenges.status, kode_mk, nama_mk, kelas.id as idkelas FROM challenges,kelas,members WHERE challenges.id_kelas = kelas.id AND members.id_kelas = kelas.id AND members.nim_nip_user = '$nimnip' ORDER BY challenges.id ASC");
          }elseif ($show == "Completed" && $orderby == "ASC") {
            $challenge = DB::select("SELECT challenges.id, judul_challenge, deskripsi_challenge, waktu_mulai, waktu_selesai, poin_challenge, challenges.status, kode_mk, nama_mk, kelas.id as idkelas FROM challenges,kelas,members,jawaban_challenges WHERE challenges.id_kelas = kelas.id AND members.id_kelas = kelas.id AND members.nim_nip_user = '$nimnip' AND jawaban_challenges.id_challenge = challenges.id AND jawaban_challenges.id_user='$nimnip' ORDER BY challenges.id ASC");
          }elseif ($show == "Completed" && $orderby == "DESC") {
            $challenge = DB::select("SELECT challenges.id, judul_challenge, deskripsi_challenge, waktu_mulai, waktu_selesai, poin_challenge, challenges.status, kode_mk, nama_mk, kelas.id as idkelas FROM challenges,kelas,members,jawaban_challenges WHERE challenges.id_kelas = kelas.id AND members.id_kelas = kelas.id AND members.nim_nip_user = '$nimnip' AND jawaban_challenges.id_challenge = challenges.id AND jawaban_challenges.id_user='$nimnip' ORDER BY challenges.id DESC");
          }elseif ($show == "Open" && $orderby == "ASC") {
            $challenge = DB::select("SELECT challenges.id, judul_challenge, deskripsi_challenge, waktu_mulai, waktu_selesai, poin_challenge, challenges.status, kode_mk, nama_mk, kelas.id as idkelas FROM challenges,kelas,members WHERE challenges.id_kelas = kelas.id AND members.id_kelas = kelas.id AND members.nim_nip_user = '$nimnip' AND challenges.status='Open' ORDER BY challenges.id ASC");
          }elseif ($show == "Open" && $orderby == "DESC") {
            $challenge = DB::select("SELECT challenges.id, judul_challenge, deskripsi_challenge, waktu_mulai, waktu_selesai, poin_challenge, challenges.status, kode_mk, nama_mk, kelas.id as idkelas FROM challenges, kelas,members WHERE challenges.status='Open' AND challenges.id_kelas = kelas.id AND members.id_kelas = kelas.id AND members.nim_nip_user = '$nimnip' ORDER BY challenges.id DESC");
          }else {
            $challenge = DB::select("SELECT challenges.id, judul_challenge, deskripsi_challenge, waktu_mulai, waktu_selesai, poin_challenge, challenges.status, kode_mk, nama_mk, kelas.id as idkelas FROM challenges,kelas,members WHERE challenges.id_kelas = kelas.id AND members.id_kelas = kelas.id AND members.nim_nip_user = '$nimnip' ORDER BY challenges.id DESC");
          }
      }else {
        $challenge = DB::select("SELECT challenges.id, judul_challenge, deskripsi_challenge, waktu_mulai, waktu_selesai, poin_challenge, challenges.status, kode_mk, nama_mk, kelas.id as idkelas  FROM challenges,kelas WHERE challenges.id_kelas = kelas.id AND kelas.id_dosen = '$nimnip'");
      }
      //echo json_encode($challenge);
      return view('page.challenge' ,['challenges' => $challenge]);
    }

    function pagechallenge($id){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingsbuatchallenge',['kelas' => $kelas ,'totalposts' => $totalposts ,'totalmember' => $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingsbuatchallenge',['kelas' => $kelas ,'totalposts' => $totalposts ,'totalmember' => $totalmember]);
      }

    }
    function settingschallenge($id,Request $req){
      if($req->search){
        $cari = $req->search;
      }else {
        $cari = "";
      }
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $challenge = DB::select("SELECT*FROM challenges WHERE id_kelas='$id' AND judul_challenge LIKE '%$cari%' ORDER BY id DESC");
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingschallenge',['kelas' => $kelas, 'challenge' => $challenge,'totalposts' => $totalposts, 'totalmember' => $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $challenge = DB::select("SELECT*FROM challenges WHERE id_kelas='$id' AND judul_challenge LIKE '%$cari%' ORDER BY id DESC");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingschallenge',['kelas' => $kelas, 'challenge' => $challenge,'totalposts' => $totalposts, 'totalmember' => $totalmember]);
      }

    }

    function editchallenge(Request $req){
      $id = $req->id;
      $challenge = Challenge::find($id);
      $challenge->judul_challenge = $req->judul_challenge;
      $challenge->deskripsi_challenge = $req->deskripsi_challenge;
      $challenge->waktu_mulai = $req->waktu_mulai." ".$req->jam_mulai;
      $challenge->waktu_selesai = $req->waktu_selesai." ".$req->jam_selesai;
      $challenge->pilihan1 = $req->pilihan1;
      $challenge->pilihan2 = $req->pilihan2;
      $challenge->pilihan3 = $req->pilihan3;
      $challenge->pilihan4 = $req->pilihan4;
      $challenge->pilihanbenar = $req->pilihanbenar;
      $challenge->poin_challenge = $req->poinchallenge;
      $cekend = strtotime($req->waktu_selesai." ".$req->jam_selesai);
      $now = date("Y-m-d H:i:s");
      if($cekend > $now){
        $challenge->status = "Open";
      }else {
        $challenge->status = "Close";
      }
      $challenge->save();

      return back()->with('sukses','Challenge telah di Update!');
    }

    function pageeditchallenge($id,$idchallenge){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $challenge = DB::select("SELECT id, judul_challenge, deskripsi_challenge, date(waktu_mulai) as tgl_mulai, time(waktu_mulai) as jam_mulai, date(waktu_selesai) as tgl_selesai, time(waktu_selesai) as jam_selesai, pilihan1, pilihan2, pilihan3, pilihan4, pilihanbenar, poin_challenge, status FROM challenges WHERE id='$idchallenge'");
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingseditchallenge',['kelas' => $kelas , 'challenge' => $challenge ,'totalposts' => $totalposts,'totalmember'=> $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $challenge = DB::select("SELECT id, judul_challenge, deskripsi_challenge, date(waktu_mulai) as tgl_mulai, time(waktu_mulai) as jam_mulai, date(waktu_selesai) as tgl_selesai, time(waktu_selesai) as jam_selesai, pilihan1, pilihan2, pilihan3, pilihan4, pilihanbenar, poin_challenge, status FROM challenges WHERE id='$idchallenge'");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingseditchallenge',['kelas' => $kelas , 'challenge' => $challenge ,'totalposts' => $totalposts,'totalmember'=> $totalmember]);
      }

    }

    function hapuschallenge(Request $req){
      $idchallenge = $req->idchallenge;
      $idkelas = $req->idkelas;
      $challenge = Challenge::find($idchallenge);
      $challenge->delete();

      return back()->with('sukses','Data telah dihapus');
    }

    function detailpagechallenge($id,$idchallenge){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $challenge = DB::select("SELECT challenges.id, challenges.judul_challenge, deskripsi_challenge, waktu_mulai, waktu_selesai, pilihan1, pilihan2,pilihan3, pilihan4,pilihanbenar, poin_challenge, status, challenges.created_at, nama_user, nim_nip, level, profile_photo_path FROM challenges,users WHERE challenges.id = '$idchallenge' AND challenges.id_author = users.nim_nip");
          //$challenge = Challenge::where('id',$idchallenge)->get();
          $nimnip = Auth::user()->nim_nip;
          if(Auth::user()->hak_akses=="Dosen"){
            $jawaban = DB::select("SELECT jawabans.id, jawabans.id_tugas,nama_user, nim_nip, jawabans.id_file, tglsubmit_tugas, nilai_tugas, jawabans.status FROM jawabans,users WHERE jawabans.id_user = users.nim_nip AND jawabans.id_tugas = '$idchallenge'");
          }elseif (Auth::user()->hak_akses="Mahasiswa") {
            $jawaban = DB::select("SELECT*FROM jawaban_challenges WHERE id_challenge='$idchallenge' AND id_user='$nimnip'");
          }
          return view('page.challengedetail',['kelas' => $kelas,'challenge' => $challenge, 'jawaban' => $jawaban, 'totalposts' => $totalposts, 'totalmember' => $totalmember]);
        }
      }else {
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $challenge = DB::select("SELECT challenges.id, challenges.judul_challenge, deskripsi_challenge, waktu_mulai, waktu_selesai, pilihan1, pilihan2,pilihan3, pilihan4,pilihanbenar, poin_challenge, status, challenges.created_at, nama_user, nim_nip, level, profile_photo_path FROM challenges,users WHERE challenges.id = '$idchallenge' AND challenges.id_author = users.nim_nip");
        //$challenge = Challenge::where('id',$idchallenge)->get();
        $nimnip = Auth::user()->nim_nip;
        if(Auth::user()->hak_akses=="Dosen"){
          $jawaban = DB::select("SELECT jawabans.id, jawabans.id_tugas,nama_user, nim_nip, jawabans.id_file, tglsubmit_tugas, nilai_tugas, jawabans.status FROM jawabans,users WHERE jawabans.id_user = users.nim_nip AND jawabans.id_tugas = '$idchallenge'");
        }elseif (Auth::user()->hak_akses="Mahasiswa") {
          $jawaban = DB::select("SELECT*FROM jawaban_challenges WHERE id_challenge='$idchallenge' AND id_user='$nimnip'");
        }
        return view('page.challengedetail',['kelas' => $kelas,'challenge' => $challenge, 'jawaban' => $jawaban, 'totalposts' => $totalposts, 'totalmember' => $totalmember]);
      }


    }

    function updatestatus(Request $req){
      $id = $req->id;
      $challenge = Challenge::where('id',$id)->get();
      foreach($challenge as $challenge){
        $waktumulai = $challenge->waktu_mulai;
        $waktuselesai = $challenge->waktu_selesai;
      }
      date_default_timezone_set("Asia/Makassar");
      $now = date("Y-m-d H:i:s");
      $totimestart = strtotime($waktumulai);
      $totimeend = strtotime($waktuselesai);
      $totimenow = strtotime($now);

      if($totimenow < $totimestart){
        $status = "Coming Soon";
      }elseif ($totimenow > $totimestart && $totimenow < $totimeend) {
        $status = "Open";
      }elseif($totimenow > $totimeend) {
        $status = "Close";
      }

      $update = Challenge::find($id);
      $update->status = $status;
      $update->save();

      return $status;
    }
    function updatestatusall(){
      $challenge = Challenge::all();
      foreach($challenge as $challenge){
        $waktumulai = $challenge->waktu_mulai;
        $waktuselesai = $challenge->waktu_selesai;
        $idchallenge = $challenge->id;
        date_default_timezone_set("Asia/Makassar");
        $now = date("Y-m-d H:i:s");
        $totimestart = strtotime($waktumulai);
        $totimeend = strtotime($waktuselesai);
        $totimenow = strtotime($now);

        if($totimenow < $totimestart){
          $status = "Coming Soon";
        }elseif ($totimenow > $totimestart && $totimenow < $totimeend) {
          $status = "Open";
        }elseif($totimenow > $totimeend) {
          $status = "Close";
        }
        $update = Challenge::find($idchallenge);
        $update->status = $status;
        $update->save();
      }

    }

    function jawabchallenge(Request $req){
      $opsi = $req->opsi;
      $id = $req->id;
      $nimnip = Auth::user()->nim_nip;
      $challenge = Challenge::where('id',$id)->get();
      foreach($challenge as $ch){
        $pilihanbenar = $ch->pilihanbenar;
        $poin = $ch->poin_challenge;
        $idkelas = $ch->id_kelas;
      }
      $members = DB::select("SELECT*FROM members WHERE id_kelas='$idkelas' AND nim_nip_user='$nimnip'");
      $users = DB::select("SELECT*FROM users WHERE nim_nip ='$nimnip'");

      foreach($members as $member){
        $poinawalmember = $member->poin;
      }
      foreach($users as $user){
        $poinawaluser = $user->jumlah_poin;
        $levelawaluser = $user->level;
        $expawaluser = $user->exp;
      }
      if($opsi == $pilihanbenar){
        $nilai = "Benar";
        $jwb = new JawabanChallenge;
        $jwb->id_challenge = $id;
        $jwb->id_user = Auth::user()->nim_nip;
        $jwb->jawaban_challenge = $opsi;
        $jwb->penilaian = $nilai;
        $jwb->hadiah_poin = $poin;
        $jwb->save();

        $expawaluser  = $expawaluser+$poin;
        while(true){
          if($expawaluser > 100){
            $levelawaluser = $levelawaluser +1;
            $expawaluser = $expawaluser - 100;
          }else {
            $expawaluser = $expawaluser ;
            break;
          }
        }

        $poinmember = $poinawalmember + $poin;
        $poinuser = $poinawaluser + $poin;
        $updatepoinmember = DB::select("UPDATE members set poin='$poinmember' WHERE id_kelas='$idkelas' AND nim_nip_user='$nimnip'");
        $updatepoinuser = DB::select("UPDATE users set jumlah_poin='$poinuser', level='$levelawaluser', exp='$expawaluser' WHERE nim_nip='$nimnip'");

      }else {
        $nilai = "Salah";
        $jwb = new JawabanChallenge;
        $jwb->id_challenge = $id;
        $jwb->id_user = Auth::user()->nim_nip;
        $jwb->jawaban_challenge = $opsi;
        $jwb->penilaian = $nilai;
        $jwb->hadiah_poin = 0;
        $jwb->save();
      }
      return $nilai;
    }

    function buatchallenge(Request $req){
      $strdate = $req->waktu_mulai;
      $strtime = $req->jam_mulai;
      $enddate = $req->waktu_selesai;
      $endtime = $req->jam_selesai;
      $waktumulai = $strdate." ".$strtime;
      $waktuselesai = $enddate." ".$endtime;

      $challenge = new Challenge;
      $challenge->id_author = Auth::user()->nim_nip;
      $challenge->id_kelas = $req->id_kelas;
      $challenge->judul_challenge = $req->judul_challenge;
      $challenge->deskripsi_challenge = $req->deskripsi_challenge;
      $challenge->waktu_mulai = $waktumulai;
      $challenge->waktu_selesai = $waktuselesai;
      $challenge->pilihan1 = $req->pilihan1;
      $challenge->pilihan2 = $req->pilihan2;
      $challenge->pilihan3 = $req->pilihan3;
      $challenge->pilihan4 = $req->pilihan4;
      $challenge->pilihanbenar = $req->pilihanbenar;
      $challenge->poin_challenge = $req->poinchallenge;
      $cekend = strtotime($req->waktu_selesai." ".$req->jam_selesai);
      $now = date("Y-m-d H:i:s");
      if($cekend > $now){
        $challenge->status = "Open";
      }else {
        $challenge->status = "Close";
      }
      $challenge->save();

      return back()->with('sukses','Berhasil Menambahkan Challenge');
    }
}
