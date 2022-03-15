<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Manager;
use Illuminate\Http\Request;
use App\Traits\SearchTrait;

class ManagersController extends Controller
{
    use SearchTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = Manager::latest()->paginate(5);
        return view('admin/managers' , ['managers' => $managers ]);

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

            $manager = new Manager();
            $manager->name = ['en' => $request->name_en, 'ar' => $request->name];
            $manager->title = ['en' => $request->title_en, 'ar' => $request->title];
            $manager->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $manager->user_id  = $request->user_id;
            $manager->save();

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
     * @param  \App\Http\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        try {


            $manager->name = ['en' => $request->name_en, 'ar' => $request->name];
            $manager->title = ['en' => $request->title_en, 'ar' => $request->title];
            $manager->summary =  ['en' => $request->summary_en, 'ar' => $request->summary];
            $manager->user_id  = $request->user_id;

            $manager->save();

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
     * @param  \App\Http\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        try {
            //deleting from path

            $deletion = $manager->delete();

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

    /***************************************/

    public function search(Request $request)
    {

        return $this->my_search(Manager::class , $request , 'name');


    }

}
