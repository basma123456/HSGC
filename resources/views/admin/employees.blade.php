@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('employees_admin.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('employees_admin.Grades') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


        @if ($errors->any())
            <div class="error">{{ $errors->first('Name') }}</div>
        @endif



        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif










                        {{--                        ///////////////////search box///////////////////////--}}



                                <div class="text-center w-25 search-custom">
                                    <input type="text" name="search" id="search" class="form-control" value="" placeholder="{{trans('employees_admin.search_here')}}" /><span class='hide btn btn-secondary float-right' id='x_dismiss'>x</span>
<br>
                               <span><small><span class="text-success">{{trans('employees_admin.seacrh_by_date_or_time_as_that_pattern')}} <br> 2022-03-05 00:48:05</span></small></span>
                                </div>
                                <div id="search_list">

                                </div>

                        {{--                        ///////////////////search box///////////////////////--}}



                        <br><br>

                    <div class="table-responsive">
                        <table  id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr  class="boxShadowCustom" >
                                <th  class="boxShadowCustom" >#</th>
                                <th  class="boxShadowCustom" >{{ trans('employees_admin.user_name') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('employees_admin.status') }}</th>

                                <th  class="boxShadowCustom" >{{ trans('employees_admin.images') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('employees_admin.title') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('employees_admin.email') }}</th>

                                <th  class="boxShadowCustom" >{{ trans('employees_admin.phone_number') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('employees_admin.address') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('employees_admin.summary') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('employees_admin.resume') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('employees_admin.user_id') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('employees_admin.created_at') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('employees_admin.updated_at') }}</th>



                                <th>{{ trans('employees_admin.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @if(isset($employees))
                                @foreach ($employees as $employee)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $employee->user_name }}</td>
                                            <td>
                                                @if($employee->status == 0)  {{ trans('employees_admin.unseen') }}
                                                @elseif($employee->status == 1) {{ trans('employees_admin.accepted') }}
                                                @elseif($employee->status == 2) {{ trans('employees_admin.postponed') }}
                                                @elseif($employee->status == 3) {{ trans('employees_admin.rejected') }}
                                                @endif

                                            </td>

                                            <td><img class="boxShadowCustom" src="{{asset('assets/images_front/employees_images/')}}/{{ $employee->image }}" width="200" height="200"></td>

                                            <td>{{ $employee->title }}</td>

                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone_number }}</td>
                                            <td>{{ $employee->address }}</td>


                                            <td>{{ $employee->summary }}</td>



                                            <td><a href="{{url('/assets/images_front/employees_images/')}}/{{$employee->resume}}" target="_blank">
                                                <button class="btn"><i class="fa fa-download"></i> Download File</button>
                                                </a>
                                            </td>

                                            <td>
                                                @if(isset($employee->user_id) && $employee->user_id > 0)
                                                {{ \App\User::find($employee->user_id)->value('name') }}
                                               @endif
                                            </td>
                                            <td>{{ $employee->created_at }}</td>
                                            <td>{{ $employee->updated_at }}</td>




                                            <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $employee->id }}"
                                                    title="{{ trans('employees_admin.Edit') }}"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $employee->id }}"
                                                    title="{{ trans('employees_admin.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- edit_modal_Grade -->
                                    <div class="modal fade" id="edit{{ $employee->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('employees_admin.edit') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ route('employees.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                                                        {{ method_field('patch') }}
                                                        @csrf



                                                        <input type="hidden" name="user_id" value="{{auth()->id()}}" />

                                                        <br>





                                                        <div class="form-group">

                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('employees_admin.status') }}
                                                                :</label>
                                                            <br>
                                                            <select name="status">
                                                                <option  value="{{(int)0}}" @if($employee->status == (int)0) selected @endif> {{ trans('employees_admin.unseen') }}</option>
                                                                <option  value="{{(int)1}}" @if($employee->status == (int)1) selected @endif> {{ trans('employees_admin.activated') }}</option>
                                                                <option  value="{{(int)3}}" @if($employee->status == (int)2) selected @endif> {{ trans('employees_admin.postponed') }}</option>
                                                                <option  value="{{(int)4}}" @if($employee->status == (int)3) selected @endif> {{ trans('employees_admin.rejected') }}</option>

                                                            </select>
                                                        </div>



                                                        <br><br>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('employees_admin.Close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-success">{{ trans('employees_admin.submit') }}</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $employee->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('employees_admin.delete') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('employees_admin.warning') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $employee->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('employees_admin.close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{ trans('employees_admin.submit') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>





            <div>

            </div>

    </div>
    {{ $employees->links() }}

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render


        <script>
        $(document).ready(function(){
            $('#search').on('keyup' , function(){
                $('#x_dismiss').addClass('show');

                var query = $(this).val();

                $.ajax({
                    url:"search/employee",
                    type:"GET",
                    data:{'search':query},
                    success:function(data){
                        $('#search_list').html(data);
                    }
                });
            });

            /////////////////////


            ///////////////////////////

            $('#x_dismiss').on('click' ,function(){
                $('#table-live-search').fadeOut();
                $('#x_dismiss').removeClass('show');

            });



        });




        ////////////////////////

    </script>


@endsection
