<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\CarouselAttribute;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        ddd(Carousel::all());
        if($request->carousel > 0) {
            $carousels_attributes= CarouselAttribute::where('carousel_id', 1)->latest()->get();
            $carousel = 1;


            return view('admin.carousels_attributes', ['carousels_attributes' => $carousels_attributes, 'carousel' => $carousel]);
        }
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






//        if($request->hasFile('video')){
//
//            $file = $request->file('video');
//            $filename = $file->getClientOriginalName();
//            $path = public_path().'/uploads/';
//             $true = $file->move($path, $filename);
//            if($true != null){
//                return dd('true');
//            }
//        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\CarouselAttribute  $carouselAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(CarouselAttribute $carouselAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\CarouselAttribute  $carouselAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(CarouselAttribute $carouselAttribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\CarouselAttribute  $carouselAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarouselAttribute $carouselAttribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\CarouselAttribute  $carouselAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarouselAttribute $carouselAttribute)
    {
        //
    }
}
