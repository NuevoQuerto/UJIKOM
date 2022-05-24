<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$anggotas = Anggota::paginate(10);
		
        return view('anggota.index', ['anggotas' => $anggotas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create');
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
			'No_Anggota' => 'required|string|unique:anggotas,No_Anggota|max:255',
			'Nama' => 'required|string|max:255',
			'Wajib' => 'required|integer',
			'Pokok' => 'required|integer',
			'Saldo' => 'required|integer',
		]);
		
		Anggota::create($request->all());
		
        return redirect()->route('anggotas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($no_anggota)
    {
		$anggota = Anggota::where('No_Anggota', $no_anggota)->first();
		
        return view('anggota.edit', ['anggota' => $anggota]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_anggota)
    {
        $request->validate([
			'Nama' => 'string|max:255',
			'Wajib' => 'integer',
			'Pokok' => 'integer',
			'Saldo' => 'integer',
		]);
		
		$anggota = Anggota::where('No_Anggota', $no_anggota)->first();
		$anggota->Nama = $request->input('Nama');
		$anggota->Wajib = $request->input('Wajib');
		$anggota->Pokok = $request->input('Pokok');
		$anggota->Saldo = $request->input('Saldo');
		$anggota->save();
		
        return redirect()->route('anggotas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_anggota)
    {
        $anggota = Anggota::where('No_Anggota', $no_anggota)->first();
		$anggota->delete();
		
		return redirect()->route('anggotas.index');
    }
}
