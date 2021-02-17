<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\Member;
use App\Models\Tugas;
use App\Models\File;
use App\Models\Jawaban;
use App\Models\Materi;
//use File;
use App\Models\Reward;
use App\Models\TransaksiPoin;
use Auth;

class RewardController extends Controller
{
    function kelasreward($id){
      $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
      $rewards = DB::select("SELECT rewards.id, rewards.judul_reward, nama_mk, rewards.created_at, id_trigger FROM rewards,kelas WHERE id_kelas='$id' AND rewards.id_kelas=kelas.id ORDER BY id DESC");
      $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
      $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
    return view('page.kelasreward',['kelas' => $kelas, 'rewards' => $rewards,'totalposts' => $totalposts, 'totalmember' => $totalmember]);
    }

    function klaimreward(Request $req){
      date_default_timezone_set("Asia/Makassar");
      $now = date("Y-m-d H:i:s");
      $nimnip = Auth::user()->nim_nip;
      $id = $req->idreward;
      $reward = DB::select("SELECT*FROM rewards WHERE id='$id'");
      foreach($reward as $reward){
        $syarattrigger = $reward->id_trigger;
        $tipe = $reward->tipe;
        $minimumlevel = $reward->minimum_level;
        $poinreward = $reward->poin_reward;
        $idfile = $reward->id_file;
        $hiddenitems = $reward->hidden_reward;
      }
      $users = DB::select("SELECT*FROM users WHERE nim_nip='$nimnip'");
      foreach($users as $user){
        $mylevel = $user->level;
      }

      if($minimumlevel != ""){
        if($mylevel > $minimumlevel){
          if($tipe == "tugas"){
            $cek = DB::select("SELECT*FROM jawabans WHERE id_tugas='$syarattrigger' AND id_user='$nimnip'");
            if(count($cek) > 0){
              $stat = $hiddenitems;
              $klaim = new TransaksiPoin;
              $klaim->id_user = $nimnip;
              $klaim->id_file = $idfile;
              $klaim->id_reward = $id;
              $klaim->poin_reward = $poinreward;
              $klaim->tgl_transaksi = $now;
              $klaim->save();
            }else {
              $stat = "Belum Mengerjakan Tugas";
            }
          }elseif ($tipe=="challenge") {
            $cek = DB::select("SELECT*FROM jawaban_challenges WHERE id_challenge='$syarattrigger' AND id_user='$nimnip'");
            if(count($cek) > 0){
              $stat = $hiddenitems;
              $klaim = new TransaksiPoin;
              $klaim->id_user = $nimnip;
              $klaim->id_file = $idfile;
              $klaim->id_reward = $id;
              $klaim->poin_reward = $poinreward;
              $klaim->tgl_transaksi = $now;
              $klaim->save();
            }else {
              $stat = "Belum Mengerjakan Challenge";
            }
          }else {
            $stat = $hiddenitems;
            $klaim = new TransaksiPoin;
            $klaim->id_user = $nimnip;
            $klaim->id_file = $idfile;
            $klaim->id_reward = $id;
            $klaim->poin_reward = $poinreward;
            $klaim->tgl_transaksi = $now;
            $klaim->save();
          }
        }else {
          $stat = "Level Belum Mencukupi";
        }
      }else {
        if($tipe == "tugas"){
          $cek = DB::select("SELECT*FROM jawabans WHERE id_tugas='$syarattrigger' AND id_user='$nimnip'");
          if(count($cek) > 0){
            $stat = $hiddenitems;
            $klaim = new TransaksiPoin;
            $klaim->id_user = $nimnip;
            $klaim->id_file = $idfile;
            $klaim->id_reward = $id;
            $klaim->poin_reward = $poinreward;
            $klaim->tgl_transaksi = $now;
            $klaim->save();
          }else {
            $stat = "Belum Mengerjakan Tugas";
          }
        }elseif ($tipe=="challenge") {
          $cek = DB::select("SELECT*FROM jawaban_challenges WHERE id_challenge='$syarattrigger' AND id_user='$nimnip'");
          if(count($cek) > 0){
            $stat = $hiddenitems;
            $klaim = new TransaksiPoin;
            $klaim->id_user = $nimnip;
            $klaim->id_file = $idfile;
            $klaim->id_reward = $id;
            $klaim->poin_reward = $poinreward;
            $klaim->tgl_transaksi = $now;
            $klaim->save();
          }else {
            $stat = "Belum Mengerjakan Challenge";
          }
        }else {
          $stat = $hiddenitems;
          $klaim = new TransaksiPoin;
          $klaim->id_user = $nimnip;
          $klaim->id_file = $idfile;
          $klaim->id_reward = $id;
          $klaim->poin_reward = $poinreward;
          $klaim->tgl_transaksi = $now;
          $klaim->save();
        }
      }

      return $stat;
    }

