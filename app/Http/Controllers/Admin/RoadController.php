<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Client;
use App\Http\Models\News;
use App\Http\Models\Road;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Traits\ImageTrait;
use App\Traits\SearchTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoadController extends Controller
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
        $roads = Road::latest()->paginate(5);
        $clients = Client::latest()->get();
//        ddd($roads);
        return view('admin/roads' , ['roads' => $roads , 'clients' => $clients]);

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
            $road = new Road();
            $road->title = ['en' => $request->title_en, 'ar' => $request->title];
            $road->image = $image;
            $road->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $road->user_id  = $request->user_id;
            $road->client_id  = $request->client_id;
            $road->save();

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
     * @param  \App\Http\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function show(Road $road)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function edit(Road $road)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectsRequest $request, Road $road)
    {
        try {
//            ddd($request->all());
            $validated = $request->validated();

            if(request()->hasFile('image') && request('image') != '') {
                $imagePath2 = public_path('/assets/images_front/projects_page/'.$road->image);
                if(File::exists($imagePath2)){
                    unlink($imagePath2);
                }
                $image_value = $this->saveImage($request->image, 'assets/images_front/projects_page');
            }else{
                $image_value = $road->getOriginal('image');
            }

            $road->title = ['en' => $request->title_en, 'ar' => $request->title];
            $road->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $road->image  = $image_value;
            $road->user_id  = $request->user_id;
            $road->client_id  = $request->client_id;
            $road->status  = $request->status;

            $road->save();

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
     * @param  \App\Http\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function destroy(Road $road)
    {
        try{

            $deletion = $road->delete();

            if(File::exists(public_path('/assets/images_front/projects_page/'.$road->image))) {
                $this->deleteUploadedImage($road->image, '/assets/images_front/projects_page/');
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
        return $this->my_search(Road::class , $request);
    }

}
