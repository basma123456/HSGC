@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('newss.title_page') }}
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
                                    {{ trans('newss.add') }}
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
                                <th  class="boxShadowCustom" >{{ trans('newss.title') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('newss.summary') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('newss.images') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('newss.added_or_updated_by') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('newss.created_at') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('newss.updated_at') }}</th>

                                <th>{{ trans('newss.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @if(isset($newss))
                                @foreach($newss as $news)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $news->title }}</td>
                                        <td>{{ $news->summary }}</td>
                                            <td>

                                                <img class="boxShadowCustom"  src="{{asset('assets/images_front/news_images/')}}/{{ $news->image }}" >

                                            </td>

                                            <td>{{ \App\User::find($news->user_id)->value('name') }}</td>

                                            <td>{{ $news->created_at }}</td>
                                            <td>{{ $news->updated_at }}</td>

                                            <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $news->id }}"
                                                    title="{{ trans('newss.Edit') }}"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $news->id }}"
                                                    title="{{ trans('newss.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- edit_modal_Grade -->
                                    <div class="modal fade" id="edit{{ $news->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('newss.edit') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ route('newss.update', $news->id) }}" method="post" enctype="multipart/form-data">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="title_ar"
                                                                       class="mr-sm-2">{{ trans('newss.title_ar') }}
                                                                    :</label>
                                                                <input id="title" type="text" name="title"
                                                                       class="form-control"
                                                                       value="{{ $news->getTranslation('title', 'ar') }}"  maxlength="120" required />
                                                                <input id="id" type="hidden" name="id" class="form-control"
                                                                       value="{{ $news->id }}">
                                                            </div>
                                                            <div class="col">
                                                                <label for="title_en"
                                                                       class="mr-sm-2">{{ trans('newss.title_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                       value="{{ $news->getTranslation('title', 'en') }}"
                                                                       name="title_en"    maxlength="120" required  />
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="summary_ar"
                                                                       class="mr-sm-2">{{ trans('newss.summary_ar') }}
                                                                    :</label>
                                                                <input id="summary" type="text" name="summary"
                                                                       class="form-control"
                                                                       value="{{ $news->getTranslation('summary', 'ar') }}" maxlength="320"  required />
                                                            </div>
                                                            <div class="col">
                                                                <label for="summary_en"
                                                                       class="mr-sm-2">{{ trans('newss.summary_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                       value="{{ $news->getTranslation('summary', 'en') }}"
                                                                       name="summary_en" maxlength="320"  required />
                                                            </div>
                                                        </div>


                                                        <input type="hidden" name="user_id" value="{{auth()->id()}}" />
                                                        <input type="hidden" name="group" value="{{$group}}">
                                                        <br>

                                                        <div class="form-group">

                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('newss.client_id') }}
                                                                :</label>
                                                            <br>
                                                        </div>


                                                        <div class="form-group">

                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('newss.image') }}
                                                                :</label>
                                                            <br>
                                                            <input type="file" name="image" value="{{$news->image}}" />
{{--                                                            <img class="form-control"--}}
{{--                                                                      id="exampleFormControlTextarea1"--}}
{{--                                                                      src="{{asset('assets/images_front/projects_page/')}}/{{ $news->image }}" width="200" height="200" />--}}
                                                        </div>





                                                        <br><br>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('newss.Close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-success">{{ trans('newss.submit') }}</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $news->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('newss.delete') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('newss.destroy', $news->id) }}" method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('newss.warning') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $news->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('newss.close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{ trans('newss.submit') }}</button>
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
                            {{ trans('newss.add') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->

                            <form  action="{{ route('newss.store') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="group" value="{{$group}}">
                                    <div class="col">
                                        <label for="title" class="mr-sm-2">{{ trans('newss.title_ar') }}
                                            :</label>
                                        <input id="title" type="text" name="title" class="form-control"  maxlength="110" required>
                                    </div>
                                    <div class="col">
                                        <label for="title_en" class="mr-sm-2">{{ trans('newss.title_en') }}
                                            :</label>
                                        <input type="text" class="form-control" name="title_en"  maxlength="110" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="summary" class="mr-sm-2">{{ trans('newss.summary_ar') }}
                                            :</label>
                                        <input id="summary" type="text" name="summary" class="form-control" maxlength="320" required>
                                    </div>
                                    <div class="col">
                                        <label for="summary_en" class="mr-sm-2">{{ trans('newss.summary_en') }}
                                            :</label>
                                        <input type="text" class="form-control" name="summary_en" maxlength="320" required>
                                    </div>
                                </div>

                                <input name="user_id" type="hidden" value="{{auth()->id()}}" />

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{ trans('newss.image') }}
                                        :</label>
                                    <input class="form-control" name="image" type="file" id="exampleFormControlTextarea1" required />

                                </div>




                                <br><br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('newss.Close') }}</button>
                                    <button type="submit" class="btn btn-success">{{ trans('newss.submit') }}</button>
                                </div>
                            </form>



                </div>

                </div>
            </div>
        </div>




            <div>

            </div>

    </div>

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
                    url:"search/news",
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
