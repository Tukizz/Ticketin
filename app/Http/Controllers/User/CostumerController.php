<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Costumer;
use App\User;


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
        return view('user.costumer.redirect', compact('costumer', $costumer));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.costumer.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $costumer = new Costumer;
        $costumer->id = $request->id;
        $costumer->name = $request->name;
        $costumer->address = $request->address;
        $costumer->phone = $request->phone;
        $costumer->gender = $request->gender;
        $costumer->email = $request->email;
        $costumer->users_id = $request->users_id;
        $costumer->save();

        return redirect('/costumer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $costumer = Costumer::find($id);
         return view('user.costumer.index')->with('costumer', $costumer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costumer = Costumer::find($id);
        return view('user.costumer.edit',compact(['costumer',$costumer]));
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

        return redirect('/costumer');
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
        return redirect('/')->with('status', 'Daftar Hadir Terhapus!');
    }
}
