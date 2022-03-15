@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('constructions_admin.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.Grades') }}
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


                                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                                    {{ trans('constructions_admin.add') }}
                                </button>

                                <div class="text-center w-25 search-custom">
                                    <input type="text" name="search" id="search" class="form-control" value="" placeholder="search here" /><span class='hide btn btn-secondary float-right' id='x_dismiss'>x</span>
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
                                <th  class="boxShadowCustom" >{{ trans('constructions_admin.title') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('constructions_admin.summary') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('constructions_admin.images') }}</th>

                                <th>{{ trans('constructions_admin.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @if(isset($constructions))
                                @foreach ($constructions as $construction)
                                    <tr    @if($construction->status == (int)0) style="background-color: rgba(187, 0, 0,0.1)" @endif>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $construction->title }}</td>
                                        <td>{{ $construction->summary }}</td>
                                            <td><img class="boxShadowCustom" src="{{asset('assets/images_front/projects_page/')}}/{{ $construction->image }}" width="200" height="200"></td>

                                            <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $construction->id }}"
                                                    title="{{ trans('constructions_admin.Edit') }}"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $construction->id }}"
                                                    title="{{ trans('constructions_admin.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- edit_modal_Grade -->
                                    <div class="modal fade" id="edit{{ $construction->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('constructions_admin.edit') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ route('constructions.update', $construction->id) }}" method="post" enctype="multipart/form-data">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="title_ar"
                                                                       class="mr-sm-2">{{ trans('constructions_admin.title_ar') }}
                                                                    :</label>
                                                                <input id="title" type="text" name="title"
                                                                       class="form-control"
                                                                       value="{{ $construction->getTranslation('title', 'ar') }}" />
                                                                <input id="id" type="hidden" name="id" class="form-control"
                                                                       value="{{ $construction->id }}">
                                                            </div>
                                                            <div class="col">
                                                                <label for="title_en"
                                                                       class="mr-sm-2">{{ trans('constructions_admin.title_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                       value="{{ $construction->getTranslation('title', 'en') }}"
                                                                       name="title_en"  />
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="summary_ar"
                                                                       class="mr-sm-2">{{ trans('constructions_admin.summary_ar') }}
                                                                    :</label>
                                                                <input id="summary" type="text" name="summary"
                                                                       class="form-control"
                                                                       value="{{ $construction->getTranslation('summary', 'ar') }}" />
                                                            </div>
                                                            <div class="col">
                                                                <label for="summary_en"
                                                                       class="mr-sm-2">{{ trans('constructions_admin.summary_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                       value="{{ $construction->getTranslation('summary', 'en') }}"
                                                                       name="summary_en"  />
                                                            </div>
                                                        </div>


                                                        <input type="hidden" name="user_id" value="{{auth()->id()}}" />

                                                        <br>

                                                        <div class="form-group">

                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('constructions_admin.client_id') }}
                                                                :</label>
                                                            <br>
                                                            <select name="client_id">
                                                                <option  value="{{$construction->client_id}}"> {{$construction->client_id}}</option>
                                                            </select>
                                                        </div>


                                                        <div class="form-group">

                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('constructions_admin.image') }}
                                                                :</label>
                                                            <br>
                                                            <input type="file" name="image" value="{{$construction->image}}" />
{{--                                                            <img class="form-control"--}}
{{--                                                                      id="exampleFormControlTextarea1"--}}
{{--                                                                      src="{{asset('assets/images_front/projects_page/')}}/{{ $construction->image }}" width="200" height="200" />--}}
                                                        </div>


                                                        <div class="form-group">

                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('constructions_admin.status') }}
                                                                :</label>
                                                            <br>
                                                            <select name="status">
                                                                <option  value="{{(int)1}}" @if($construction->status == (int)1) selected @endif> {{ trans('constructions_admin.activated') }}</option>
                                                                <option  value="{{(int)0}}" @if($construction->status == (int)0) selected @endif> {{ trans('constructions_admin.deactivated') }}</option>

                                                            </select>
                                                        </div>



                                                        <br><br>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('constructions_admin.Close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-success">{{ trans('constructions_admin.submit') }}</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $construction->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('constructions_admin.delete') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('constructions.destroy', $construction->id) }}" method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('constructions_admin.warning') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $construction->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('constructions_admin.close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{ trans('constructions_admin.submit') }}</button>
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

        {{--/****************************************add modal***************************************/--}}
        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('constructions_admin.add') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('constructions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="title" class="mr-sm-2">{{ trans('constructions_admin.title_ar') }}
                                        :</label>
                                    <input id="title" type="text" name="title" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="title_en" class="mr-sm-2">{{ trans('constructions_admin.title_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="title_en">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="summary" class="mr-sm-2">{{ trans('constructions_admin.summary_ar') }}
                                        :</label>
                                    <input id="summary" type="text" name="summary" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="summary_en" class="mr-sm-2">{{ trans('constructions_admin.summary_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="summary_en">
                                </div>
                            </div>

                            <input name="user_id" type="hidden" value="{{auth()->id()}}" />


                            <label for="summary_en" class="mr-sm-2">{{ trans('constructions_admin.choose_client') }}
                                :</label>
                            <select  name="client_id"  class="form-control">
                                @if(isset($clients))
                                    @foreach($clients as $client)
                                        <option>  </option>
                                        <option value="{{$client->id}}"> {{$client->title}} </option>
                                    @endforeach
                                @endif
                            </select>





                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ trans('constructions_admin.image') }}
                                    :</label>
                                <input class="form-control" name="image" type="file" id="exampleFormControlTextarea1" />

                            </div>



                            <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('constructions_admin.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('constructions_admin.submit') }}</button>
                    </div>
                    </form>
                </div>

                </div>
            </div>
        </div>




            <div>

            </div>

    </div>
    {{ $constructions->links() }}

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
                    url:"search/construction",
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
