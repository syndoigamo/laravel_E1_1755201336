<?php

namespace App\Http\Controllers;

use App\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = Prodi::all();

        return view('prodi.index', compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_prodi' => 'required|unique:prodi',
            'nama_prodi' => 'required',
            'kaprodi' => 'required',
        ]);

        Prodi::create($request->all());
        return redirect()->route('prodi.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prodi = Prodi::where('kode_prodi', $id)->first();
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'kaprodi' => 'required',
        ]);

        Prodi::where('kode_prodi', $id)
            ->update([
                'nama_prodi' => $request->nama_prodi,
                'kaprodi' => $request->kaprodi,
            ]);
        return redirect()->route('prodi.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prodi::where('kode_prodi', $id)->delete();
        return redirect()->route('prodi.index')->with('success', 'Data Berhasil Dihapus');
    }
}
