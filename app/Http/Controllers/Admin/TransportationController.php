<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transportation;
use App\Transportation_type;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $transportation_type = Transportation_type::all();
        $transportation = Transportation::all();
        return view('admin.transportation.index', compact(['transportation', $transportation],['transportation_type', $transportation_type]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transportation.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transportation = new Transportation;
        $transportation->code = $request->code;
        $transportation->description = $request->description;
        $transportation->seat_qty = $request->seat_qty;
        $transportation->transportation_type_id = $request->transportation_type_id;
        $transportation->save();

        return redirect('admin/transportation');
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
        $transportation_type = Transportation_type::all();
        $transportation = Transportation::find($id);
        return view('admin.transportation.edit', compact(['transportation'],['transportation_type']));
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
        $transportation = Transportation::find($id);
        $transportation->code = $request->code;
        $transportation->description = $request->description;
        $transportation->seat_qty = $request->seat_qty;
        $transportation->transportation_type_id = $request->transportation_type_id;
        $transportation->save();

        return redirect('admin/transportation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transportation = Transportation::find($id);
        $transportation->delete();
        return redirect('admin/transportation')->with('status', 'Daftar Hadir Terhapus!');
    }
}
