<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Project::with(['tags','project_leader','categorys'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'target_b' => 'required|numeric|between:0.00,999999,99',
            'invested' => 'required|numeric|between:0.00,999999,99',
            'description' => 'required|string',
            'd_line' => 'required|date',
            'thumbnail' => 'required|string',
            'categorys_id' => 'required|numeric',
            'project_leader_id' => 'required|numeric'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        return Project::create([
            "name" => $request->input('name'),
            "target_b" => $request->input('target_b'),
            "invested" => $request->input('invested'),
            "description" => $request->input('description'),
            "d_line" => $request->input('d_line'),
            "thumbnail" => $request->input('thumbnail'),
            "categorys_id" => $request->input('categorys_id'),
            "project_leader_id" => $request->input('project_leader_id')
        ]);
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
        return Project::find($id);
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
        $project= Project::find($id);
        $project->update($request->all());
        return $project;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Project::destroy($id);
    }

    /**
     * Search for name.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        //
        return Project::where('name','like','%'.$name.'%')->get();
    }


    public function latest(){
        return Project::with(['project_leader'])->orderBy('id','DESC')->limit(4)->get();
    }

    public function BestInvest()
    {
        return Project::with(['project_leader'])->orderBy('invested','DESC')->first();
    }

    public function getCount(){
        return Project::count();
    }

    public function getAllinvested(){
        return Project::sum('invested');
    }
}
