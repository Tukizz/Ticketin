<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Costumer;
use App\Rute;
use App\User;
use App\Transportation;
use App\Transportation_type;
use Auth;

class ReservationController extends Controller
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
        return view('user.reservation.index', compact(['reservation', $reservation],['costumer', $costumer],['rute', $rute],['user', $user],['transportation', $transportation],['transportation_type', $transportation_type]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.reservation.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = new Reservation;
        $reservation->reservation_code = $request->reservation_code = rand(0,250);
        $reservation->reservation_at = $request->reservation_at;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->costumer_id = $request->costumer_id;
        $reservation->seat_code = $request->seat_code = rand(0,250);
        $reservation->rute_id = $request->rute_id;
        $reservation->users_id = $request->users_id;
        $reservation->save();

        return redirect('/costumer/list-reservation');
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
        $costumer = Costumer::all();
        $rute = Rute::all();
        $user = User::all();
        $transportation = Transportation::all();
        $transportation_type = Transportation_type::all();
        $reservation = Reservation::find($id);
        return view('user.reservation.edit', compact(['reservation', $reservation],['costumer', $costumer],['rute', $rute],['user', $user],['transportation', $transportation],['transportation_type', $transportation_type]));
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
        $reservation = Reservation::find($id);
        $reservation->reservation_code = $request->reservation_code;
        $reservation->reservation_at = $request->reservation_at;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->costumer_id = $request->costumer_id;
        $reservation->seat_code = $request->seat_code;
        $reservation->rute_id = $request->rute_id;
        $reservation->users_id = $request->users_id;
        $reservation->save();

        return redirect('/reservation');
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
        return redirect('/reservation')->with('status', 'Daftar Hadir Terhapus!');
    }
}