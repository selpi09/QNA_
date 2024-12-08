<?php

namespace App\Http\Controllers; 

//import return type View
use App\Models\Tatausaha;
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\RedirectResponse;

class TatausahaController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all products
        $tatausahas = Tatausaha::latest()->paginate(10);
        //render view with products
        return view('tatausahas.index', compact('tatausahas'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('tatausahas.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'pertanyaan'         => 'required',
            'jawaban'         => 'required',
            
        ]);

        //create product
        Tatausaha::create([
            'pertanyaan'         => $request->pertanyaan,
            'jawaban'         => $request->jawaban,
            
        ]);

        //redirect to index
        return redirect()->route('tatausahas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get product by ID
        $tatausaha = Tatausaha::findOrFail($id);

        //render view with product
        return view('tatausahas.show', compact('tatausaha'));
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $tatausaha = Tatausaha::findOrFail($id);

        //render view with product
        return view('tatausahas.edit', compact('tatausaha'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'pertanyaan'         => 'required',
            'jawaban'         => 'required',
            
        ]);

        //get product by ID
        $tatausaha = Tatausaha::findOrFail($id);

        //check if image is uploaded
        

            //update product without image
            $tatausaha->update([
                'pertanyaan'         => $request->pertanyaan,
                'jawaban'   => $request->jawaban,
               
            ]);
        

        //redirect to index
        return redirect()->route('tatausahas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $tatausaha = Tatausaha::findOrFail($id);

        

        //delete product
        $tatausaha->delete();

        //redirect to index
        return redirect()->route('tatausahas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}