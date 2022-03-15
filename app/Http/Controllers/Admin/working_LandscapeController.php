<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Client;
use App\Http\Models\Landscape;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Traits\ImageTrait;
use App\Traits\SearchTrait;
use Illuminate\Http\Request;

class LandscapeController extends Controller
{

    use ImageTrait;
    use SearchTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landscapes = Landscape::latest()->paginate(5);
        $clients = Client::latest()->get();
        return view('admin/landscapes' , ['landscapes' => $landscapes , 'clients' => $clients]);

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
    public function store(ProjectRequest  $request)
    {
        try {
//            ddd($request->all());
            $image =  $this->saveImage($request->image , 'assets/images_front/projects_page');

            $validated = $request->validated();
            $landscape = new Landscape();
            $landscape->title = ['en' => $request->title_en, 'ar' => $request->title];
            $landscape->image = $image;
            $landscape->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $landscape->user_id  = $request->user_id;
            $landscape->client_id  = $request->client_id;
            $landscape->save();

            toastr()->success(trans('messages.success'));

            return redirect()->back();


        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\Landscape  $landscape
     * @return \Illuminate\Http\Response
     */
    public function show(Landscape $landscape)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Landscape  $landscape
     * @return \Illuminate\Http\Response
     */
    public function edit(Landscape $landscape)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Landscape  $landscape
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectsRequest $request, Landscape $landscape)
    {
        try {
//            ddd($request->all());

            if(isset($request->image)) {
                $image = $this->saveImage($request->image, 'assets/images_front/projects_page');
                $image_value = $image;
            }else{
                $image_value = $landscape->getOriginal('image');
            }


            $validated = $request->validated();

            $landscape->title = ['en' => $request->title_en, 'ar' => $request->title];
            $landscape->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $landscape->image  = $image_value;
            $landscape->user_id  = $request->user_id;
            $landscape->client_id  = $request->client_id;
            $landscape->status  = $request->status;

            $landscape->save();

            toastr()->success(trans('messages.success'));

            return redirect()->back();


        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\Landscape  $landscape
     * @return \Illuminate\Http\Response
     */
    public function destroy(Landscape $landscape)
    {
        try {
            $deletion = $landscape->delete();

            if (isset($deletion)) {
                toastr()->error(trans('messages.deletion'));
                return redirect()->back();
            }else{
                toastr()->error(trans('messages.not_completed'));
                return redirect()->back();
            }

        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function search(Request $request)
    {

        return $this->my_search(Landscape::class, $request);
    }
 }
