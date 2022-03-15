<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Carousel;
use App\Http\Models\Client;
use App\Http\Requests\CarouselRequest;
use Illuminate\Http\Request;
use App\Traits\SearchTrait;

class CarouselController extends Controller
{
    use SearchTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::latest()->paginate();
        $clients = Client::latest()->paginate();
        return view('admin/carousels' , ['carousels' => $carousels , 'clients' =>$clients]);
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
    public function store(CarouselRequest $request)
    {
        try {

            $validated = $request->validated();
            $carousel = new Carousel();
            $carousel->carousel_name = ['en' => $request->carousel_name_en, 'ar' => $request->carousel_name];
            $carousel->user_id  = $request->user_id;
            $carousel->save();

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
     * @param  \App\Http\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(CarouselRequest $request, Carousel $carousel)
    {
        try {
//            ddd($request->all());



            $validated = $request->validated();

            $carousel->carousel_name = ['en' => $request->carousel_name_en, 'ar' => $request->carousel_name];
            $carousel->user_id  = $request->user_id;

            $carousel->save();

            toastr()->success(trans('messages.success'));

            return redirect()->back();


        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function search(Request $request)
    {

        return $this->my_search(Carousel::class , $request , 'carousel_name' , "<a href='#'>" , "</a>");



    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        try {
            $deletion = $carousel->delete();

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




}
