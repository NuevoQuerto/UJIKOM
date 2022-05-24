<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjams = Pinjam::paginate(10);
		
        return view('pinjam.index', ['pinjams' => $pinjams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pinjam.create');
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
			'No_Pinjam' => 'required|string|unique:pinjams,No_Pinjam|max:255',
			'No_Anggota' => 'required|string|exists:anggotas,No_Anggota|max:255',
			'JmlPinjam' => 'required|integer',
			'KodeKsr' => 'required|string|exists:users,KODEKSR|max:255',
		]);
		
		Pinjam::create($request->all());
		
        return redirect()->route('pinjams.index');
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
    public function edit($no_pinjam)
    {
        $pinjam = Pinjam::where('No_Pinjam', $no_pinjam)->first();
		
        return view('pinjam.edit', ['pinjam' => $pinjam]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_pinjam)
    {
        $request->validate([
			'No_Anggota' => 'string|exists:anggotas,No_Anggota|max:255',
			'JmlPinjam' => 'integer',
			'KodeKsr' => 'string|exists:users,KODEKSR|max:255',
		]);
		
		$pinjam = Pinjam::where('No_Pinjam', $no_pinjam)->first();
		$pinjam->No_Anggota = $request->input('No_Anggota');
		$pinjam->JmlPinjam = $request->input('JmlPinjam');
		$pinjam->KodeKsr = $request->input('KodeKsr');
		$pinjam->save();
		
        return redirect()->route('pinjams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_pinjam)
    {
        $pinjam = Pinjam::where('No_Pinjam', $no_pinjam)->first();
		$pinjam->delete();
		
		return redirect()->route('pinjams.index');
    }
}
