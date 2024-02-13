<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Technician;
use App\Models\TypeActivity;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity ::all(); //select * from Activity
        return view('activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technicians = Technician::all();// all(consultar)
        $types = TypeActivity::all();
        return view('activity.create', compact('technicians','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $activity = Activity::create($request->all());
        session()->flash('message','Registro creado exitosamente');
        return redirect()->route('activity.index');
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
        $activity = Activity::find($id);
        if($activity)
        {
            $technicians = Technician::all();// all(consultar)
            $types = TypeActivity::all();
            return view('activity.edit', compact('activity','technicians','types'));
        }

            session()->flash('warning','No se encontro el registro solicitado');
            return redirect()->route('activity.index');


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activity = Activity::find($id);

        if($activity)//si exite
        {
            $activity->update($request->all()); //update causal description =...
            session()->flash('message','Registro actualizado exitosamente');
        }
        else//si no existe
        {
            session()->flash('warning','No se encuentra el registro solicitado');
        }
        return redirect()->route('activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::find($id);
        if($activity)//si la causal exite
        {
            $activity->delete(); //delete from causal where id = x
            session()->flash('message','Registro eliminado exitosamente');
        }
        else//si la causal no existe
        {
            session()->flash('warning','No se encuentra el registro solicitado');
        }
        return redirect()->route('activity.index');
    }
}
