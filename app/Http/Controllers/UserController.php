<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $nbAdmin = count(User::all()->where('role_id',3));


        return view ('users.index', ['users' => $users, 'editAdmin' => $nbAdmin < 5 ? true : false]);
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
        //
    }

    public function setAdmin(Request $request)
    {
        $id = $request->input('id');

        try
        {
            $user = User::find($id);

            if($user == null) throw new Exception('User not found');

            $user->role_id = 3;

            $user->save();
        }
        catch(Exception $e)
        {
            console.log($e);
        }
        finally
        {
            return redirect('/users')->with('status', $user->pseudo . ' est admin');
        }
    }

    public function unsetAdmin(Request $request)
    {
        $id = $request->input('id');

        try
        {
            $user = User::find($id);

            if($user == null) throw new Exception('User not found');

            $user->role_id = 2;

            $user->save();
        }
        catch(Exception $e)
        {
            console.log($e);
        }
        finally
        {
            return redirect('/users')->with('status', $user->pseudo . ' n\'est plus admin');
        }
    }
}
