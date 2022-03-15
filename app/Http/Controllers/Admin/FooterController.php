<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAll = Footer::latest()->paginate(5);
        return view('admin.footer' , ['dataAll' => $dataAll]);
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
            Footer::query()->delete();

            $footer = new Footer();
            $footer->summary = ['en' => $request->summary_en, 'ar' => $request->summary];
            $footer->company_address = ['en' => $request->company_address_en, 'ar' => $request->company_address];

            $footer->company_email = $request->company_email;
            $footer->company_phone = $request->company_phone;
            $footer->facebook_link = $request->facebook_link;
            $footer->instagram_link = $request->instagram_link;
            $footer->twitter_link = $request->twitter_link;
            $footer->user_id = Auth::id();


            $footer->save();


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
     * @param  \App\Http\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show(Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit(Footer $footer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, Footer $footer)
//    {
//        //
//    }

    public function update(Request $request, Footer $footer)
    {

        try{
//            $validated = $request->validated();

            $footer->summary = ['en' => $request->summary_en, 'ar' => $request->summary];
            $footer->company_address = ['en' => $request->company_address_en, 'ar' => $request->company_address];

            $footer->company_email = $request->company_email;
            $footer->company_phone = $request->company_phone;
            $footer->facebook_link = $request->facebook_link;
            $footer->instagram_link = $request->instagram_link;
            $footer->twitter_link = $request->twitter_link;

            $footer->user_id = Auth::id();


            $footer->save();

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
     * @param  \App\Http\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $footer)
    {
        try {
           $deletion = $footer->delete();

           if($deletion) {
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
