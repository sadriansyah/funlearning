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
use Auth;
class KelasController extends Controller
{
    function index(Request $req){
      $membercek = DB::select("SELECT nama_user,nim_nip, id_kelas,profile_photo_path, nim_nip_user FROM members,users WHERE members.nim_nip_user = users.nim_nip");
      if($req->nama_kelas){
        $nmakelas = $req->nama_kelas;
      }else {
        $nmakelas = "";
      }
      if(Auth::user()->hak_akses == "Dosen"){
        $nipdosen = Auth::user()->nim_nip;
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk,id_dosen, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas, profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id_dosen= '$nipdosen' AND nama_mk LIKE '%$nmakelas%' ");

      }elseif (Auth::user()->hak_akses == "Mahasiswa") {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk,id_dosen, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas, profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND nama_mk LIKE '%$nmakelas%'");
      }
      return view('page.kelas',['kelas' => $kelas,'membercek' =>$membercek]);
    }

    function classwork($id){
      $user=Auth::user()->nim_nip;
      $member = DB::select("SELECT nama_user, nim_nip,level, members.poin,profile_photo_path FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin DESC LIMIT 10");
      $mem = DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin");
      $creator = DB::select("SELECT nama_user,nim_nip, level,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id='$id'");
      $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
      $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      $tugas = DB::select("SELECT tugas.id, judul_tugas, nama_user, level, deskripsi_tugas, deadline_tanggal, deadline_jam, status, profile_photo_path, tugas.created_at FROM tugas,kelas,users WHERE tugas.id_author = users.nim_nip AND tugas.id_kelas = kelas.id AND kelas.id='$id' ORDER BY tugas.id DESC");
      $file = DB::select("SELECT*FROM files where type='Tugas'");
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas, profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $classinfo = Kelas::where('id',$id)->get();
          return view('page.pagestugas',['kelas' => $kelas,'classinfo'=> $classinfo,'tugas' => $tugas, 'files' => $file,'totalmember'=> $totalmember,'totalposts'=> $totalposts ,'members' => $member,  'creator' => $creator ]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas, profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $classinfo = Kelas::where('id',$id)->get();
        return view('page.pagestugas',['kelas' => $kelas,'classinfo'=> $classinfo,'tugas'=> $tugas, 'files' => $file ,'totalmember'=> $totalmember,'totalposts'=> $totalposts ,'members' => $member,  'creator' => $creator ]);
      }
    }

    function detailkelas($id){
      $user=Auth::user()->nim_nip;
      $materi = DB::select("SELECT judul_materi, deskripsi_materi, materis.created_at, nama_user,profile_photo_path, level, materis.id  FROM materis,kelas,users WHERE materis.id_kelas = kelas.id AND kelas.id_dosen = users.nim_nip AND materis.id_kelas='$id' ORDER BY materis.created_at DESC");
      //$materi = Materi::where('id_kelas',$id)->get()->sortByDesc('created_at');
      $file = File::all();
      $tugas = DB::select("SELECT id, deadline_tanggal, deadline_jam, judul_tugas, deskripsi_tugas, id_kelas, DAYOFMONTH(deadline_tanggal) as day, MONTHNAME(deadline_tanggal) as month FROM tugas WHERE id_kelas ='$id' AND status='Open' ORDER BY deadline_tanggal DESC, deadline_jam DESC");
      $challenge = DB::select("SELECT*FROM challenges WHERE id_kelas='$id' AND status='Open' OR status='Coming Soon'  ORDER BY waktu_selesai  DESC");
      $member = DB::select("SELECT nama_user, level, members.poin, profile_photo_path FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin DESC LIMIT 10");
      $creator = DB::select("SELECT nama_user,nim_nip, level, profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id='$id'");
      $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
      $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas, profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $classinfo = Kelas::where('id',$id)->get();
          return view('page.detailkelas',['kelas' => $kelas,'classinfo'=> $classinfo, 'materi' => $materi,'files' => $file ,'tugas' => $tugas, 'challenge' => $challenge, 'members' => $member, 'creator' => $creator ,'totalmember'=> $totalmember,'totalposts'=> $totalposts]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas, profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $classinfo = Kelas::where('id',$id)->get();
        return view('page.detailkelas',['kelas' => $kelas,'classinfo'=> $classinfo, 'materi' => $materi,'files' => $file ,'tugas' => $tugas, 'challenge' => $challenge, 'members' => $member, 'totalmember'=> $totalmember,'totalposts'=> $totalposts, 'creator' => $creator ]);
      }
    }

