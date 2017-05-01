<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        $roles = Role::all();
        $skills = Skill::all();
        return view('users.index', compact('users', 'roles', 'skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::paginate(15);
        $roles = Role::all();
        $skills = Skill::all();
        return view('users.index', compact('users', 'roles', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required|unique:users',
            'password'   =>  'required',
            'roles'     =>  'required',
            'skills'    =>  'required'
        ]);
        $request['password'] = bcrypt($request['password']);
        $roles = [];
        foreach($request['roles'] as $role) {
            $roles[] = Role::findOrFail($role);
        }
        $skills = [];
        foreach($request['skills'] as $skill) {
            $skills[] = Skill::findOrFail($skill);
        }

        $user = User::create($request->only(['name', 'email', 'password']));

        foreach($roles as $role) {
            $user->attachRole($role);
        }

        foreach($skills as $skill) {
            $user->skills()->attach($skill->id);
        }

        return redirect()->action('UsersController@create')->with('Success', "You have successfully created the user : ".$request['name']);
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
}
