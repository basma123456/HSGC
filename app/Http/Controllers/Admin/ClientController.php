<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Client;
use Illuminate\Http\Request;
use App\Traits\SearchTrait;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    use SearchTrait;
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->paginate(5);
        return view('admin.clients' , ['clients' => $clients]);
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
        try {
//            ddd($request->all());
            if($request->image) {
                $image = $this->saveImage($request->image, 'assets/images_front/clients_images');
            }
//            $validated = $request->validated();
            $client = new Client();
            $client->title = ['en' => $request->title_en, 'ar' => $request->title];
            if($request->image) {
                $client->image = $image;
            }
            $client->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $client->user_id  = $request->user_id;
            $client->trusted_client  = $request->trusted_client;
            $client->save();

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
     * @param  \App\Http\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        try {
//            ddd($request->all());

            if(request()->hasFile('image') && request('image') != '') {
                $imagePath3 = public_path('/assets/images_front/clients_images/'.$client->image);
                if(File::exists($imagePath3)){
                    unlink($imagePath3);
                }
                $image = $this->saveImage($request->image, 'assets/images_front/clients_images');
                $image_value = $image;
            }else{
                $image_value = $client->getOriginal('image');
            }




//            $validated = $request->validated();

            $client->title = ['en' => $request->title_en, 'ar' => $request->title];
            $client->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $client->image  = $image_value;
            $client->user_id  = $request->user_id;
            $client->trusted_client  = $request->trusted_client;

            $client->save();

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
     * @param  \App\Http\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client , Request $request)
    {
        $deleted = $client->delete();

        if(File::exists(public_path('/assets/images_front/clients_images/'.$client->image))) {
            $this->deleteUploadedImage($client->image , '/assets/images_front/clients_images/');
        }
        //deleting from db
        if($deleted){
            toastr()->error(trans('messages.deletion'));
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
    /***********************************/

    public function search(Request $request)
    {

        return $this->my_search(Client::class , $request);


    }
}
