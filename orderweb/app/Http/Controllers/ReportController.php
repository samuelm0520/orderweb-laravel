<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Technician;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technicians = Technician::all();
        return view("reports.index", compact('technicians'));
    }


    /**
     * Exporta todos los tecnicos existentes en PDF
     */
    public function export_technicians()
    {
        $technicians = Technician::all();
        $data = array(
            'technicians' => $technicians
        );
        $pfp = Pdf::loadView('reports.export_technicians', $data)
                    ->setPaper('letter','portrait');
        return $pfp->download('Technicians.pdf');
    }

    public function export_users()
    {
        $users = User::all();
        $data = array(
            'users' => $users
        );
        $pfp = Pdf::loadView('reports.export_users', $data)
                    ->setPaper('letter','portrait');
        return $pfp->download('users.pdf');
    }

    public function export_activities_by_technician(Request $request)
    {
        $technician = Technician::where('document','=', $request['technician_id'])->first();
        $activities = Activity::where('technician_id','=', $request['technician_id'])->get();
        $data = array(
            'technician' => $technician,
            'activities' => $activities
        );
        $pdf = Pdf::loadView('reports.export_activities_by_technician',$data)->setPaper('letter','portrait');
        return $pdf->download('ActivitiesByTechnician.pdf');
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
        //
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
