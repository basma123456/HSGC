
@extends('layouts.master')
@section('css')
    @toastr_css

    <style>
        td{
            overflow-wrap: break-word;
            padding: 40px !important;
        }
        .backGroundTd{
            background-color :rgba(132, 186, 63,0.6);
            font-weight: bold;
        }

        .backGroundTh{
            background-color :rgb(40, 42, 57);
            color:white;
            padding:20px !important;

        }

        .backGroundTdRight{
            background-color : rgb(240, 240, 192);
        }


    </style>
@section('title')
    {{ trans('about_company_admin.title_page') }}
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
                        {{ trans('about_company_admin.add') }}
                    </button>

                        <br><br>
{{--                        /*********************update and delete buttons******************/--}}
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit Grade->id "
                                    title="{{ trans('about_company_admin.Edit') }}"><i
                                    class="fa fa-edit"></i> {{trans('about_company_admin.Edit')}}</button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete Grade->id "
                                    title="{{ trans('about_company_admin.Delete') }}"><i
                                    class="fa fa-trash"></i> {{ trans('about_company_admin.Delete') }} </button>


                        {{--                        /*********************update and delete buttons******************/--}}

                        <br><br>

                    <div class="table-responsive">

                        @foreach($dataAll as $data)

                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>

                                <th class="backGroundTh">{{trans('about_company_admin.the_field')}}</th>
                                <th class="backGroundTh">{{trans('about_company_admin.the_value')}}</th>




                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="backGroundTd">{{trans('about_company_admin.about_company_summary')}}</td>
                                    <td class="backGroundTdRight">{{$data->about_company_summary}} </td>



                                </tr>

                                <tr>
                                    <td class="backGroundTd">{{trans('about_company_admin.left_first_image')}}</td>
                                    <td class="backGroundTdRight"><img src="{{asset('assets/images_front/about_company/')}}/{{$data->left_first_image}}" width="300" height="300" /> </td>



                                </tr>



                                <tr>
                                    <td class="backGroundTd">{{trans('about_company_admin.left_second_image')}}</td>
                                    <td class="backGroundTdRight"><img src="{{asset('assets/images_front/about_company/')}}/{{$data->left_second_image}}" width="300" height="300" /> </td>



                                </tr>



                                <tr>
                                    <td class="backGroundTd">{{trans('about_company_admin.our_vision_image')}}</td>
                                    <td class="backGroundTdRight"><img src="{{asset('assets/images_front/about_company/')}}/{{$data->our_vision_image}}" width="300" height="300" /> </td>



                                </tr>


                                <tr>
                                    <td class="backGroundTd">{{trans('about_company_admin.our_vision_summary')}}</td>
                                    <td class="backGroundTdRight">{{$data->our_vision_summary}} </td>



                                </tr>


{{--                                <tr>--}}
{{--                                    <td class="backGroundTd">{{trans('about_company_admin.behind_hsgc_summary')}}</td>--}}
{{--                                    <td class="backGroundTdRight">{{$data->behind_hsgc_summary}} </td>--}}



