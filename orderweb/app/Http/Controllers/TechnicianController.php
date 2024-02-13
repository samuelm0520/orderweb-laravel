<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technicians = Technician ::all();
        return view('technician.index', compact('technicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('technician.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $technician = Technician::where('document', '=' , $request->document)
                                ->first();
        if($technician)
        {
            session()->flash('error', 'ya existe un tecnico con este documento');
            return redirect()->route('technician.create');
        }
        $technician = Technician::create($request->all());
        session()->flash('message', 'Registro creado exitosamnete');
        return redirect()->route(('technician.index'));
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
        $technician = Technician::where('document', '=' , $id)->first();

        if($technician)
        {
            return view('technician.edit', compact('technician'));
        }
        session()->flash('warning', 'No se encuentra el registro solicitado');
        return redirect()->route('technician.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $documnet)
    {
        $technician = Technician::where('document', '=' , $documnet)->first();

        if($technician)
        {
            $technician->name = $request->name;
            $technician->especiality = $request->especiality;
            $technician->phone = $request->phone;
            $technician->save();
            session()->flash('message','Registro actualizado exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('technician.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technician = Technician::where('document', '=' , $id)->first();

        if($technician)
        {
            $technician->delete();
            session()->flash('message','Registro eliminado exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('technician.index');

    }
}