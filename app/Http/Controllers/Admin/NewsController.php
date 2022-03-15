<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\GroupOfNews;
use App\Http\Models\News;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use App\Traits\SearchTrait;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
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
        if ($request->group > 0) {
            $newss = News::where('group_of_news_id', (int)$request->group)->latest()->get();
            $group = $request->group;


            return view('admin.news', ['newss' => $newss, 'group' => $group]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $group = $request->group;
            if ($group > 0) {

                $is_group_found = GroupOfNews::find((int)$request->group);

                if ($is_group_found != null) {
                    $image = $this->saveImage($request->image, 'assets/images_front/news_images');


                    $news = new News;
                    $news->title = ['en' => $request->title_en, 'ar' => $request->title];
                    $news->image = $image;
                    $news->summary = ['en' => $request->summary_en, 'ar' => $request->summary];
                    $news->group_of_news_id = (int)$request->group;
//                    if($request->group === '3') {
//                        $news->text1 = ['en' => $request->text1_en, 'ar' => $request->text1];
//                        $news->text2 = ['en' => $request->text2_en, 'ar' => $request->text2];
//                        $news->text3 = ['en' => $request->text3_en, 'ar' => $request->text3];
//                        $news->carousel_image2 = $image2;
//                    }

                    $news->user_id = $request->user_id;

                    $news->save();


                    toastr()->success(trans('messages.success'));

                    return redirect()->back();
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Http\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Http\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Http\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $news = News::find($id);


            if(request()->hasFile('image') && request('image') != '') {
                $imagePath2 = public_path('/assets/images_front/news_images/'.$news->image);
                if(File::exists($imagePath2)){
                    unlink($imagePath2);
                }
                $image_value = $this->saveImage($request->image, 'assets/images_front/news_images');
            }else{
                $image_value = $news->getOriginal('image');
            }




            $news->title = ['en' => $request->title_en, 'ar' => $request->title];
            $news->summary = ['en' => $request->summary_en, 'ar' => $request->summary];
            $news->image = $image_value;
            $news->user_id = $request->user_id;
            $news->group_of_news_id = $request->group;

            $news->save();

            toastr()->success(trans('messages.success'));

            return redirect()->back();


        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Http\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        try {
            $news = News::find($id);

            $deletion = $news->delete();

            if(File::exists(public_path('/assets/images_front/news_images/'.$news->image))) {
                $this->deleteUploadedImage($news->image, '/assets/images_front/news_images/');
            }

            if (isset($deletion)) {
                toastr()->error(trans('messages.deletion'));
                return redirect()->back();
            }else{
                toastr()->error(trans('messages.not_completed'));
                return redirect()->back();
            }

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /******************************************/

    public function search(Request $request)
    {

        return $this->my_search(News::class, $request);


    }
}
