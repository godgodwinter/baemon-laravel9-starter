<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class crudController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='kategori';
        $items=kategori::orderBy('prefix','desc')
        ->orderBy('nama','asc')
        ->paginate();
        return view('pages.dev.kategori.index',compact('items','request','pages'));
    }
    public function create()
    {
        $pages='kategori';
        return view('pages.dev.kategori.create',compact('pages'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'nama'=>'required|unique:kategori',
                'prefix'=>'required',
                'kode'=>'required',
            ],
            [
                'nama.nama'=>'Nama harus diisi',
            ]);
            DB::table('kategori')->insert(
                array(
                       'nama'     =>   $request->nama,
                       'prefix'     =>   $request->prefix,
                       'kode'     =>   $request->kode,
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));
    return redirect()->route('dev.crud')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');
    }

    public function edit(kategori $item)
    {
        $pages='kategori';
        return view('pages.dev.kategori.edit',compact('pages','item'));
    }
    public function update(kategori $item,Request $request)
    {

        $request->validate([
            'nama'=>'required',
        ],
        [
            'nama.required'=>'nama harus diisi',
            'prefix'=>'required',
            'kode'=>'required',
        ]);

            kategori::where('id',$item->id)
            ->update([
                'nama'     =>   $request->nama,
                'prefix'     =>   $request->prefix,
                'kode'     =>   $request->kode,
               'updated_at'=>date("Y-m-d H:i:s")
            ]);



    return redirect()->route('dev.crud')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(kategori $item){

        kategori::destroy($item->id);
        return redirect()->route('dev.crud')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
