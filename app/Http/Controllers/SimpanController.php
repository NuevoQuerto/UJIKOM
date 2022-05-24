<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simpan;

class SimpanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simpans = Simpan::paginate(10);
		
        return view('simpan.index', ['simpans' => $simpans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('simpan.create');
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
			'No_Simpan' => 'required|string|unique:simpans,No_Simpan|max:255',
			'No_Anggota' => 'required|string|exists:anggotas,No_Anggota|max:255',
			'JmlSimpan' => 'required|integer',
			'KodeKsr' => 'required|string|exists:users,KODEKSR|max:255',
		]);
		
		Simpan::create($request->all());
		
        return redirect()->route('simpans.index');
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
    public function edit($no_simpan)
    {
        $simpan = Simpan::where('No_Simpan', $no_simpan)->first();
		
        return view('simpan.edit', ['simpan' => $simpan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_simpan)
    {
        $request->validate([
			'No_Anggota' => 'string|exists:anggotas,No_Anggota|max:255',
			'JmlSimpan' => 'integer',
			'KodeKsr' => 'string|exists:users,KODEKSR|max:255',
		]);
		
		$simpan = Simpan::where('No_Simpan', $no_simpan)->first();
		$simpan->No_Anggota = $request->input('No_Anggota');
		$simpan->JmlSimpan = $request->input('JmlSimpan');
		$simpan->KodeKsr = $request->input('KodeKsr');
		$simpan->save();
		
        return redirect()->route('simpans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_simpan)
    {
        $simpan = Simpan::where('No_Simpan', $no_simpan)->first();
		$simpan->delete();
		
		return redirect()->route('simpans.index');
    }
}
