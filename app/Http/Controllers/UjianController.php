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
use App\Models\Ujian;
use App\Models\JawabanUjian;
use Auth;

class UjianController extends Controller
{
    function index($id){
      $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
      $ujian = DB::select("SELECT ujians.id, nama_user, deskripsi_ujian, ujians.id_author, judul_ujian, tipe_ujian, deadline_tanggal, deadline_jam, status, DAYOFMONTH(deadline_tanggal) as day, MONTHNAME(deadline_tanggal) as month FROM ujians,users WHERE ujians.id_author = users.nim_nip AND ujians.id_kelas='$id' ORDER BY id DESC");
      $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
      $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
    return view('page.kelasujian',['kelas' => $kelas,'ujian' => $ujian ,'totalposts' => $totalposts,'totalmember' => $totalmember]);
    }


    function detailujian($id,$idujian){
      $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
      $ujian = DB::select("SELECT ujians.id,ujians.id_kelas, id_author, judul_ujian, tipe_ujian, deskripsi_ujian, deadline_tanggal, deadline_jam, status, ujians.created_at, nama_user, level, nim_nip, profile_photo_path  FROM ujians,users WHERE ujians.id='$idujian' AND ujians.id_author = users.nim_nip");
      //$ujian = Ujian::where('id',$idujian)->get();
      $file = DB::select("SELECT*FROM files WHERE id_foreign='$idujian' AND type='Ujian'");
      $nimnip = Auth::user()->nim_nip;
      $member = DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id'");
      $totalmember = count($member);
      $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      if(Auth::user()->hak_akses=="Dosen"){
        $filejawaban = DB::select("SELECT*FROM files WHERE id_foreign='$idujian' AND type='JawabanUjian'");
        $jawaban = DB::select("SELECT jawaban_ujians.id, jawaban_ujians.id_ujian,nama_user, nim_nip, jawaban_ujians.id_file, tglsubmit_ujian, nilai_ujian, jawaban_ujians.status FROM jawaban_ujians,users WHERE jawaban_ujians.id_user = users.nim_nip AND jawaban_ujians.id_ujian = '$idujian'");
      }elseif (Auth::user()->hak_akses="Mahasiswa") {
        $filejawaban = DB::select("SELECT*FROM files WHERE id_foreign='$idujian' AND author='$nimnip' AND type='JawabanUjian'");
        $jawaban = DB::select("SELECT*FROM jawaban_ujians WHERE id_user ='$nimnip' AND id_ujian ='$idujian'");
      }
      return view('page.ujiankelas',['kelas' => $kelas,'ujian' => $ujian,'file' => $file,'filejawaban' => $filejawaban , 'jawaban' => $jawaban ,'totalposts' => $totalposts, 'totalmember' => $totalmember]);
    }

