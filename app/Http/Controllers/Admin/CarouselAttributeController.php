<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Carousel;
use App\Http\Models\CarouselAttribute;
use App\Http\Requests\CarouselAttributeRequest;
use App\Http\Requests\CarouselAttributeUpdateRequest;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use App\Traits\SearchTrait;
use Illuminate\Support\Facades\File;

class CarouselAttributeController extends Controller
{
    use ImageTrait;
    use SearchTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        ddd(Carousel::all());
        if($request->carousel > 0) {
            $carousels_attributes= CarouselAttribute::where('carousel_id', (int)$request->carousel)->latest()->get();
            $carousel = $request->carousel;


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
    public function store(CarouselAttributeRequest $request)
    {

        try {
            $validated = $request->validated();
            $carousel = $request->carousel;
            if($carousel > 0) {

                $is_carousel_found = Carousel::find($request->carousel);

                    if ($is_carousel_found != null){
                        $image = $this->saveImage($request->image, 'assets/images_front/projects_page' , '1');
                        if($request->image2) {
                            $image2 = $this->saveImage($request->image2, 'assets/images_front/projects_page' , '2');

                        }
                    $carouselAttribute = new CarouselAttribute();
                    $carouselAttribute->carousel_title = ['en' => $request->title_en, 'ar' => $request->title];
                    $carouselAttribute->carousel_image = $image;
                    if($request->image2){
                        $carouselAttribute->carousel_image2 = $image2;
                    }

                    $carouselAttribute->carousel_summary = ['en' => $request->summary_en, 'ar' => $request->summary];
                    if($request->carousel === '3') {
                        $carouselAttribute->text1 = ['en' => $request->text1_en, 'ar' => $request->text1];
                        $carouselAttribute->text2 = ['en' => $request->text2_en, 'ar' => $request->text2];
                        $carouselAttribute->text3 = ['en' => $request->text3_en, 'ar' => $request->text3];
                        $carouselAttribute->carousel_image2 = $image2;
                    }

                        $carouselAttribute->user_id = $request->user_id;
                    $carouselAttribute->carousel_id = (int)$request->carousel;
                    $carouselAttribute->save();

                    toastr()->success(trans('messages.success'));

                    return redirect()->back();
                }
            }
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

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
    public function update(CarouselAttributeUpdateRequest $request, $id)
    {
        try {
            $validated = $request->validated();

            $carouselAttribute = CarouselAttribute::find($id);

            if( request()->hasFile('image') && request('image') != '') {
                $imagePath1 = public_path('/assets/images_front/projects_page/'.$carouselAttribute->image);
                if(File::exists($imagePath1) && $carouselAttribute->image != null){
                    unlink($imagePath1);
                }
                $image_value = $this->saveImage($request->image, 'assets/images_front/projects_page');
            }else{
                $image_value = $carouselAttribute->getOriginal('carousel_image');
            }

            $carouselAttribute->carousel_title = ['en' => $request->title_en, 'ar' => $request->title];
            $carouselAttribute->carousel_summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $carouselAttribute->carousel_image  = $image_value;
            $carouselAttribute->user_id  = $request->user_id;
            $carouselAttribute->carousel_id  = $request->carousel;

            $carouselAttribute->save();

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
     * @param  \App\Http\Models\CarouselAttribute  $carouselAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $carouselAttribute = CarouselAttribute::find($id);
        //deleting from path
//        if($carouselAttribute->image != null && $request->hasFile($carouselAttribute->image)) {
//
//            $file = $carouselAttribute->carousel_image;
//            unlink(public_path() . '/assets/images_front/projects_page/' . $file);
//        }
        //deleting from db

        if(File::exists(public_path('/assets/images_front/projects_page/'.$carouselAttribute->image))) {
            $this->deleteUploadedImage($carouselAttribute->image, '/assets/images_front/projects_page/');
        }
        $deleted = $carouselAttribute->delete();
        if($deleted){
            toastr()->error(trans('messages.deletion'));
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    /****************************************************/

    public function videoStore(VideoRequest $request , $carousel)
    {

//        $true = $this->saveImage($request->video , 'assets_front/projects_page');


        try {
            $validated = $request->validated();

            if ($request->hasFile('video')) {

                $attr = $request->file('video');
                $filename = time() . '.' . $attr->getClientOriginalExtension();

                $path = public_path() . '/assets/images_front/projects_page/';

                $true = $attr->move($path, $filename);
            }





            if ($request->hasFile('image2')) {

                $attr2 = $request->file('image2');
                $filename2 = time() . '.' . $attr2->getClientOriginalExtension();

                $path2 = public_path() . '/assets/images_front/projects_page/';

                $true2 = $attr2->move($path2, $filename2);
            }






            if (isset($true) || isset($true2)) {
                $attr = new CarouselAttribute();
                $attr->carousel_id = 1;
                $attr->carousel_title = '.';
                if (isset($filename)) {
                    $attr->carousel_image = $filename;
                }
                if (isset($filename2)) {
                    $attr->carousel_image2 = $filename2;
                    $attr->carousel_image = '0';

                }
                $attr->user_id = auth()->id();

                $attr->save();
                toastr()->success(trans('messages.success'));
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
        return $this->my_search(CarouselAttribute::class , $request , 'carousel_title' );
    }

}
