<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Costumer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ManageAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = User::all();
        return view('admin.manage.manage-admin', compact(['user', $user]));
    }


    public function create()
    {
        $user = User::all();
        return view('admin.manage.manage-admin', compact(['user', $user]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [ 
            'username' => 'required|max:255|unique:users',
            'name' => 'required|max:255',
            'jabatan' => 'required',
            'email' => 'nullable',
            'password' => 'required|min:6|confirmed',
    ]);

        $user = new User;
        $user->username = Input::get('username');
        $user->name = Input::get('name');
        $user->jabatan = Input::get('jabatan');
        $user->email = Input::get('email');
        $user->password = Input::get('password');

        $user->save();

        $costumer = new Costumer;
        $costumer->name = Input::get('name');
        $costumer->address = Input::get('address');
        $costumer->phone = Input::get('phone');
        $costumer->gender = Input::get('gender');
        $costumer->users_id = Input::get('username');

        $costumer->save();

        return redirect('admin/manage-admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
        $costumer = Costumer::find($id);
        $user = User::where('username', '=', $costumer->users_id);

        $user->delete();
        $costumer->delete();
        return redirect('/admin/manage-admin')->with('status', 'Daftar Hadir Terhapus!');
    }
}
