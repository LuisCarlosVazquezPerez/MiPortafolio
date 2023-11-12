<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use Illuminate\Http\Request;

class ReconocimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reconocimientos.create');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    
    public function edit(Reconocimiento $reconocimientos)
    {
        return view('reconocimientos.edit',[
            'reconocimientos' => $reconocimientos
        ]);
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
