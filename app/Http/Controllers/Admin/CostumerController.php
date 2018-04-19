<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Costumer;
use App\User;
use App\Reservation;

class CostumerController extends Controller
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
        $costumer = Costumer::all();
        $user = User::all();
        return view('admin.costumer.index', compact(['costumer', $costumer],['user', $user]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $reservation = Reservation::all();
         $costumer = Costumer::find($id);
            return view('admin.costumer.single', compact(['costumer'],['reservation']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costumers = Costumer::find($id);
        return view('admin.costumer.edit',compact(['costumers',$costumers]));
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
        $costumer = Costumer::find($id);
        $costumer->name = $request->name;
        $costumer->address = $request->address;
        $costumer->phone = $request->phone;
        $costumer->gender = $request->gender;
        $costumer->email = $request->email;
        $costumer->users_id = $request->users_id;
        $costumer->save();

        return redirect('/admin/costumer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $costumer = Costumer::find($id);
        $user = User::where('username', '=', $costumer->users_id);

        $user->delete();
        $costumer->delete();
        return redirect('/admin/costumer')->with('status', 'Daftar Hadir Terhapus!');
    }
}
