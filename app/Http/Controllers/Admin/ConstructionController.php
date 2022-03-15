<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Client;
use App\Http\Models\Construction;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Traits\ImageTrait;
use App\Traits\SearchTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ConstructionController extends Controller
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
        $constructions = Construction::latest()->paginate(5);
        $clients = Client::latest()->get();
//        ddd($constructions);
        return view('admin/constructions' , ['constructions' => $constructions , 'clients' => $clients]);

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
//
    public function store(ProjectRequest $request)
    {
        try {
//            ddd($request->all());
            $image =  $this->saveImage($request->image , 'assets/images_front/projects_page');

            $validated = $request->validated();
            $construction = new Construction();
            $construction->title = ['en' => $request->title_en, 'ar' => $request->title];
            $construction->image = $image;
            $construction->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $construction->user_id  = $request->user_id;
            $construction->client_id  = $request->client_id;
            $construction->save();

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
     * @param  \App\Http\Models\Construction  $construction
     * @return \Illuminate\Http\Response
     */
    public function show(Construction $construction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Construction  $construction
     * @return \Illuminate\Http\Response
     */
    public function edit(Construction $construction)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Construction  $construction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectsRequest $request, Construction $construction)
    {
        try {
//            ddd($request->all());
            $validated = $request->validated();

            if(request()->hasFile('image') && request('image') != '') {
                $imagePath2 = public_path('/assets/images_front/projects_page/'.$construction->image);
                if(File::exists($imagePath2)){
                    unlink($imagePath2);
                }

                $image_value = $this->saveImage($request->image, 'assets/images_front/projects_page');
            }else{
                $image_value = $construction->getOriginal('image');
            }



            $construction->title = ['en' => $request->title_en, 'ar' => $request->title];
            $construction->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $construction->image  = $image_value;
            $construction->user_id  = $request->user_id;
            $construction->client_id  = $request->client_id;
            $construction->status  = $request->status;

            $construction->save();

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
     * @param  \App\Http\Models\Construction  $construction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Construction $construction)
    {

        try {
            $deletion = $construction->delete();

            if(File::exists(public_path('/assets/images_front/projects_page/'.$construction->image))) {
                $this->deleteUploadedImage($construction->image, '/assets/images_front/projects_page/');
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
     /**********************************************/
    public function search(Request $request)
    {

        return $this->my_search(Construction::class , $request);


    }





    /***************************/







    /**************************/

}
