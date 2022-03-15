
@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Grades_trans.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.Grades')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('Grades_trans.add_Grade') }}
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('Grades_trans.about_company_summary')}}</th>
                                <th>{{trans('Grades_trans.our_vision_summary')}}</th>
                                <th>{{trans('Grades_trans.behind_hsgc_summary')}}</th>
                                <th>{{trans('Grades_trans.work_with_us_summary')}}</th>
                                <th>{{trans('Grades_trans.added_by')}}</th>



                                <th>{{trans('Grades_trans.Processes')}}</th>

                            </tr>
                            </thead>
                            <tbody>
<?php $i = 0; ?>
                            @foreach ($all_data as $data)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{$data->about_company_summary}} </td>
                                    <td>{{$data->our_vision_summary}} </td>
                                    <td>{{$data->behind_hsgc_summary}} </td>
                                    <td>{{$data->work_with_us_summary}} </td>
                                    <td>{{$data->user_id}} </td>



                                        <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit Grade->id "
                                                title="{{ trans('Grades_trans.Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete Grade->id "
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit Grade->id " tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Grades_trans.edit_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{route('Grades.update')}}" method="get">
{{--                                                    {{method_field('patch')}}--}}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">{{ trans('Grades_trans.stage_name_ar') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name"
                                                                   class="form-control"
                                                                   value=" Grade->getTranslation('Name', 'ar') "
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value=" Grade->id ">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                   class="mr-sm-2">{{ trans('Grades_trans.stage_name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value=" $Grade->getTranslation('Name', 'en') "
                                                                   name="Name_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('Grades_trans.Notes') }}
                                                            :</label>
                                                        <textarea class="form-control" name="Notes"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3"> Grade->Notes  </textarea>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete Grade->id " tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Grades_trans.delete_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Grades.destroy')}}" method="get">
{{--                                                    {{method_field('Delete')}}--}}
                                                    @csrf
                                                    {{ trans('Grades_trans.Warning_Grade') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value=" Grade->id  ">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('Grades_trans.submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach




                            

                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            {{ trans('Grades_trans.add_Grade') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('about_company.store') }}" method="post">
                                    @csrf

                            <input type="hidden" name="user_id" value="{{auth()->id()}}">


                            <div class="row">
                                <div class="col">
                                    <label for="about_company_summary"
                                           class="mr-sm-2">{{ trans('Grades_trans.about_company_summary') }}
                                        :</label>
                                    <input id="about_company_summary" type="text" name="about_company_summary" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="about_company_summary_en"
                                           class="mr-sm-2">{{ trans('Grades_trans.about_company_summary_en') }}
                                        :</label>
                                    <input id="about_company_summary_en" type="text" class="form-control" name="about_company_summary_en">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="our_vision_summary"
                                           class="mr-sm-2">{{ trans('Grades_trans.our_vision_summary') }}
                                        :</label>
                                    <input id="our_vision_summary" type="text" name="our_vision_summary" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="our_vision_summary_en"
                                           class="mr-sm-2">{{ trans('Grades_trans.our_vision_summary_en') }}
                                        :</label>
                                    <input id="our_vision_summary_en" type="text" class="form-control" name="our_vision_summary_en">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="behind_hsgc_summary"
                                           class="mr-sm-2">{{ trans('Grades_trans.behind_hsgc_summary') }}
                                        :</label>
                                    <input id="behind_hsgc_summary" type="text" name="behind_hsgc_summary" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="behind_hsgc_summary_en"
                                           class="mr-sm-2">{{ trans('Grades_trans.behind_hsgc_summary_en') }}
                                        :</label>
                                    <input id="behind_hsgc_summary_en" type="text" class="form-control" name="behind_hsgc_summary_en">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="work_with_us_summary"
                                           class="mr-sm-2">{{ trans('Grades_trans.work_with_us_summary') }}
                                        :</label>
                                    <input id="work_with_us_summary" type="text" name="work_with_us_summary" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="work_with_us_summary_en"
                                           class="mr-sm-2">{{ trans('Grades_trans.work_with_us_summary_en') }}
                                        :</label>
                                    <input id="work_with_us_summary_en" type="text" class="form-control" name="work_with_us_summary_en">
                                </div>
                            </div>


                            <div class="form-group">
                                        <label>
                                            for="exampleFormControlTextarea1">{{ trans('Grades_trans.left_first_image') }}
                                            :</label>
                                        <textarea class="form-control" name="left_first_image" id="exampleFormControlTextarea1"
                                                  rows="3"></textarea>
                                    </div>
                            <br>
                            <div class="form-group">
                                <label>
                                    for="exampleFormControlTextarea1">{{ trans('Grades_trans.left_second_image') }}
                                    :</label>
                                <textarea class="form-control" name="left_second_image" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>
                                    for="exampleFormControlTextarea1">{{ trans('Grades_trans.our_vision_image') }}
                                    :</label>
                                <textarea class="form-control" name="our_vision_image" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>

                            <br><br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                <button type="submit"
                                        class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