{{--                                </tr>--}}


                                <tr>
                                    <td class="backGroundTd">{{trans('about_company_admin.work_with_us_summary')}}</td>
                                    <td class="backGroundTdRight">{{$data->work_with_us_summary}} </td>



                                </tr>


                                <tr>
                                    <td class="backGroundTd">{{trans('about_company_admin.added_or_updated_by')}}</td>
                                    <td class="backGroundTdRight">{{\App\User::find($data->user_id)->value('name')}} </td>



                                </tr>





                                <tr>
                                    <td class="backGroundTd">{{trans('about_company_admin.created_at')}}</td>
                                    <td class="backGroundTdRight">{{$data->created_at}} </td>



                                </tr>


                                <tr>
                                    <td class="backGroundTd">{{trans('about_company_admin.updated_at')}}</td>
                                    <td class="backGroundTdRight">{{$data->updated_at}} </td>



                                </tr>



                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit Grade->id " tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('about_company_admin.Edit') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- update_form -->
                                                <form action="{{  \LaravelLocalization::localizeURL(route('about_company.update' , $data->id))}}" method="post" enctype="multipart/form-data">
                                                    {{method_field('patch')}}
                                                    @csrf
                                                    <div class="row">


                                                        <div class="col">
                                                            <label for="about_company_summary"
                                                                   class="mr-sm-2">{{ trans('about_company_admin.about_company_summary_ar') }}
                                                                :</label>
                                                            <input id="about_company_summary" type="text" name="about_company_summary"
                                                                   class="form-control"
                                                                   value="{{ $data->getTranslation('about_company_summary', 'ar') }}" >
                                                        </div>
                                                        <div class="col">
                                                            <label for="about_company_summary_en"
                                                                   class="mr-sm-2">{{ trans('about_company_admin.about_company_summary_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ $data->getTranslation('about_company_summary', 'en') }}"
                                                                   name="about_company_summary_en" >
                                                        </div>
                                                    </div>
{{--          /***********************************************************************************/                                          --}}

                                                    <div class="row">


                                                        <div class="col">
                                                            <label for="our_vision_summary"
                                                                   class="mr-sm-2">{{ trans('about_company_admin.our_vision_summary_ar') }}
                                                                :</label>
                                                            <input id="our_vision_summary" type="text" name="our_vision_summary"
                                                                   class="form-control"
                                                                   value="{{ $data->getTranslation('our_vision_summary', 'ar') }}" >
                                                        </div>
                                                        <div class="col">
                                                            <label for="our_vision_summary_en"
                                                                   class="mr-sm-2">{{ trans('about_company_admin.our_vision_summary_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ $data->getTranslation('our_vision_summary', 'en') }}"
                                                                   name="our_vision_summary_en" >
                                                        </div>
                                                    </div>

{{--        /*******************************************************************************************/--}}

{{--                                                    <div class="row">--}}


{{--                                                        <div class="col">--}}
{{--                                                            <label for="behind_hsgc_summary"--}}
{{--                                                                   class="mr-sm-2">{{ trans('about_company_admin.behind_hsgc_summary_ar') }}--}}
{{--                                                                :</label>--}}
{{--                                                            <input id="behind_hsgc_summary" type="text" name="behind_hsgc_summary"--}}
{{--                                                                   class="form-control"--}}
{{--                                                                   value="{{ $data->getTranslation('behind_hsgc_summary', 'ar') }}" >--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col">--}}
{{--                                                            <label for="behind_hsgc_summary_en"--}}
{{--                                                                   class="mr-sm-2">{{ trans('about_company_admin.behind_hsgc_summary_en') }}--}}
{{--                                                                :</label>--}}
{{--                                                            <input type="text" class="form-control"--}}
{{--                                                                   value="{{ $data->getTranslation('behind_hsgc_summary', 'en') }}"--}}
{{--                                                                   name="behind_hsgc_summary_en" >--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}


   {{--          /*******************************************************************************/                                          --}}
                                                    <div class="row">


                                                        <div class="col">
                                                            <label for="work_with_us_summary"
                                                                   class="mr-sm-2">{{ trans('about_company_admin.work_with_us_summary_ar') }}
                                                                :</label>
                                                            <input id="work_with_us_summary" type="text" name="work_with_us_summary"
                                                                   class="form-control"
                                                                   value="{{ $data->getTranslation('work_with_us_summary', 'ar') }}" >
                                                        </div>
                                                        <div class="col">
                                                            <label for="work_with_us_summary_en"
                                                                   class="mr-sm-2">{{ trans('about_company_admin.work_with_us_summary_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ $data->getTranslation('work_with_us_summary', 'en') }}"
                                                                   name="work_with_us_summary_en" >
                                                        </div>
                                                    </div>


     {{--          /*******************************************************************************/                                          --}}

                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('about_company_admin.left_first_image') }}
                                                            :</label>
                                                        <input type="file" class="form-control" name="left_first_image"
                                                                  id="exampleFormControlTextarea1"
                                                                  value="{{$data->left_first_image}}"  />
                                                    </div>

{{--          /************************************************/********************************/--}}
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('about_company_admin.left_second_image') }}
                                                            :</label>
                                                        <input type="file" class="form-control" name="left_second_image"
                                                                  id="exampleFormControlTextarea1"
                                                                 value="{{$data->left_second_image}}"  />
                                                    </div>
  {{--          /************************************************/********************************/--}}

                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('about_company_admin.our_vision_image') }}
                                                            :</label>
                                                        <input type="file" class="form-control" name="our_vision_image"
                                                                  id="exampleFormControlTextarea1"
                                                                 value="{{$data->our_vision_image}}"   />
                                                    </div>
   {{--          /************************************************/********************************/--}}

   {{--          /************************************************/********************************/--}}

                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('about_company_admin.added_or_updated_by') }}
                                                            :</label>
                                                        <input class="form-control" name="user_id"
                                                                  id="exampleFormControlTextarea1"
                                                                   value="{{auth()->id()}}" />
                                                    </div>

   {{--          /************************************************/********************************/--}}

                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('about_company_admin.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('about_company_admin.submit') }}</button>
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
                                                    {{ trans('about_company_admin.Delete') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                    {{--  /****************************destroy form***************************************/--}}
                                                <form action="{{  \LaravelLocalization::localizeURL(route('about_company.destroy' , $data->id))}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    {{ trans('about_company_admin.Warning_Record') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value=" Grade->id  ">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('about_company_admin.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('about_company_admin.submit') }}</button>
                                                    </div>
                                                </form>
                     {{--  /*******************************************************************/--}}

                                            </div>
                                        </div>
                                    </div>
                                </div>








                        </table>
                        @endforeach
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
                            {{ trans('about_company_admin.add') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('about_company.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                            <input type="hidden" name="user_id" value="{{auth()->id()}}">


                            <div class="row">
                                <div class="col">
                                    <label for="about_company_summary"
                                           class="mr-sm-2">{{ trans('about_company_admin.about_company_summary_ar') }}
                                        :</label>
                                    <input id="about_company_summary" type="text" name="about_company_summary" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="about_company_summary_en"
                                           class="mr-sm-2">{{ trans('about_company_admin.about_company_summary_en') }}
                                        :</label>
                                    <input id="about_company_summary_en" type="text" class="form-control" name="about_company_summary_en">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="our_vision_summary"
                                           class="mr-sm-2">{{ trans('about_company_admin.our_vision_summary_ar') }}
                                        :</label>
                                    <input id="our_vision_summary" type="text" name="our_vision_summary" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="our_vision_summary_en"
                                           class="mr-sm-2">{{ trans('about_company_admin.our_vision_summary_en') }}
                                        :</label>
                                    <input id="our_vision_summary_en" type="text" class="form-control" name="our_vision_summary_en">
                                </div>
                            </div>




                            <div class="row">
                                <div class="col">
                                    <label for="work_with_us_summary"
                                           class="mr-sm-2">{{ trans('about_company_admin.work_with_us_summary_ar') }}
                                        :</label>
                                    <input id="work_with_us_summary" type="text" name="work_with_us_summary" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="work_with_us_summary_en"
                                           class="mr-sm-2">{{ trans('about_company_admin.work_with_us_summary_en') }}
                                        :</label>
                                    <input id="work_with_us_summary_en" type="text" class="form-control" name="work_with_us_summary_en">
                                </div>
                            </div>


                            {{--/*****************************************************************/--}}
                            <div class="form-group">
                                        <label
                                            for="exampleFormControlTextarea1">{{ trans('about_company_admin.left_first_image') }}
                                            :</label>
                                <input type="file" class="form-control"  name="left_first_image" id="exampleFormControlTextarea1" />
                            </div>
                            {{--/*****************************************************************/--}}
                            <br>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">{{ trans('about_company_admin.left_second_image') }}
                                    :</label>
                                <input type="file" class="form-control" name="left_second_image" id="exampleFormControlTextarea1" />

                            </div>
                            {{--/*****************************************************************/--}}

                            <br>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">{{ trans('about_company_admin.our_vision_image') }}
                                    :</label>
                                <input type="file" class="form-control" name="our_vision_image" id="exampleFormControlTextarea1" />

                            </div>
                            {{--/*****************************************************************/--}}


                            <br><br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('about_company_admin.Close') }}</button>
                                <button type="submit"
                                        class="btn btn-success">{{ trans('about_company_admin.submit') }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>



    {{ $dataAll->links() }}


    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
