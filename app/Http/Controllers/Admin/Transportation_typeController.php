<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transportation_type;

class Transportation_typeController extends Controller
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
        return view('admin.transportation_type.index', compact('transportation_type', $transportation_type));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transportation_type.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transportation_type = new Transportation_type;
        $transportation_type->description = $request->description;
        $transportation_type->save();

        return redirect('admin/transportation_type');
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
        $transportation_type = Transportation_type::find($id);
        return view('admin.transportation_type.edit')->with('transportation_type', $transportation_type);
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
        $transportation_type = Transportation_type::find($id);
        $transportation_type->description = $request->description;
        $transportation_type->save();

        return redirect('admin/transportation_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transportation_type = Transportation_type::find($id);
        $transportation_type->delete();
        return redirect('admin/transportation_type')->with('status', 'Daftar Hadir Terhapus!');
    }
}
