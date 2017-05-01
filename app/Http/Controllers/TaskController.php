<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'name'      =>  'required',
            'description'    =>  'required',
            'location'   =>  'required',
            'skills'    =>  'required',
            'project_id' => 'required'
        ]);

        $skills = [];
        foreach($request['skills'] as $skill) {
            $skills[] = Skill::findOrFail($skill);
        }
        $request['status'] = 'N';

        $task = Task::create($request->only(['name', 'description', 'location','status', 'project_id']));

        foreach($skills as $skill) {
            $task->skills()->attach($skill->id);
        }

        return redirect()->action('TaskController@show', ['task' => $task->id ])->with('Success', "You have successfully created the Task : ".$request['name']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $user = User::all();
        return view('tasks.show', compact('task', 'user'));
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

    public function addUser(Request $request)
    {

    }

}