    function rewarddetail($id,$idreward){
      $nimnip = Auth::user()->nim_nip;
      $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
      $challenge = DB::select("SELECT*FROM challenges WHERE id_kelas='$id' ORDER BY id DESC");
      $tugas = DB::select("SELECT*FROM tugas WHERE id_kelas='$id' ORDER BY id DESC");
      $reward = DB::select("SELECT*FROM rewards WHERE id='$idreward'");
      foreach($reward as $reward){
        if($reward->tipe == ""){
          $syarat = "";
          $file = "";
        }else {
          $file = DB::select("SELECT*FROM files WHERE id_foreign='$reward->id' AND type='Reward'");
          if($reward->tipe=='tugas'){
            $idtugas = $reward->id_trigger;
            $syarat = DB::select("SELECT judul_tugas as judul FROM tugas WHERE id='$idtugas'");
          }elseif($reward->tipe =='challenge') {
            $idchallenge = $reward->id_trigger;
            $syarat = DB::select("SELECT judul_challenge as judul  FROM challenges WHERE id='$idchallenge'");
          }
        }
      }
      $rewards = DB::select("SELECT*FROM rewards WHERE id='$idreward'");
      $answer = DB::select("SELECT*FROM transaksi_poins WHERE id_reward='$idreward' AND id_user='$nimnip'");
      $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
      $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
    //return $answer;
    return view('page.rewarddetail',['kelas' => $kelas, 'challenge' => $challenge,'tugas' => $tugas,'rewards' => $rewards, 'answer' => $answer, 'syarat' => $syarat, 'files'=>$file, 'totalposts' => $totalposts, 'totalmember' => $totalmember]);
    }

