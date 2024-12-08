<?php
 
namespace App\Http\Controllers;
 
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 
class MahasiswaController extends Controller
{
	public function index(): View 
	{
    		// mengambil data dari table pegawai
		
		$mahasiswas = Mahasiswa::latest()->paginate(10);
    		// mengirim data pegawai ke view index
			return view('mahasiswas.index', compact('mahasiswas'));
 
	}
 
	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$mahasiswas = DB::table('tatausahas')
		->whereAny(['pertanyaan'], 'LIKE', "%".$cari."%")
		->paginate();

      //if (DB::table('mahasiswas')->where('pertanyaan', 'LIKE', "%".$cari."%")->doesntExist()) {
        // echo "Maaf tidak ada jawaban yang sama dengan pertanyaan yang ditanyakan anda";
      //} else {
        // echo "Record with name Rehan Khan Exists in the table :students";
      //}
		// mengirim data pegawai ke view index
		
    		// mengirim data pegawai ke view index
		return view('mahasiswas.index',['mahasiswas' => $mahasiswas]);
 
	}
 
}