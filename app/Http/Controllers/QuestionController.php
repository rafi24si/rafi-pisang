<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        	$request->validate([
		    'nama'  => 'required|max:20',
		    'email' => ['required','email'],
		    'pertanyaan' => 'required|max:300|min:8',
		]);
        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['pertanyaan'] = $request->pertanyaan;
        return redirect()->route('home')->with('info', 'Terima kasih <b>'.$data['nama'].'</b> sudah mengisi pertanyaan! Pertanyaan anda sudah kami inputkan, Akan kami respon di email anda <b>'.$data['email'].'</b>!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
