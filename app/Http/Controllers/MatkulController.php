<?php

namespace App\Http\Controllers;

use App\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkul = Matkul::all();
        return view('matkul.index', compact('matkul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matkul.create');
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
            'kode_matkul' => 'required|unique:matkul',
            'nama_matkul' => 'required',
            'sks' => 'required',
            'semester' => 'required',
        ]);

        Matkul::create($request->all());
        return redirect()->route('matkul.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function show(Matkul $matkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matkul = Matkul::where('kode_matkul', $id)->first();
        return view('matkul.edit', compact('matkul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matkul' => 'required',
            'sks' => 'required',
            'semester' => 'required',
        ]);
        Matkul::where('kode_matkul', $id)
            ->update([
                'nama_matkul' => $request->nama_matkul,
                'sks' => $request->sks,
                'semester' => $request->semester,
            ]);
        return redirect()->route('matkul.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matkul::where('kode_matkul', $id)->delete();
        return redirect()->route('matkul.index')->with('success', 'Data Berhasil Dihapus');
    }
}