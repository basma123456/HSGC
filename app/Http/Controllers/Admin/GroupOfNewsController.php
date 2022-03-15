<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\GroupOfNews;
use Illuminate\Http\Request;
use App\Traits\SearchTrait;

class GroupOfNewsController extends Controller
{
    use SearchTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = GroupOfNews::latest()->paginate(5);
        return view('admin.groups_of_news' , ['groups' => $groups]);
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

//            $validated = $request->validated();
            $groupOfNews = new GroupOfNews();
            $groupOfNews->title = ['en' => $request->title_en, 'ar' => $request->title];
            $groupOfNews->user_id  = $request->user_id;
            $groupOfNews->save();

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
     * @param  \App\Http\Models\GroupOfNews  $groupOfNews
     * @return \Illuminate\Http\Response
     */
    public function show(GroupOfNews $groupOfNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\GroupOfNews  $groupOfNews
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupOfNews $groupOfNews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\GroupOfNews  $groupOfNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
//            ddd($request->all());


            $groupOfNews=GroupOfNews::find($id);

            $groupOfNews->title = ['en' => $request->title_en, 'ar' => $request->title];
            $groupOfNews->user_id  = $request->user_id;

            $groupOfNews->save();

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
     * @param  \App\Http\Models\GroupOfNews  $groupOfNews
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request , $id)
    {
        try {
            $groupOfNews = GroupOfNews::find($id);

            $deletion = $groupOfNews->delete();

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

/**************************************/

    public function search(Request $request)
    {

        return $this->my_search(GroupOfNews::class , $request , 'title' , "<a href='#'>" , "</a>");



    }


}