    function listujian($id){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $ujian = DB::select("SELECT ujians.id, nama_user, ujians.id_author, judul_ujian, tipe_ujian, deadline_tanggal, deadline_jam, status FROM ujians,users WHERE ujians.id_author = users.nim_nip AND ujians.id_kelas='$id' ORDER BY id DESC");
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingslistujian',['kelas' => $kelas,'ujian' => $ujian ,'totalposts' => $totalposts,'totalmember' => $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $ujian = DB::select("SELECT ujians.id, nama_user, ujians.id_author, judul_ujian, tipe_ujian, deadline_tanggal, deadline_jam, status FROM ujians,users WHERE ujians.id_author = users.nim_nip AND ujians.id_kelas='$id' ORDER BY id DESC");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingslistujian',['kelas' => $kelas,'ujian' => $ujian ,'totalposts' => $totalposts,'totalmember' => $totalmember]);
      }


    }

    function updatestatusall(){
      $ujian = Ujian::all();
      foreach($ujian as $ujian){
        $tgl = $ujian->deadline_tanggal;
        $jam = $ujian->deadline_jam;
        $id = $ujian->id;
        date_default_timezone_set("Asia/Makassar");
        $now = date("Y-m-d H:i:s");
        $totimeend = strtotime($tgl." ".$jam);
        $totimenow = strtotime($now);

        if($totimenow < $totimeend){
          $status = "Open";
        }elseif($totimenow > $totimeend) {
          $status = "Close";
        }

        $update = Ujian::find($id);
        $update->status = $status;
        $update->save();
      }

      return $status;
    }

    function berinilaiujian(Request $req){
      $nilai = $req->nilai;
      $idjawaban = $req->idjawaban;
      $iduser = $req->iduser;
      $idkelas = $req->idkelas;
      $jawabans = DB::select("SELECT*FROM jawaban_ujians WHERE id='$idjawaban'");
      $members = DB::select("SELECT*FROM members WHERE id_kelas='$idkelas' AND nim_nip_user='$iduser'");
      $users = DB::select("SELECT*FROM users WHERE nim_nip ='$iduser'");

      foreach($jawabans as $jawaban){
        $nilaiawal = $jawaban->nilai_ujian;
      }
      foreach($members as $member){
        $poinawalmember = $member->poin;
      }
      foreach($users as $user){
        $poinawaluser = $user->jumlah_poin;
        $levelawaluser = $user->level;
        $expawaluser = $user->exp;
      }
      $expawaluser  = $expawaluser+$nilai;
      while(true){
        if($expawaluser > 100){
          $levelawaluser = $levelawaluser +1;
          $expawaluser = $expawaluser - 100;
        }else {
          $expawaluser = $expawaluser ;
          break;
        }
      }

      $poinmember = $poinawalmember - $nilaiawal + $nilai;
      $poinuser = $poinawaluser - $nilaiawal + $nilai;
      $updatepoinmember = DB::select("UPDATE members set poin='$poinmember' WHERE id_kelas='$idkelas' AND nim_nip_user='$iduser'");
      $updatepoinuser = DB::select("UPDATE users set jumlah_poin='$poinuser', level='$levelawaluser', exp='$expawaluser' WHERE nim_nip='$iduser'");
      $updatepointugas = DB::select("UPDATE jawaban_ujians set nilai_ujian='$nilai' WHERE id='$idjawaban'");
    }

    function hapusfile(Request $req){
      $id = $req->idujian;
      $idkelas = $req->idkelas;
      $idfile = $req->idfile;
      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$idkelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/ujian";
      }
      $files = DB::select("SELECT*FROM files WHERE id='$idfile'");
      foreach($files as $file){
        unlink("$createtugas/$file->pathfile");
      }
      $del = DB::select("DELETE FROM files WHERE id='$idfile'");

      return back()->with('sukses','File Telah dihapus!');
    }

    function formeditujian($id,$idujian){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $ujian = Ujian::where('id',$idujian)->get();
          $file = File::where('id_foreign',$idujian)->get();
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingseditujian',['kelas' => $kelas,'ujian' => $ujian, 'file' => $file,'totalposts'=> $totalposts,'totalmember'=> $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $ujian = Ujian::where('id',$idujian)->get();
        $file = File::where('id_foreign',$idujian)->get();
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingseditujian',['kelas' => $kelas,'ujian' => $ujian, 'file' => $file,'totalposts'=> $totalposts,'totalmember'=> $totalmember]);
      }

    }

    function formujian($id){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingsbuatujian',['kelas' => $kelas ,'totalposts' => $totalposts,'totalmember'=> $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingsbuatujian',['kelas' => $kelas ,'totalposts' => $totalposts,'totalmember'=> $totalmember]);
      }

    }

    function hapusujian(Request $req){
      $id = $req->idujian;
      $idkelas = $req->idkelas;
      $ujian = Ujian::find($id);
      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$idkelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/ujian";
      }
      $ujian->delete();
      $files = File::where('id_foreign',$id)->get();
      foreach ($files as $file){
        unlink("$createtugas/$file->pathfile");
        $f = File::find($file->id);
        $f->delete();
      }
      //echo $idkelas;
      return back()->with('sukses','Tugas Telah Dihapus');
    }

    function buatujian(Request $req){
      $ujian = new Ujian;
      $ujian->id_kelas = $req->id_kelas;
      $ujian->id_author = Auth::user()->nim_nip;
      $ujian->judul_ujian = $req->judul_ujian;
      $ujian->tipe_ujian = $req->tipe_ujian;
      $ujian->deskripsi_ujian = $req->deskripsi_ujian;
      $ujian->deadline_tanggal = $req->deadline_tanggal;
      $ujian->deadline_jam = $req->deadline_jam;
      $ujian->status = "Open";
      $ujian->save();
      $id_ujian = $ujian->id;
      $id_kelas = $req->id_kelas;

      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$id_kelas'");
      foreach($pathkelas as $pathkelas){
        $createujian ="file/".$pathkelas->nama_mk."".$pathkelas->id."/ujian";
      }
      if($req->hasFile('file')){
        $files = $req->file('file');
        foreach($files as $file){
          $namafile = $file->getClientOriginalName();
          $pathfile = round(microtime(true)).$namafile;
          $upload = $createujian;
          echo $file->move($upload,$pathfile);
          $savefile = new File;
          $savefile->id_foreign = $id_ujian;
          $savefile->type = "Ujian";
          $savefile->author = "";
          $savefile->namafile = $namafile;
          $savefile->pathfile = $pathfile;
          $savefile->save();
        }
      }

      return redirect("/kelas/settings/ujian/$req->id_kelas")->with('sukses','Tugas Berhasil Dibuat');
    }

    function jawabujian(Request $req){
      $idujian = $req->idujian;
      $id_kelas = $req->idkelas;
      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$id_kelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/ujian";
      }
      if($req->hasFile('filejawaban')){
        $file = $req->file('filejawaban');
        $namafile = $file->getClientOriginalName();
        $pathfile = round(microtime(true)).$namafile;
        $file->move($createtugas,$pathfile);
        $savefile = new File;
        $savefile->id_foreign = $idujian;
        $savefile->type = "JawabanUjian";
        $savefile->author = Auth::user()->nim_nip;
        $savefile->namafile = $namafile;
        $savefile->pathfile = $pathfile;
        $savefile->save();
        $idfile = $savefile->id;
      }else {
        $idfile = " ";
      }
      $deadlinetugas = DB::select("SELECT*FROM ujians where id='$idujian'");
      foreach($deadlinetugas as $deadline){
        $tgldeadline = $deadline->deadline_tanggal;
        $jamdeadline = $deadline->deadline_jam;
      }
      $tgl = $tgldeadline." ".$jamdeadline;
      date_default_timezone_set("Asia/Makassar");
      $deadline = strtotime($tgl);
      $now = strtotime(date("Y-m-d H:i:s"));
      if($now < $deadline ){
        $status = "Done";
      }else {
        $status = "Done Late";
      }

      $jawab = new JawabanUjian;
      $jawab->id_ujian = $idujian;
      $jawab->id_user = Auth::user()->nim_nip;
      $jawab->tglsubmit_ujian = $now;
      $jawab->id_file = $idfile;
      $jawab->nilai_ujian = 0;
      $jawab->status = $status;
      $jawab->save();

      return back()->with('sukses','File Berhasil di upload');
    }

    function hapusjawaban(Request $req){
      $idfile = $req->idfile;
      $idjawaban = $req->idjawaban;
      $idkelas = $req->idkelas;
      $idujian = $req->idujian;
      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$idkelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/ujian";
      }
      $nimnip = Auth::user()->nim_nip;
      $file = DB::select("SELECT*FROM files WHERE id_foreign='$idujian' AND type='JawabanUjian' AND author='$nimnip'");
      if($file){
        foreach($file as $file){
          $pathfile = $createtugas."/".$file->pathfile;
          unlink($pathfile);
          DB::select("DELETE FROM files WHERE id_foreign='$idujian' AND type='JawabanUjian' AND author='$nimnip'");
        }
      }
      $jawaban = DB::select("DELETE FROM jawaban_ujians WHERE id='$idjawaban'");
      return back()->with('sukses','Unsubmit');
    }


    function editujian(Request $req){
      $id_ujian = $req->id_ujian;
      $ujian = Ujian::find($id_ujian);
      $ujian->id_kelas = $req->id_kelas;
      $ujian->id_author = Auth::user()->nim_nip;
      $ujian->judul_ujian = $req->judul_ujian;
      $ujian->deskripsi_ujian = $req->deskripsi_ujian;
      $ujian->deadline_tanggal = $req->deadline_tanggal;
      $ujian->deadline_jam = $req->deadline_jam;
      $ujian->status = $req->status;
      $ujian->save();
      $id_kelas = $req->id_kelas;

      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$id_kelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/ujian";
      }
      if($req->hasFile('file')){
        $files = $req->file('file');
        foreach($files as $file){
          $namafile = $file->getClientOriginalName();
          $pathfile = round(microtime(true)).$namafile;
          $upload = $createtugas;
          $file->move($upload,$pathfile);
          $savefile = new File;
          $savefile->id_foreign = $id_ujian;
          $savefile->type = "Ujian";
          $savefile->author ="";
          $savefile->namafile = $namafile;
          $savefile->pathfile = $pathfile;
          $savefile->save();
        }
      }

      return redirect("/kelas/settings/ujian/$req->id_kelas")->with('sukses','Tugas Berhasil diUpdate!');
    }
}
