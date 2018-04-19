<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Costumer;
use App\Rute;
use App\User;
use App\Transportation;
use App\Transportation_type;
use App\Reservation;

class ListReservationController extends Controller
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
        $reservation = Reservation::all();
        $costumer = Costumer::all();
        $rute = Rute::all();
        $user = User::all();
        $transportation = Transportation::all();
        $transportation_type = Transportation_type::all();
        return view('user.reservation.list-reservation', compact(['reservation', $reservation],['costumer', $costumer],['rute', $rute],['user', $user],['transportation', $transportation],['transportation_type', $transportation_type]));
    }


    public function pdf()
    {
        $reservation = Reservation::all();
        $costumer = Costumer::all();
        $rute = Rute::all();
        $transportation = Transportation::all();
        $transportation_type = Transportation_type::all();
        $pdf = PDF::loadView('user.reservation.invoice', ['reservation' => $reservation], ['costumer' => $costumer]. ['rute' => $rute], ['transportation' => $transportation], ['transportation_type' => $transportation_type]);
        return $pdf->download('Ticket');
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
        //
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
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect('/costumer/reservation')->with('status', 'Daftar Hadir Terhapus!');
    }
}