    function updatestatus(){
      $tugas = Tugas::all();
      foreach($tugas as $tugas){
        $tgl = $tugas->deadline_tanggal;
        $jam = $tugas->deadline_jam;
        $id = $tugas->id;
        date_default_timezone_set("Asia/Makassar");
        $now = date("Y-m-d H:i:s");
        $totimeend = strtotime($tgl." ".$jam);
        $totimenow = strtotime($now);

        if($totimenow < $totimeend){
          $status = "Open";
        }elseif($totimenow > $totimeend) {
          $status = "Close";
        }

        $update = Tugas::find($id);
        $update->status = $status;
        $update->save();
      }

      return $status;
    }

    function memberkelas($id , Request $req){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          if($req->cari){
            $member = DB::select("SELECT members.id, nama_user,poin,nim_nip,level,email, profile_photo_path FROM members,users WHERE members.nim_nip_user = users.nim_nip AND members.id_kelas='$id' AND users.nama_user LIKE '%$req->cari%' OR users.nim_nip LIKE '%$req->cari%' ORDER BY members.poin DESC");
          }else {
              $member = DB::select("SELECT members.id, nama_user,poin,nim_nip,level,email, profile_photo_path FROM members,users WHERE members.nim_nip_user = users.nim_nip AND members.id_kelas='$id' ORDER BY members.poin DESC");
          }

          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas, profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $classinfo = Kelas::where('id',$id)->get();
          $totalmember = count($member);
          return view('page.memberkelas',['kelas' => $kelas, 'classinfo' => $classinfo ,'member'=> $member ,'totalmember'=> $totalmember,'totalposts'=> $totalposts]);
        }
      }else {
        if($req->cari){
          $member = DB::select("SELECT members.id, nama_user,poin,nim_nip,level,email, profile_photo_path FROM members,users WHERE members.nim_nip_user = users.nim_nip AND members.id_kelas='$id' AND users.nama_user LIKE '%$req->cari%' OR users.nim_nip LIKE '%$req->cari%' ORDER BY members.poin DESC");
        }else {
            $member = DB::select("SELECT members.id, nama_user,poin,nim_nip,level,email, profile_photo_path FROM members,users WHERE members.nim_nip_user = users.nim_nip AND members.id_kelas='$id' ORDER BY members.poin DESC");
        }
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas, profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $classinfo = Kelas::where('id',$id)->get();
        $totalmember = count($member);
        return view('page.memberkelas',['kelas' => $kelas, 'classinfo' => $classinfo ,'member'=> $member ,'totalmember'=> $totalmember,'totalposts'=> $totalposts]);
      }

    }

    function challengepage($id){
      $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
      $classinfo = Kelas::where('id',$id)->get();
      $member = DB::select("SELECT members.id, nama_user,poin,nim_nip,level,email FROM members,users WHERE members.nim_nip_user = users.nim_nip AND members.id_kelas='$id'");
      $challenge = DB::select("SELECT*FROM challenges WHERE id_kelas='$id' order by id DESC");
      $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
      $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.kelaschallenge',['kelas' => $kelas, 'classinfo' => $classinfo ,'member'=> $member, 'challenge' => $challenge , 'totalposts' => $totalposts, 'totalmember' => $totalmember]);
    }

    function hapuskelas(Request $req){
      $id = $req->idkelas;
      $kelas = Kelas::find($id);
      $kelas->delete();
      return redirect('/kelas')->with('sukses','Kelas Telah dihapus');
    }


    function settingskelas($id){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingskelas',['kelas' => $kelas ,'totalposts' => $totalposts ,'totalmember' => $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingskelas',['kelas' => $kelas ,'totalposts' => $totalposts ,'totalmember' => $totalmember]);
      }

    }
    function coverkelas($id){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.coverkelas',['kelas' => $kelas, 'totalposts' => $totalposts, 'totalmember' => $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.coverkelas',['kelas' => $kelas, 'totalposts' => $totalposts, 'totalmember' => $totalmember]);
      }

    }
    function tugas($id){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingstugas',['kelas' => $kelas ,'totalposts' => $totalposts,'totalmember'=> $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingstugas',['kelas' => $kelas ,'totalposts' => $totalposts,'totalmember'=> $totalmember]);
      }

    }

    function setcover(Request $req){
      $id = $req->id;
      $cover = $req->cover;
      $kelas = Kelas::find($id);
      $kelas->cover_kelas = $cover;
      $kelas->save();
      return redirect('/kelas/settings/kelas/cover/'.$id)->with('sukses','Cover telah di Update!');
    }
    function setowncover(Request $req){
      $id = $req->id;
      $cek = count(DB::select("SELECT*FROM files WHERE id_foreign='$id' AND type='Cover'"));
      if($cek > 0){
        $coversblm = DB::select("SELECT*FROM files WHERE id_foreign='$id' AND type='Cover'");
        foreach($coversblm as $cvr){
          $lokasifile = "img/cover/".$cvr->pathfile;
          unlink($lokasifile);
        }
        if($req->hasFile('cover')){
          $files = $req->file('cover');
          $namafile = $files->getClientOriginalName();
          $pathfile = round(microtime(true)).$namafile;
          echo $files->move("img/cover",$pathfile);
          $savefile = DB::select("UPDATE files set namafile='$namafile', pathfile='$pathfile' WHERE id_foreign='$id' AND type='Cover'");
          $kelas = Kelas::find($id);
          $kelas->cover_kelas = $pathfile;
          $kelas->save();
        }
      }else {
        if($req->hasFile('cover')){
          $files = $req->file('cover');
          $namafile = $files->getClientOriginalName();
          $pathfile = round(microtime(true)).$namafile;
          echo $files->move("img/cover",$pathfile);
          $savefile = new File;
          $savefile->id_foreign = $id;
          $savefile->type = "Cover";
          $savefile->author = "";
          $savefile->namafile = $namafile;
          $savefile->pathfile = $pathfile;
          $savefile->save();
          $id = $req->id;
          $kelas = Kelas::find($id);
          $kelas->cover_kelas = $pathfile;
          $kelas->save();
        }
      }
    return redirect('/kelas/settings/kelas/cover/'.$id)->with('sukses','Cover telah di Update!');
  }

    function formedittugas($id,$idtugas){
      $user = Auth::user()->nim_nip;
      if(Auth::user()->hak_akses=="Mahasiswa"){
        $cek = DB::select("SELECT*FROM kelas,members WHERE kelas.id = members.id_kelas AND members.id_kelas = '$id' AND members.nim_nip_user = '$user'");
        if($cek == null){
          return redirect('/kelas')->with('fail','Anda Bukan Member Kelas!');
        }else {
          $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
          $tugas = Tugas::where('id',$idtugas)->get();
          $file = File::where('id_foreign',$idtugas)->get();
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
          return view('page.settingsedittugas',['kelas' => $kelas,'tugas' => $tugas, 'file' => $file,'totalposts'=> $totalposts,'totalmember'=> $totalmember]);
        }
      }else {
        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $tugas = Tugas::where('id',$idtugas)->get();
        $file = File::where('id_foreign',$idtugas)->get();
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingsedittugas',['kelas' => $kelas,'tugas' => $tugas, 'file' => $file,'totalposts'=> $totalposts,'totalmember'=> $totalmember]);
      }

    }

    function berinilai(Request $req){
      $nilai = $req->nilai;
      $idjawaban = $req->idjawaban;
      $iduser = $req->iduser;
      $idkelas = $req->idkelas;
      $jawabans = DB::select("SELECT*FROM jawabans WHERE id='$idjawaban'");
      $members = DB::select("SELECT*FROM members WHERE id_kelas='$idkelas' AND nim_nip_user='$iduser'");
      $users = DB::select("SELECT*FROM users WHERE nim_nip ='$iduser'");

      foreach($jawabans as $jawaban){
        $nilaiawal = $jawaban->nilai_tugas;
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
      $updatepointugas = DB::select("UPDATE jawabans set nilai_tugas='$nilai' WHERE id='$idjawaban'");
    }


    function listtugas($id, Request $req){
      if($req->cari){
        $cari = $req->cari;
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
          $tugas = DB::select("SELECT*FROM tugas WHERE id_kelas='$id' AND judul_tugas LIKE '%$cari%'");
          //$tugas = Tugas::where('id_kelas',$id)->get();
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingslisttugas',['kelas' => $kelas,'tugas' => $tugas ,'totalposts' => $totalposts,'totalmember' => $totalmember]);
        }
      }else {

        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $tugas = DB::select("SELECT*FROM tugas WHERE id_kelas='$id' AND judul_tugas LIKE '%$cari%'");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingslisttugas',['kelas' => $kelas,'tugas' => $tugas ,'totalposts' => $totalposts,'totalmember' => $totalmember]);
      }
    }

    function detailtugas($id,$idtugas){
      $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
      $tugas  = DB::select("SELECT tugas.id,judul_tugas, deskripsi_tugas, tugas.created_at, tugas.deadline_tanggal, tugas.deadline_jam, tugas.status, nama_user, nim_nip, profile_photo_path, level FROM tugas,users WHERE tugas.id='$idtugas' AND tugas.id_author = users.nim_nip");
      //$tugas = Tugas::where('id',$idtugas)->get();
      $file = DB::select("SELECT*FROM files WHERE id_foreign='$idtugas' AND type='Tugas'");
      $nimnip = Auth::user()->nim_nip;
      $member = DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id'");
      $totalmember = count($member);
      $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      if(Auth::user()->hak_akses=="Dosen"){
        $filejawaban = DB::select("SELECT*FROM files WHERE id_foreign='$idtugas' AND type='JawabanTugas'");
        $jawaban = DB::select("SELECT jawabans.id, jawabans.id_tugas,nama_user, nim_nip, jawabans.id_file, tglsubmit_tugas, nilai_tugas, jawabans.status FROM jawabans,users WHERE jawabans.id_user = users.nim_nip AND jawabans.id_tugas = '$idtugas'");
      }elseif (Auth::user()->hak_akses="Mahasiswa") {
        $filejawaban = DB::select("SELECT*FROM files WHERE id_foreign='$idtugas' AND author='$nimnip' AND type='JawabanTugas'");
        $jawaban = DB::select("SELECT*FROM jawabans WHERE id_user ='$nimnip' AND id_tugas ='$idtugas'");
      }
      return view('page.tugaskelas',['kelas' => $kelas,'tugas' => $tugas,'file' => $file,'jawabantugas' => $filejawaban , 'jawaban' => $jawaban ,'totalposts' => $totalposts, 'totalmember' => $totalmember]);
    }

    function ubahkelas(Request $req,$id){
      $kelas = Kelas::find($id);
      $kelas->kode_mk = $req->kode_mk;
      $kelas->nama_mk = $req->nama_mk;
      $kelas->komposisi_tugas = $req->komposisi_tugas;
      $kelas->komposisi_quis = $req->komposisi_quis;
      $kelas->komposisi_ets = $req->komposisi_ets;
      $kelas->komposisi_eas = $req->komposisi_eas;
      $kelas->save();
      return back()->with('sukses','Settings Kelas telah di Update!');
    }


    function buatkelas(Request $req){
      $this->validate($req,[
        'kode_mk' => 'required',
        'nama_mk' => 'required'
      ]);
      $randomchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
      $kode_mk = $req->kode_mk;
      $nama_mk = $req->nama_mk;

      $kelas = new Kelas;
      $kelas->nama_mk = $req->nama_mk;
      $kelas->kode_mk = $req->kode_mk;
      $kelas->id_dosen = Auth::user()->nim_nip;
      $kelas->cover_kelas = "default.jpg";
      $kelas->kode_kelas = substr(str_shuffle($randomchar),0,6);
      $kelas->komposisi_tugas = 0;
      $kelas->komposisi_quis = 0;
      $kelas->komposisi_ets = 0;
      $kelas->komposisi_eas = 0;
      $kelas->save();
      return redirect('/kelas')->with('sukses','Berhasil Membuat Kelas');
    }


    function buattugas(Request $req){
      $tugas = new Tugas;
      $tugas->id_kelas = $req->id_kelas;
      $tugas->id_author = Auth::user()->nim_nip;
      $tugas->judul_tugas = $req->judul_tugas;
      $tugas->deskripsi_tugas = $req->deskripsi_tugas;
      $tugas->deadline_tanggal = $req->deadline_tanggal;
      $tugas->deadline_jam = $req->deadline_jam;
      $tugas->status = "Open";
      $tugas->save();
      $id_tugas = $tugas->id;
      $id_kelas = $req->id_kelas;

      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$id_kelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/tugas";
      }
      if($req->hasFile('file')){
        $files = $req->file('file');
        foreach($files as $file){
          $namafile = $file->getClientOriginalName();
          $pathfile = round(microtime(true)).$namafile;
          $upload = $createtugas;
          echo $file->move($upload,$pathfile);
          $savefile = new File;
          $savefile->id_foreign = $id_tugas;
          $savefile->type = "Tugas";
          $savefile->author = "";
          $savefile->namafile = $namafile;
          $savefile->pathfile = $pathfile;
          $savefile->save();
        }
      }

      return redirect("/kelas/settings/tugas/listtugas/$req->id_kelas")->with('sukses','Tugas Berhasil Dibuat');
    }

    function deletepostfile(Request $req){
      $id = $req->id;
      $files = DB::select("SELECT files.id, files.namafile, files.pathfile, kelas.nama_mk, kelas.id as id_kelas  FROM files, materis,kelas WHERE files.id_foreign = materis.id AND materis.id_kelas = kelas.id AND files.type = 'Materi' AND files.id = '$id'");
      foreach($files as $file){
        $path = "file/".$file->nama_mk."".$file->id_kelas."/materi";
        unlink("$path/$file->pathfile");
        $f = File::find($id);
        $f->delete();
      }
    }

    function editpost(Request $req){
      $deskripsi = $req->deskripsi_materi;
      $cek = preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $deskripsi, $match);
      $arr = array();
      foreach($match[0] as $m){
        $fil['link'] = $m;
        array_push($arr,$fil);
      }
      foreach($arr as $val){
        $link = $val['link'];
        $fin = str_replace($link, "<a href='$link' target='_blank'>$link</a>",$deskripsi);
        $deskripsi = $fin;
      }
      $id = $req->idmateri;
      $materi = Materi::find($id);
      $materi->deskripsi_materi = $deskripsi;
      $materi->save();
      $pathkelas = DB::select("SELECT nama_mk, kelas.id FROM materis, kelas WHERE materis.id_kelas = kelas.id AND materis.id='$id'");
      foreach($pathkelas as $pathkelas){
        $createmateri ="file/".$pathkelas->nama_mk."".$pathkelas->id."/materi";
      }
      if($req->hasFile('file')){
        $files = $req->file('file');
        foreach($files as $file){
          $namafile = $file->getClientOriginalName();
          $pathfile = round(microtime(true)).$namafile;
          $upload = $createmateri;
          echo $file->move($upload,$pathfile);
          $savefile = new File;
          $savefile->id_foreign = $id;
          $savefile->type = "Materi";
          $savefile->author = "";
          $savefile->namafile = $namafile;
          $savefile->pathfile = $pathfile;
          $savefile->save();
        }
      }
      return back()->with('sukses','Post Diperbaharui');
    }

    function getpostdata(Request $req){
      $id = $req->id;
      $materi = DB::select("SELECT materis.id, materis.id_kelas, nama_user, materis.id_author, deskripsi_materi FROM materis, users WHERE materis.id_author = users.nim_nip AND materis.id ='$id'");
      $files = DB::select("SELECT*FROM files WHERE id_foreign='$id' AND type='Materi'");

      foreach($materi as $m){
        $deskripsi = $m->deskripsi_materi;
      }
      $cek = preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $deskripsi, $match);
      $arr = array();
      foreach($match[0] as $m){
        $fil['link'] = $m;
        array_push($arr,$fil);
      }
      foreach($arr as $val){
        $link = $val['link'];
        $href = "<a href='$link' target='_blank'>$link</a>";
        $fin = str_replace($href, $link,$deskripsi);
        $deskripsi = $fin;
      }

      return json_encode(array('data' => $materi, 'file' => $files, 'deskripsi' => $deskripsi));
    }


    function buatmateri(Request $req){
      $deskripsi = $req->deskripsi_materi;
      $cek = preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $deskripsi, $match);
      $arr = array();
      foreach($match[0] as $m){
        $fil['link'] = $m;
        array_push($arr,$fil);
      }
      foreach($arr as $val){
        $link = $val['link'];
        $fin = str_replace($link, "<a href='$link' target='_blank'>$link</a>",$deskripsi);
        $deskripsi = $fin;
      }

      $materi = new Materi;
      $materi->id_kelas = $req->id_kelas;
      $materi->id_author = Auth::user()->nim_nip;
      $materi->judul_materi = "Announcement";
      $materi->deskripsi_materi = $deskripsi;
      $materi->save();
      $id_materi = $materi->id;
      $id_kelas = $req->id_kelas;

      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$id_kelas'");
      foreach($pathkelas as $pathkelas){
        $createmateri ="file/".$pathkelas->nama_mk."".$pathkelas->id."/materi";
      }
      if($req->hasFile('file')){
        $files = $req->file('file');
        foreach($files as $file){
          $namafile = $file->getClientOriginalName();
          $pathfile = round(microtime(true)).$namafile;
          $upload = $createmateri;
          echo $file->move($upload,$pathfile);
          $savefile = new File;
          $savefile->id_foreign = $id_materi;
          $savefile->type = "Materi";
          $savefile->author = "";
          $savefile->namafile = $namafile;
          $savefile->pathfile = $pathfile;
          $savefile->save();
        }
      }

      return redirect("/kelas/info/$req->id_kelas")->with('sukses','Tugas Berhasil Dibuat');
    }

    function edittugas(Request $req){
      $id_tugas = $req->id_tugas;
      $tugas = Tugas::find($id_tugas);
      $tugas->id_kelas = $req->id_kelas;
      $tugas->id_author = Auth::user()->nim_nip;
      $tugas->judul_tugas = $req->judul_tugas;
      $tugas->deskripsi_tugas = $req->deskripsi_tugas;
      $tugas->deadline_tanggal = $req->deadline_tanggal;
      $tugas->deadline_jam = $req->deadline_jam;
      $tugas->status = $req->status;
      $tugas->save();
      $id_kelas = $req->id_kelas;

      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$id_kelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/tugas";
      }
      if($req->hasFile('file')){
        $files = $req->file('file');
        foreach($files as $file){
          $namafile = $file->getClientOriginalName();
          $pathfile = round(microtime(true)).$namafile;
          $upload = $createtugas;
          $file->move($upload,$pathfile);
          $savefile = new File;
          $savefile->id_foreign = $id_tugas;
          $savefile->type = "Tugas";
          $savefile->author = "";
          $savefile->namafile = $namafile;
          $savefile->pathfile = $pathfile;
          $savefile->save();
        }
      }

      return redirect("/kelas/settings/tugas/listtugas/$req->id_kelas")->with('sukses','Tugas Berhasil diUpdate!');
    }
    function hapusjawaban(Request $req){
      $idfile = $req->idfile;
      $idjawaban = $req->idjawaban;
      $idkelas = $req->idkelas;
      $idtugas = $req->idtugas;
      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$idkelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/tugas";
      }
      $nimnip = Auth::user()->nim_nip;
      $file = DB::select("SELECT*FROM files WHERE id_foreign='$idtugas' AND type='JawabanTugas' AND author='$nimnip'");
      if($file){
        foreach($file as $file){
          $pathfile = $createtugas."/".$file->pathfile;
          unlink($pathfile);
          DB::select("DELETE FROM files WHERE id_foreign='$idtugas' AND type='JawabanTugas' AND author='$nimnip'");
        }
      }
      $jawaban = DB::select("DELETE FROM jawabans WHERE id='$idjawaban'");
      return back()->with('sukses','Unsubmit');
    }

    function jawabtugas(Request $req){
      $idtugas = $req->idtugas;
      $id_kelas = $req->idkelas;
      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$id_kelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/tugas";
      }
      if($req->hasFile('filejawaban')){
        $file = $req->file('filejawaban');
        $namafile = $file->getClientOriginalName();
        $pathfile = round(microtime(true)).$namafile;
        $file->move($createtugas,$pathfile);
        $savefile = new File;
        $savefile->id_foreign = $idtugas;
        $savefile->type = "JawabanTugas";
        $savefile->author = Auth::user()->nim_nip;
        $savefile->namafile = $namafile;
        $savefile->pathfile = $pathfile;
        $savefile->save();
        $idfile = $savefile->id;
      }else {
        $idfile = " ";
      }
      $deadlinetugas = DB::select("SELECT*FROM tugas where id='$idtugas'");
      foreach($deadlinetugas as $deadline){
        $tgldeadline = $deadline->deadline_tanggal;
        $jamdeadline = $deadline->deadline_jam;
      }
      $tgl = $tgldeadline." ".$jamdeadline;
      $deadline = strtotime($tgl);
      $now = date("Y-m-d H:i:s");
      if($deadline < $now){
        $status = "Done";
      }else {
        $status = "Done Late";
      }

      $jawab = new Jawaban;
      $jawab->id_tugas = $idtugas;
      $jawab->id_user = Auth::user()->nim_nip;
      $jawab->tglsubmit_tugas = $now;
      $jawab->id_file = $idfile;
      $jawab->nilai_tugas = 0;
      $jawab->status = $status;
      $jawab->save();

      return back()->with('sukses','File Berhasil di upload');
    }

    function hapustugas(Request $req){
      $id = $req->idtugas;
      $idkelas = $req->idkelas;
      $tugas = Tugas::find($id);
      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$idkelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/tugas";
      }
      $tugas->delete();
      $files = DB::select("SELECT*FROM files WHERE id_foreign='$id' AND type='Tugas'");
      foreach ($files as $file){
        unlink("$createtugas/$file->pathfile");
        $f = File::find($file->id);
        $f->delete();
      }
      //echo $idkelas;
      return back()->with('sukses','Tugas Telah Dihapus');
    }

    function hapuspost(Request $req){
      $id = $req->idpost;
      $idkelas = $req->idkelas;
      $materi = Materi::find($id);
      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$idkelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/materi";
      }
      $materi->delete();
      $files = DB::select("SELECT*FROM files WHERE id_foreign='$id' AND type='Materi'");
      foreach ($files as $file){
        unlink("$createtugas/$file->pathfile");
        $f = File::find($file->id);
        $f->delete();
      }
      return back()->with('sukses','Tugas Telah Dihapus');
    }

    function hapusfile(Request $req){
      $id = $req->idtugas;
      $idkelas = $req->idkelas;
      $idfile = $req->idfile;
      $pathkelas = DB::select("SELECT*FROM kelas WHERE id='$idkelas'");
      foreach($pathkelas as $pathkelas){
        $createtugas ="file/".$pathkelas->nama_mk."".$pathkelas->id."/tugas";
      }
      $files = DB::select("SELECT*FROM files WHERE id='$idfile'");
      foreach($files as $file){
        unlink("$createtugas/$file->pathfile");
      }
      $del = DB::select("DELETE FROM files WHERE id='$idfile'");

      return back()->with('sukses','File Telah dihapus!');
    }
}
