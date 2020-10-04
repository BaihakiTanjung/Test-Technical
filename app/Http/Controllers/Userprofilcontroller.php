<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userprofil;
use DB;

class Userprofilcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userprofil = DB::table('userprofil')
            ->join('users', 'users_id', '=', 'users.id')
            ->select('userprofil.id', 'users_id', 'nl', 'tgl', 'jk', 'agama', 'users.email')
            ->get();
        return view('users.index', compact('userprofil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nl' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'email' => 'required|email',
        ], [
            'nl.required' => 'Tidak boleh kosong!!',
            'jk.required' => 'Wajib di pilih!!',
            'agama.required' => 'Wajib di pilih',
            'email.required' => 'Tidak boleh kosong dan harus sesuai Format Email'
        ]);
        // $validatedData = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);
        DB::table('userprofil')->insert([
            'users_id' => $request->ui,
            'nl' => $request->nl,
            'tgl' => $request->tgl,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'email' => $request->email,
            'umur' => $request->umur
        ]);

        return redirect('/userprofil');
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
    public function edit($id)
    {
        $userprofil = Userprofil::where('id', $id)->get();
        return view('users.edit', compact('userprofil'));
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

        $this->validate($request, [
            'nl' => 'required',
            'tgl' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'email' => 'required|email',
        ], [
            'nl.required' => 'Tidak boleh kosong!!',
            'tgl.required' => 'Tanggal harus diisi',
            'jk.required' => 'Wajib di pilih!!',
            'agama.required' => 'Wajib di pilih',
            'email.required' => 'Tidak boleh kosong dan harus sesuai Format Email'
        ]);
        DB::table('userprofil')->where('id', $request->id)->update([
            'users_id' => $request->ui,
            'nl' => $request->nl,
            'tgl' => $request->tgl,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'email' => $request->email,
            'umur' => $request->umur
        ]);
        return redirect('/userprofil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Userprofil::where('id', '=', $id)->delete();
        return redirect('/userprofil');
    }
}
