<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasirs = User::paginate(10);
		
        return view('kasir.index', ['kasirs' => $kasirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir.create');
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
			'KODEKSR' => 'required|string|unique:users,KODEKSR|max:255',
			'NAMAKSR' => 'required|string|max:255',
			'email' => 'required|email|unique:users|max:255',
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
		]);
		
		$fields = $request->all();
		$fields['password'] = Hash::make($request->password);
		
		User::create($fields);
		
        return redirect()->route('kasirs.index');
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
    public function edit($kode_ksr)
    {
        $kasir = User::where('KODEKSR', $kode_ksr)->first();
		
        return view('kasir.edit', ['kasir' => $kasir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_ksr)
    {
        $request->validate([
			'NAMAKSR' => 'string|max:255',
			'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
		]);
		
		$kasir = User::where('KODEKSR', $kode_ksr)->first();
		$kasir->NAMAKSR = $request->input('NAMAKSR');
		
		if ($request->filled('password')) {
			$kasir->password = Hash::make($request->password);
		}
		
		$kasir->save();
		
        return redirect()->route('kasirs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_ksr)
    {
        $kasir = User::where('KODEKSR', $kode_ksr)->first();
		$kasir->delete();
		
		return redirect()->route('kasirs.index');
    }
}
