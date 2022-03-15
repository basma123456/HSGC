
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
    {{ trans('footer_admin.title_page') }}
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
                        {{ trans('footer_admin.add') }}
                    </button>

                        <br><br>
{{--                        /*********************update and delete buttons******************/--}}
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit Grade->id "
                                    title="{{ trans('footer_admin.Edit') }}"><i
                                    class="fa fa-edit"></i> {{trans('footer_admin.Edit')}}</button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete Grade->id "
                                    title="{{ trans('footer_admin.Delete') }}"><i
                                    class="fa fa-trash"></i> {{ trans('footer_admin.Delete') }} </button>


                        {{--                        /*********************update and delete buttons******************/--}}

                        <br><br>

                    <div class="table-responsive">

                        @foreach($dataAll as $data)

                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>

                                <th class="backGroundTh">{{trans('footer_admin.the_field')}}</th>
                                <th class="backGroundTh">{{trans('footer_admin.the_value')}}</th>




                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="backGroundTd">{{trans('footer_admin.summary')}}</td>
                                    <td class="backGroundTdRight">{{$data->summary}} </td>



                                </tr>

                                <tr>
                                    <td class="backGroundTd">{{trans('footer_admin.company_address')}}</td>
                                    <td class="backGroundTdRight">{{$data->company_address}}</td>



                                </tr>



                                <tr>
                                    <td class="backGroundTd">{{trans('footer_admin.company_email')}}</td>
                                    <td class="backGroundTdRight">{{$data->company_email}}</td>



                                </tr>



                                <tr>
                                    <td class="backGroundTd">{{trans('footer_admin.company_phone')}}</td>
                                    <td class="backGroundTdRight">{{$data->company_phone}}</td>



                                </tr>


                                <tr>
                                    <td class="backGroundTd">{{trans('footer_admin.facebook_link')}}</td>
                                    <td class="backGroundTdRight"><a class="text-primary" href="{{$data->facebook_link}}">{{$data->facebook_link}}</a></td>



                                </tr>


                                <tr>
                                    <td class="backGroundTd">{{trans('footer_admin.instagram_link')}}</td>
                                    <td class="backGroundTdRight"><a class="text-primary"  href="{{$data->instagram_link}}">{{$data->instagram_link}}</a></td>



                                </tr>





                                <tr>
                                    <td class="backGroundTd">{{trans('footer_admin.twitter_link')}}</td>
                                    <td class="backGroundTdRight"><a class="text-primary"  href="{{$data->twitter_link}}">{{$data->twitter_link}}</a></td>



                                </tr>


                                <tr>
                                    <td class="backGroundTd">{{trans('footer_admin.added_or_updated_by')}}</td>
                                    <td class="backGroundTdRight">{{\App\User::find($data->user_id)->value('name')}}</td>



                                </tr>




                                <tr>
                                    <td class="backGroundTd">{{trans('footer_admin.created_at')}}</td>
                                    <td class="backGroundTdRight">{{$data->created_at}} </td>



                                </tr>


                                <tr>
                                    <td class="backGroundTd">{{trans('footer_admin.updated_at')}}</td>
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
                                                    {{ trans('footer_admin.Edit') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- update_form -->
                                                <form action="{{route('footers.update' , $data->id)}}" method="post" enctype="multipart/form-data">
                                                    {{method_field('patch')}}
                                                    @csrf
                                                    <div class="row">


                                                        <div class="col">
                                                            <label for="summary"
                                                                   class="mr-sm-2">{{ trans('footer_admin.summary_ar') }}
                                                                :</label>
                                                            <input id="summary" type="text" name="summary"
                                                                   class="form-control"
                                                                   value="{{ $data->getTranslation('summary', 'ar') }}"  maxlength="210" required >
                                                        </div>
                                                        <div class="col">
                                                            <label for="summary_en"
                                                                   class="mr-sm-2">{{ trans('footer_admin.summary_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ $data->getTranslation('summary', 'en') }}"
                                                                   name="summary_en"  maxlength="210" required>
                                                        </div>
                                                    </div>
{{--          /***********************************************************************************/                                          --}}

                                                    <div class="row">


                                                        <div class="col">
                                                            <label for="company_address"
                                                                   class="mr-sm-2">{{ trans('footer_admin.company_address_ar') }}
                                                                :</label>
                                                            <input id="company_address" type="text" name="company_address"
                                                                   class="form-control"
                                                                   value="{{ $data->getTranslation('company_address', 'ar') }}"  maxlength="210" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="company_address_en"
                                                                   class="mr-sm-2">{{ trans('footer_admin.company_address_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ $data->getTranslation('company_address', 'en') }}"
                                                                   name="company_address_en"  maxlength="210" required>
                                                        </div>
                                                    </div>

{{--        /*******************************************************************************************/--}}



   {{--          /*******************************************************************************/                                          --}}


     {{--          /*******************************************************************************/                                          --}}

                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('footer_admin.company_email') }}
                                                            :</label>
                                                        <input type="email" class="form-control" name="company_email"
                                                                  id="exampleFormControlTextarea1"
                                                                  value="{{$data->company_email}}" required />
                                                    </div>

{{--          /************************************************/********************************/--}}
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('footer_admin.company_phone') }}
                                                            :</label>
                                                        <input type="text" class="form-control" name="company_phone"
                                                                  id="exampleFormControlTextarea1"
                                                                 value="{{$data->company_phone}}" required />
                                                    </div>
  {{--          /************************************************/********************************/--}}

{{--                                                    <div class="form-group">--}}
{{--                                                        <label--}}
{{--                                                            for="exampleFormControlTextarea1">{{ trans('footer_admin.company_address') }}--}}
{{--                                                            :</label>--}}
{{--                                                        <input type="text" class="form-control" name="company_address"--}}
{{--                                                                  id="exampleFormControlTextarea1"--}}
{{--                                                                 value="{{$data->company_address}}"  maxlength="210" required  />--}}
{{--                                                    </div>--}}
   {{--          /************************************************/********************************/--}}

   {{--          /************************************************/********************************/--}}

                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="user_id"
                                                                  id="exampleFormControlTextarea1"
                                                                   value="{{auth()->id()}}" />
                                                    </div>

   {{--          /************************************************/********************************/--}}
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('footer_admin.facebook_link') }}
                                                            :</label>
                                                        <input class="form-control" type="url" name="facebook_link"
                                                               id="exampleFormControlTextarea1"
                                                               value="{{$data->facebook_link}}"   required />
                                                    </div>

{{--             /***********************************************/--}}


                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('footer_admin.instagram_link') }}
                                                            :</label>
                                                        <input class="form-control" type="url" name="instagram_link"
                                                               id="exampleFormControlTextarea1"
                                                               value="{{$data->instagram_link}}"   required />
                                                    </div>

  {{--             /***********************************************/--}}


                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('footer_admin.twitter_link') }}
                                                            :</label>
                                                        <input class="form-control" type="url" name="twitter_link"
                                                               id="exampleFormControlTextarea1"
                                                               value="{{$data->twitter_link}}" required />
                                                    </div>
 {{--             /***********************************************/--}}

                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('footer_admin.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('footer_admin.submit') }}</button>
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
                                                    {{ trans('footer_admin.Delete') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                    {{--  /****************************destroy form***************************************/--}}
                                                <form action="{{route('footers.destroy' , $data->id)}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    {{ trans('footer_admin.Warning_Record') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value=" Grade->id  ">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('footer_admin.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('footer_admin.submit') }}</button>
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
                            {{ trans('footer_admin.add') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('footers.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                            <input type="hidden" name="user_id" value="{{auth()->id()}}">


                            <div class="row">
                                <div class="col">
                                    <label for="summary"
                                           class="mr-sm-2">{{ trans('footer_admin.summary_ar') }}
                                        :</label>
                                    <input id="summary" type="text" name="summary" class="form-control" maxlength="210" required>
                                </div>
                                <div class="col">
                                    <label for="summary_en"
                                           class="mr-sm-2">{{ trans('footer_admin.summary_en') }}
                                        :</label>
                                    <input id="summary_en" type="text" class="form-control" name="summary_en"  maxlength="210" required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="company_address"
                                           class="mr-sm-2">{{ trans('footer_admin.company_address_ar') }}
                                        :</label>
                                    <input id="company_address" type="text" name="company_address" class="form-control"  maxlength="210" required>
                                </div>
                                <div class="col">
                                    <label for="company_address_en"
                                           class="mr-sm-2">{{ trans('footer_admin.company_address_en') }}
                                        :</label>
                                    <input id="company_address_en" type="text" class="form-control" name="company_address_en"  maxlength="210" required>
                                </div>
                            </div>






                            {{--/*****************************************************************/--}}
                            <div class="form-group">
                                        <label
                                            for="exampleFormControlTextarea1">{{ trans('footer_admin.company_email') }}
                                            :</label>
                                <input type="email" class="form-control"  name="company_email" id="exampleFormControlTextarea1" required />
                            </div>
                            {{--/*****************************************************************/--}}
                            <br>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">{{ trans('footer_admin.company_phone') }}
                                    :</label>
                                <input type="text" class="form-control" name="company_phone" id="exampleFormControlTextarea1" required />

                            </div>
                            {{--/*****************************************************************/--}}

                            <br>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">{{ trans('footer_admin.facebook_link') }}
                                    :</label>
                                <input type="url" class="form-control" name="facebook_link" id="exampleFormControlTextarea1" required />

                            </div>
                            {{--/*****************************************************************/--}}
                            <br>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">{{ trans('footer_admin.instagram_link') }}
                                    :</label>
                                <input type="url" class="form-control" name="instagram_link" id="exampleFormControlTextarea1" required />

                            </div>

                            <br>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">{{ trans('footer_admin.twitter_link') }}
                                    :</label>
                                <input type="url" class="form-control" name="twitter_link" id="exampleFormControlTextarea1" required />

                            </div>



                            <br><br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('footer_admin.Close') }}</button>
                                <button type="submit"
                                        class="btn btn-success">{{ trans('footer_admin.submit') }}</button>
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