    function settingsreward($id,Request $req){
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
          $rewards = DB::select("SELECT*FROM rewards WHERE id_kelas='$id' AND rewards.judul_reward LIKE '%$cari%' ORDER BY id DESC");
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingsreward',['kelas' => $kelas, 'rewards' => $rewards,'totalposts' => $totalposts, 'totalmember' => $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $rewards = DB::select("SELECT*FROM rewards WHERE id_kelas='$id' AND rewards.judul_reward LIKE '%$cari%' ORDER BY id DESC");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingsreward',['kelas' => $kelas, 'rewards' => $rewards,'totalposts' => $totalposts, 'totalmember' => $totalmember]);
      }

    }

    function formbuatreward($id){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $challenge = DB::select("SELECT*FROM challenges WHERE id_kelas='$id' ORDER BY id DESC");
          $tugas = DB::select("SELECT*FROM tugas WHERE id_kelas='$id' ORDER BY id DESC");
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingsbuatreward',['kelas' => $kelas, 'challenge' => $challenge,'tugas' => $tugas, 'totalposts' => $totalposts, 'totalmember' => $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $challenge = DB::select("SELECT*FROM challenges WHERE id_kelas='$id' ORDER BY id DESC");
        $tugas = DB::select("SELECT*FROM tugas WHERE id_kelas='$id' ORDER BY id DESC");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingsbuatreward',['kelas' => $kelas, 'challenge' => $challenge,'tugas' => $tugas, 'totalposts' => $totalposts, 'totalmember' => $totalmember]);
      }

    }

    function formeditreward($id,$idreward){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $challenge = DB::select("SELECT*FROM challenges WHERE id_kelas='$id' ORDER BY id DESC");
          $tugas = DB::select("SELECT*FROM tugas WHERE id_kelas='$id' ORDER BY id DESC");
          $reward = Reward::where('id',$idreward)->first();
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingseditreward',['kelas' => $kelas, 'challenge' => $challenge,'tugas' => $tugas,'reward' => $reward, 'totalposts' => $totalposts, 'totalmember' => $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $challenge = DB::select("SELECT*FROM challenges WHERE id_kelas='$id' ORDER BY id DESC");
        $tugas = DB::select("SELECT*FROM tugas WHERE id_kelas='$id' ORDER BY id DESC");
        $reward = Reward::where('id',$idreward)->first();
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingseditreward',['kelas' => $kelas, 'challenge' => $challenge,'tugas' => $tugas,'reward' => $reward, 'totalposts' => $totalposts, 'totalmember' => $totalmember]);
      }

    }


    function hapusreward(Request $req){
      $id = $req->idreward;
      $idkelas = $req->idkelas;
      $reward = Reward::find($id);
      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$idkelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="img/reward";
      }
      $reward->delete();
      $files = DB::select("SELECT*FROM files WHERE id_foreign='$id' AND type='Reward'");
      foreach ($files as $file){
        unlink("$createtugas/$file->pathfile");
        $f = File::find($file->id);
        $f->delete();
      }
      //echo $idkelas;
      return back()->with('sukses','Reward Telah Dihapus');
    }

    function buatreward(Request $req){
      $id_kelas = $req->id_kelas;
      $regrup = explode(",",$req->tipe);
      if($regrup[0]=="kosong"){
        $regrup[0] ="";
        $regrup[1] ="";
      }
      if($req->batasan_klaim == ""){
        $batasan_klaim = 0;
      }else {
        $batasan_klaim = $req->batasan_klaim;
      }
      if($req->minimum_level == ""){
        $minimum_level = 0;
      }else {
        $minimum_level = $req->minimum_level;
      }

      $reward = new Reward;
      $reward->id_kelas = $id_kelas;
      $reward->judul_reward = $req->judul_reward;
      $reward->deskripsi_reward = $req->deskripsi_reward;
      $reward->hidden_reward = $req->hidden_reward;
      $reward->batasan_klaim = $batasan_klaim;
      $reward->id_file = "";
      $reward->id_trigger = $regrup[0];
      $reward->tipe = $regrup[1];
      $reward->minimum_level = $minimum_level;
      $reward->poin_reward = $req->poin_reward;
      $reward->save();
      $idreward = $reward->id;

      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$id_kelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="img/reward";
      }
      if($req->hasFile('file')){
        $file = $req->file('file');
        $namafile = $file->getClientOriginalName();
        $pathfile = round(microtime(true)).$namafile;
        $file->move($createtugas,$pathfile);
        $savefile = new File;
        $savefile->id_foreign = $idreward;
        $savefile->type = "Reward";
        $savefile->author = Auth::user()->nim_nip;
        $savefile->namafile = $namafile;
        $savefile->pathfile = $pathfile;
        $savefile->save();
        $idfile = $savefile->id;
      }else {
        $idfile = " ";
      }
      $updatereward = Reward::find($idreward);
      $updatereward->id_file = $idfile;
      $updatereward->save();

      return redirect("/kelas/settings/rewards/$id_kelas")->with('sukses','File Berhasil di upload');
    }

    function editreward(Request $req){
      $id_kelas = $req->id_kelas;
      $idreward = $req->idreward;
      $regrup = explode(",",$req->tipe);
      if($regrup[0]=="kosong"){
        $regrup[0] ="";
        $regrup[1] ="";
      }
      if($req->batasan_klaim == ""){
        $batasan_klaim = 0;
      }else {
        $batasan_klaim = $req->batasan_klaim;
      }
      if($req->minimum_level == ""){
        $minimum_level = 0;
      }else {
        $minimum_level = $req->minimum_level;
      }
      $reward = Reward::find($idreward);
      $reward->id_kelas = $id_kelas;
      $reward->judul_reward = $req->judul_reward;
      $reward->deskripsi_reward = $req->deskripsi_reward;
      $reward->hidden_reward = $req->hidden_reward;
      $reward->batasan_klaim = $batasan_klaim;
      $reward->id_trigger = $regrup[0];
      $reward->tipe = $regrup[1];
      $reward->minimum_level = $minimum_level;
      $reward->poin_reward = $req->poin_reward;
      $reward->save();

      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$id_kelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/reward";
      }
      if($req->hasFile('file')){
        $files = DB::select("SELECT*FROM files WHERE id_foreign='$idreward' AND type='Reward'");
        foreach ($files as $file){
          unlink("$createtugas/$file->pathfile");
          $f = File::find($file->id);
          $f->delete();
        }
        $createarah = "img/reward";
        $file = $req->file('file');
        $namafile = $file->getClientOriginalName();
        $pathfile = round(microtime(true)).$namafile;
        $file->move($createarah,$pathfile);
        $savefile = new File;
        $savefile->id_foreign = $idreward;
        $savefile->type = "Reward";
        $savefile->author = Auth::user()->nim_nip;
        $savefile->namafile = $namafile;
        $savefile->pathfile = $pathfile;
        $savefile->save();
      }
      return redirect("/kelas/settings/rewards/$id_kelas")->with('sukses','File Berhasil di upload');
    }



}
