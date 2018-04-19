<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rute;
use App\Transportation;

class RuteController extends Controller
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
        $transportation = Transportation::all();
        $rute = Rute::all();
        return view('admin.rute.index', compact(['transportation', $transportation],['rute', $rute]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rute.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rute = new Rute;
        $rute->depart_at = $request->depart_at;
        $rute->rute_from = $request->rute_from;
        $rute->rute_to = $request->rute_to;
        $rute->price = $request->price;
        $rute->transportation_id = $request->transportation_id;
        $rute->save();

        return redirect('admin/rute');
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
        $transportation = Transportation::all();
        $rute = Rute::find($id);
        return view('admin.rute.edit', compact(['transportation', $transportation],['rute', $rute]));
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
        $rute = Rute::find($id);
        $rute->depart_at = $request->depart_at;
        $rute->rute_from = $request->rute_from;
        $rute->rute_to = $request->rute_to;
        $rute->price = $request->price;
        $rute->transportation_id = $request->transportation_id;
        $rute->save();

        return redirect('admin/rute');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rute = Rute::find($id);
        $rute->delete();
        return redirect('admin/rute')->with('status', 'Daftar Hadir Terhapus!');
    }
}