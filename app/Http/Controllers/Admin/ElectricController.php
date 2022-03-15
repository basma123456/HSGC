<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Client;
use App\Http\Models\Electric;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Traits\ImageTrait;
use App\Traits\SearchTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ElectricController extends Controller
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
        $electrics = Electric::latest()->paginate(5);
        $clients = Client::latest()->get();
        return view('admin/electrics' , ['electrics' => $electrics , 'clients' => $clients]);

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
    public function store(ProjectRequest $request)
    {
        try {
//            ddd($request->all());
            $image =  $this->saveImage($request->image , 'assets/images_front/projects_page');

            $validated = $request->validated();
            $electric = new Electric();
            $electric->title = ['en' => $request->title_en, 'ar' => $request->title];
            $electric->image = $image;
            $electric->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $electric->user_id  = $request->user_id;
            $electric->client_id  = $request->client_id;
            $electric->save();

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
     * @param  \App\Http\Models\Electric  $electric
     * @return \Illuminate\Http\Response
     */
    public function show(Electric $electric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Electric  $electric
     * @return \Illuminate\Http\Response
     */
    public function edit(Electric $electric)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Electric  $electric
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectsRequest $request, Electric $electric)
    {
        try {
//            ddd($request->all());
            $validated = $request->validated();

            if(request()->hasFile('image') && request('image') != '') {
                $imagePath2 = public_path('/assets/images_front/projects_page/'.$electric->image);
                if(File::exists($imagePath2)){
                    unlink($imagePath2);
                }
                $image_value = $this->saveImage($request->image, 'assets/images_front/projects_page');
            }else{
                $image_value = $electric->getOriginal('image');
            }

            $electric->title = ['en' => $request->title_en, 'ar' => $request->title];
            $electric->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $electric->image  = $image_value;
            $electric->user_id  = $request->user_id;
            $electric->client_id  = $request->client_id;
            $electric->status  = $request->status;

            $electric->save();

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
     * @param  \App\Http\Models\Electric  $electric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Electric $electric)
    {
        try {
            $deletion = $electric->delete();

            if(File::exists(public_path('/assets/images_front/projects_page/'.$electric->image))) {
                $this->deleteUploadedImage($electric->image, '/assets/images_front/projects_page/');
            }

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

        return $this->my_search(Electric::class, $request);
    }


  }
