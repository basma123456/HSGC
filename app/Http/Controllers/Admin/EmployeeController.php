<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\Traits\SearchTrait;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Response;

class EmployeeController extends Controller
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
        $employees = Employee::latest()->paginate('5');
        return view('admin.employees' , ['employees' => $employees]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


        try{


//            dd($request->all());
            if($request->status == (int)1){
                $employee->status = $request->post('status'); //accepted
                $employee->user_id = auth()->id();

            }elseif ($request->status == (int)2) {
                $employee->status = $request->post('status'); //postponed
                $employee->user_id = auth()->id();

            }elseif ($request->status == (int)3) {
                $employee->status = $request->post('status'); //rejected
                $employee->user_id = auth()->id();

            }elseif ($request->status == (int)0) {
                $employee->status = $request->post('status'); //unseen
                $employee->user_id = auth()->id();

            }

            $employee->save();
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
     * @param  \App\Http\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */


    public function destroy(Employee $employee , Request $request)
    {


        //deleting from path
        if($employee->image != null && $request->hasFile($employee->image)) {
            $file= $employee->image;

            unlink(public_path() . '/assets/images_front/employees_images/' . $file);
        }


        if($employee->resume != null  && $request->hasFile($employee->resume)) {
            $file2 = $employee->resume;

            unlink(public_path() . '/assets/images_front/employees_images/' . $file2);
        }
        //deleting from db
        $deleted = $employee->delete();



        if($deleted){
            toastr()->error(trans('messages.deletion'));

            return redirect()->back();

        }else{
            return redirect()->back();

        }
    }

    /**********************************************************************/

    public function search(Request $request)
    {

        return $this->my_search(Employee::class, $request);
    }
    /***********************************************************************/


    public function acceptedEmployees(Request $request)
    {
        $employees = Employee::where('status' , 1)->latest()->paginate(5);
        return view('admin.employees' , ['employees' => $employees]);
    }

    /*****************************************************/

    public function unseenEmployees(Request $request)
    {
        $employees = Employee::where('status' , 0)->latest()->paginate(5);
        return view('admin.employees' , ['employees' => $employees]);
    }

    /************************************************/
    public function postponedEmployees(Request $request)
    {
        $employees = Employee::where('status' , 2)->latest()->paginate(5);
        return view('admin.employees' , ['employees' => $employees]);
    }
    /******************************************************/
    public function rejectedEmployees(Request $request)
    {
        $employees = Employee::where('status' , 3)->latest()->paginate(5);
        return view('admin.employees' , ['employees' => $employees]);
    }
    /**************************************************/
    /*************************************************/







}
