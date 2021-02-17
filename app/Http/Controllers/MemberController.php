<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use App\Models\Kelas;
use App\Models\Materi;
use Auth;

class MemberController extends Controller
{
    function joinkelas(Request $req){
      $cek = Kelas::where('kode_kelas',$req->kodekelas)->first();
      if($cek == null){

        return back()->with('fail','Kode Kelas Salah!');
      }else {
        $member = new Member;
        $member->id_kelas = $cek->id;
        $member->nim_nip_user = Auth::user()->nim_nip;
        $member->status = "Member";
        $member->poin = 0;
        $member->save();

        return redirect('/kelas/info/'.$cek->id);
      }
    }

    function kickmember(Request $req){
      $idmember = $req->idmember;
      $idkelas = $req->idkelas;
      $delete = DB::select("DELETE FROM members WHERE id='$idmember' AND id_kelas='$idkelas'");
      return back()->with('sukses','Data Telah dihapus!');
    }

    function settingsmember($id,Request $req){
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
          $members = DB::select("SELECT*FROM members,users WHERE members.nim_nip_user = users.nim_nip AND id_kelas='$id' order by nama_user ASC ");
          $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
          $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
        return view('page.settingslisttugas',['kelas' => $kelas,'members' => $members ,'totalposts' => $totalposts,'totalmember' => $totalmember]);
        }
      }else {

        $kelas = DB::select("SELECT kelas.id, cover_kelas, kode_mk, nama_mk, nama_user,kode_kelas,komposisi_eas, komposisi_ets, komposisi_quis, komposisi_tugas,profile_photo_path FROM kelas,users WHERE kelas.id_dosen = users.nim_nip AND kelas.id = $id");
        $members = DB::select("SELECT*FROM members,users WHERE members.nim_nip_user = users.nim_nip AND id_kelas='$id' order by nama_user ASC ");
        $totalmember = count( DB::select("SELECT nama_user, level, members.poin FROM members,users WHERE members.nim_nip_user = users.nim_nip AND status='Member' AND id_kelas='$id' ORDER BY members.poin"));
        $totalposts = count(DB::select("SELECT*FROM tugas WHERE id_kelas ='$id'")) + count(DB::select("SELECT*FROM challenges WHERE id_kelas='$id'")) + count(Materi::where('id_kelas',$id)->get()->sortByDesc('created_at'));
      return view('page.settingsmember',['kelas' => $kelas,'members' => $members ,'totalposts' => $totalposts,'totalmember' => $totalmember]);
      }
    }
}
