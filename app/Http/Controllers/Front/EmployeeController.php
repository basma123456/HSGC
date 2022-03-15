<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class EmployeeController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function StoreEmployees(EmployeeRequest $request)
    {
//        try {

            $validated = $request->validated();
            $employee = new Employee;


            $image = $this->saveImage($request->image , 'assets/images_front/employees_images');
            $file2 = $this->saveImage($request->resume , 'assets/images_front/employees_images');

            $employee->user_name = $request->f_name . " " . $request->l_name;
            $employee->email = $request->email;
            $employee->title = $request->title;
            $employee->phone_number = $request->phone_number;
            $employee->address = $request->address;
            $employee->image = $image;
            $employee->summary = $request->summary;
            $employee->resume = $file2;
            if(isset($request->user_id)) {
                $employee->user_id = $request->user_id;
            }
            if(isset($request->status)) {
                $employee->status = $request->status;
            }

             $m = $employee->save();


            if(isset($m)) {
                toastr()->success(trans('messages.success'));

                return redirect()->back();
            }

//        }
//        catch (\Exception $e){
//            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
//        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
