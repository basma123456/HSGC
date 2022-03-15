<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\AboutCompany;
use App\Http\Requests\StoreAboutCompanyRequset;
use App\Http\Requests\UpdateAboutCompanyRequset;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;


class AboutCompanyController extends Controller
{
 use ImageTrait;

    /**
     * Display a listing of the resource.
     *
        @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dataAll =  AboutCompany::latest()->Paginate(1);
        return view('admin.about_company' , ['dataAll' => $dataAll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutCompanyRequset $request)
    {

        try {
            $validated = $request->validated();

//            AboutCompany::query()->update(['status' => 0]);

            AboutCompany::query()->delete();


            $file_name_first =  $this->saveImage($request->left_first_image , 'assets/images_front/about_company' , '1');
            $file_name_second =  $this->saveImage($request->left_second_image , 'assets/images_front/about_company' ,'2');
            $file_name_vision =  $this->saveImage($request->our_vision_image , 'assets/images_front/about_company' , '3');




            $aboutCompany = new AboutCompany();
            $aboutCompany->about_company_summary = ['en' => $request->about_company_summary_en, 'ar' => $request->about_company_summary];
            $aboutCompany->our_vision_summary = ['en' => $request->our_vision_summary_en, 'ar' => $request->our_vision_summary];
//            $aboutCompany->behind_hsgc_summary = ['en' => $request->behind_hsgc_summary_en, 'ar' => $request->behind_hsgc_summary];
            $aboutCompany->work_with_us_summary = ['en' => $request->work_with_us_summary_en, 'ar' => $request->work_with_us_summary];
            $aboutCompany->left_first_image = $file_name_first;
            $aboutCompany->left_second_image = $file_name_second;
            $aboutCompany->our_vision_image = $file_name_vision;
            $aboutCompany->user_id = Auth::id();


            $aboutCompany->save();


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
     * @param  \App\Http\Models\AboutCompany  $aboutCompany
     * @return \Illuminate\Http\Response
     */
    public function show(AboutCompany $aboutCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\AboutCompany  $aboutCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutCompany $aboutCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\AboutCompany  $aboutCompany
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutCompanyRequset $request, AboutCompany $aboutCompany)
    {

         try{
            $validated = $request->validated();


             if( request()->hasFile('left_first_image') && request('left_first_image') != '') {
                 $imagePath1 = public_path('/assets/images_front/about_company/'.$aboutCompany->left_first_image);
                 if(File::exists($imagePath1)){
                     unlink($imagePath1);
                 }

                 $file_name_first = $this->saveImage($request->left_first_image, 'assets/images_front/about_company' , '1');
             }else{
                 $file_name_first = $aboutCompany->getOriginal('left_first_image');
             }




             if( request()->hasFile('left_second_image') && request('left_second_image') != '') {
                 $imagePath2 = public_path('/assets/images_front/about_company/'.$aboutCompany->left_second_image);
                 if(File::exists($imagePath2)){
                     unlink($imagePath2);
                 }

                 $file_name_second = $this->saveImage($request->left_second_image, 'assets/images_front/about_company' , '2');
             }else{
                 $file_name_second = $aboutCompany->getOriginal('left_second_image');
             }




             if( request()->hasFile('our_vision_image') && request('our_vision_image') != '') {
                 $imagePath3 = public_path('/assets/images_front/about_company/'.$aboutCompany->our_vision_image);
                 if(File::exists($imagePath3)){
                     unlink($imagePath3);
                 }

                 $file_name_vision = $this->saveImage($request->our_vision_image, 'assets/images_front/about_company' , '3');
             }else{
                 $file_name_vision = $aboutCompany->getOriginal('our_vision_image');
             }



                 $aboutCompany->about_company_summary = ['en' => $request->about_company_summary_en, 'ar' => $request->about_company_summary];
                $aboutCompany->our_vision_summary = ['en' => $request->our_vision_summary_en, 'ar' => $request->our_vision_summary];
//                $aboutCompany->behind_hsgc_summary = ['en' => $request->behind_hsgc_summary_en, 'ar' => $request->behind_hsgc_summary];
                $aboutCompany->work_with_us_summary = ['en' => $request->work_with_us_summary_en, 'ar' => $request->work_with_us_summary];

                $aboutCompany->left_first_image = $file_name_first;
                $aboutCompany->left_second_image = $file_name_second;
                $aboutCompany->our_vision_image = $file_name_vision;

                $aboutCompany->user_id = Auth::id();


                $aboutCompany->save();

                toastr()->success(trans('messages.success'));
                return redirect('about_company');

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\AboutCompany  $aboutCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutCompany $aboutCompany , Request $request)
    {
            try {
                $aboutCompany->delete();



                if(File::exists(public_path('/assets/images_front/about_company/'.$aboutCompany->left_first_image))) {
                    $this->deleteUploadedImage($aboutCompany->left_first_image, '/assets/images_front/about_company/');
                }

                if(File::exists(public_path('/assets/images_front/about_company/'.$aboutCompany->left_second_image))) {
                    $this->deleteUploadedImage($aboutCompany->left_second_image, '/assets/images_front/about_company/');
                }

                if(File::exists(public_path('/assets/images_front/about_company/'.$aboutCompany->our_vision_image))) {
                    $this->deleteUploadedImage($aboutCompany->our_vision_image, '/assets/images_front/about_company/');
                }
                toastr()->error(trans('messages.deletion'));
                return redirect()->back();
            }
            catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

    }



}
