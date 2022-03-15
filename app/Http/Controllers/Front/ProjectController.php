<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Models\Client;
use App\Http\Models\Construction;
use App\Http\Models\Electric;
use App\Http\Models\Landscape;
use App\Http\Models\Project;
use App\Http\Models\Road;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $constructions = Construction::where('status' , '1')->latest()->get();
        $roads = Road::where('status' , '1')->latest()->get();
        $landscapes = Landscape::where('status' , '1')->latest()->get();
        $landscapeFront = Landscape::where('status','1')->where('at_front_page','1')->first();
        $electrics = Electric::where('status' , '1')->latest()->get();
        $clients = Client::where('trusted_client' , '1')->latest()->get();
        return view('front/pages/projects' , ['constructions' => $constructions , 'roads'=>$roads , 'landscapes'=>$landscapes , 'landscapeFront'=>$landscapeFront , 'electrics'=>$electrics , 'clients' => $clients]);
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
     * @param  \App\Http\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
