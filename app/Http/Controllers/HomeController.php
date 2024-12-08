<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Mahasiswa;
use App\Models\Tatausaha;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $mahasiswas = Mahasiswa::latest()->paginate(10);
        return view('mahasiswas.index', compact('mahasiswas'));
            
    } 
   
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tatausahaHome(): View
    {
          //get all products
          $tatausahas = Tatausaha::latest()->paginate(10);
          //render view with products
          return view('tatausahas.index', compact('tatausahas'));
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
}
