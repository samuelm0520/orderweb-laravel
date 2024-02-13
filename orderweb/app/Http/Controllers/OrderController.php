<?php

namespace App\Http\Controllers;

use App\Models\Causal;
use App\Models\Observation;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $causals = Causal::all();
        $observations = Observation::all();
        $cities = array(

            ['name' => 'Buga', 'value' => 'Buga'],
            ['name' => 'Cali', 'value' => 'Cali'],
            ['name' => 'Tulua', 'value' => 'Tuluá'],
        );


        return view('order.create', compact('causals','observations','cities'));                                       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::created($request->all());
        session()->flash('message','Registro creado exitosamente');
        return redirect()->route('order.index');
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
        $order = Order::find($id);
        if($order)
        {
            $causals = Causal::all();
            $observations = Observation::all();
            $cities = array(

                ['name' => 'Buga', 'value' => 'Buga'],
                ['name' => 'Cali', 'value' => 'Cali'],
                ['name' => 'Tulua', 'value' => 'Tuluá'],
            );
            //Consultar ACtividades asociadas y no asociadas
            $activitiesAdded = $order->activities;
            //consultar actividades no asociadas 
            $query = DB::select('select * from activity where activity.id not in 
                (select order_activity.activity_id from order_activity where order_activity.order_id = ?)', [$id]);
            $activitiesNotInOrder = Collection:: make($query);
            return view('order.edit',compact('order','causals','observations','cities','activitiesAdded', 'activitiesNotInOrder'));

        }
        session()->flash('warning','No se encuentra el registro solicitado');
        return redirect()->route('order.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        if($order)
        {
            $order->update($request->all());
            session()->flash('message','Registro actualizado exitosamente');
        }
        else
        {
            session()->flash('warning','No se encuentra el registro solicitado');
        }
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if($order)
        {
            $order->delete();
            session()->flash('message','Registro eliminado exitosamente');
        }
        else
        {
            session()->flash('warning','No se encuentra el registro solicitado');
        }
        return redirect()->route('order.index');
    }

    public function add_activity(string $order_id, string $activity_id)
    {
        
    }
}
