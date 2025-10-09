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
        $request->validate([
		    'nama'  => 'required|max:30',
		    'email' => ['required','email'],
		    'pertanyaan' => 'required|max:300',
		],[
            'nama.required'  => 'Isi dengan nama lengkap',
            'email.required' => 'Email wajib pcr',
            'pertanyaan.required' => 'Pertanyaan wajib diisi',
        ]);

        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['pertanyaan'] = $request->pertanyaan;

        return redirect()->route('home')->with('info', 'terima kasih ' . $data['nama'] . ' sudah bertanya, kami akan menjawab pertanyaan anda melalui email ' . $data['email']);
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
