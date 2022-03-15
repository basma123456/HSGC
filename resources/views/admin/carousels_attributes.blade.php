@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('carousel_attributes_admin.title_page') }}
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
                                    {{ trans('carousel_attributes_admin.add') }}
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
                                <th  class="boxShadowCustom" >{{ trans('carousel_attributes_admin.title') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('carousel_attributes_admin.summary') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('carousel_attributes_admin.image') }}</th>
                                @if($carousel === '3')
                                <th  class="boxShadowCustom" >{{ trans('carousel_attributes_admin.second_image') }}</th>
                                @endif
                                <th  class="boxShadowCustom" >{{ trans('carousel_attributes_admin.added_or_updated_by') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('carousel_attributes_admin.created_at') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('carousel_attributes_admin.updated_at') }}</th>

                                <th>{{ trans('carousel_attributes_admin.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @if(isset($carousels_attributes))
                                @foreach($carousels_attributes as $carousels_attribute)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $carousels_attribute->carousel_title }}</td>
                                        <td>{{ $carousels_attribute->carousel_summary }}</td>

                                            @if($carousel === '1' && isset($carousels_attribute->carousel_image) && $carousels_attribute->carousel_image !== '0' )
                                            <td>
                                                <video width="320" height="240" autoplay muted>

                                                <source class="boxShadowCustom" type="video/mp4" src="{{asset('assets/images_front/projects_page/')}}/{{ $carousels_attribute->carousel_image }}" >
                                                    Your browser does not support the video tag.
                                                </video>


                                            </td>
                                            @elseif(isset($carousels_attribute->carousel_image2) && $carousel === '1')
                                                <td>

                                                        <img class="boxShadowCustom" width="200" height="200" src="{{asset('assets/images_front/projects_page/')}}/{{ $carousels_attribute->carousel_image2 }}" >

                                                </td>
                                            @elseif($carousel === '3' || $carousel === '2')
                                                <td>

                                                    <img class="boxShadowCustom" width="200" height="200" src="{{asset('assets/images_front/projects_page/')}}/{{ $carousels_attribute->carousel_image }}" >

                                                </td>

                                            @endif

                                            @if($carousel === '3')
                                            <td>

                                                <img class="boxShadowCustom" width="200" height="200" src="{{asset('assets/images_front/projects_page/')}}/{{ $carousels_attribute->carousel_image2 }}" >

                                            </td>
                                            @endif

                                            <td>{{ \App\User::find($carousels_attribute->user_id)->value('name') }}</td>
                                            <td>{{ $carousels_attribute->created_at }}</td>
                                            <td>{{ $carousels_attribute->updated_at }}</td>

                                            <td>
                                            <button @if($carousel === '1') class="d-none" @endif type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $carousels_attribute->id }}"
                                                    title="{{ trans('carousel_attributes_admin.Edit') }}"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $carousels_attribute->id }}"
                                                    title="{{ trans('carousel_attributes_admin.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- edit_modal_Grade -->
                                    <div class="modal fade" id="edit{{ $carousels_attribute->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('carousel_attributes_admin.edit') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form  action="{{ \LaravelLocalization::localizeURL(route('carousels_attributes.update', $carousels_attribute->id)) }}" method="post" enctype="multipart/form-data">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="title_ar"
                                                                       class="mr-sm-2">{{ trans('carousel_attributes_admin.title_ar') }}
                                                                    :</label>
                                                                <input id="title" type="text" name="title"
                                                                       class="form-control" maxlength="120"
                                                                       value="{{ $carousels_attribute->getTranslation('carousel_title', 'ar') }}" />
                                                                <input id="id" type="hidden" name="id" class="form-control"
                                                                       value="{{ $carousels_attribute->id }}">
                                                            </div>
                                                            <div class="col">
                                                                <label for="title_en"
                                                                       class="mr-sm-2">{{ trans('carousel_attributes_admin.carousel_title_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"  maxlength="120"
                                                                       value="{{ $carousels_attribute->getTranslation('carousel_title', 'en') }}"
                                                                       name="title_en"  />
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="summary_ar"
                                                                       class="mr-sm-2">{{ trans('carousel_attributes_admin.carousel_summary_ar') }}
                                                                    :</label>
                                                                <input id="summary" type="text" name="summary"
                                                                       class="form-control"
                                                                       value="{{ $carousels_attribute->getTranslation('carousel_summary', 'ar') }}" />
                                                            </div>
                                                            <div class="col">
                                                                <label for="summary_en"
                                                                       class="mr-sm-2">{{ trans('carousel_attributes_admin.carousel_summary_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                       value="{{ $carousels_attribute->getTranslation('carousel_summary', 'en') }}"
                                                                       name="summary_en"  />
                                                            </div>
                                                        </div>


                                                        <input type="hidden" name="user_id" value="{{auth()->id()}}" />
                                                        <input type="hidden" name="carousel" value="{{$carousel}}">
                                                        <br>

                                                        <div class="form-group">

                                                        </div>


                                                        <div class="form-group">

                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('carousel_attributes_admin.image') }}
                                                                :</label>
                                                            <br>
                                                            <input type="file" name="image" value="{{$carousels_attribute->carousel_image}}" />
{{--                                                            <img class="form-control"--}}
{{--                                                                      id="exampleFormControlTextarea1"--}}
{{--                                                                      src="{{asset('assets/images_front/projects_page/')}}/{{ $carousels_attribute->image }}" width="200" height="200" />--}}
                                                        </div>


                                                        <div class="form-group">

                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('carousel_attributes_admin.status') }}
                                                                :</label>
                                                            <br>
                                                            <select name="status">
                                                                <option  value="{{(int)1}}" @if($carousels_attribute->status == (int)1) selected @endif> {{ trans('carousel_attributes_admin.activated') }}</option>
                                                                <option  value="{{(int)0}}" @if($carousels_attribute->status == (int)0) selected @endif> {{ trans('carousel_attributes_admin.deactivated') }}</option>

                                                            </select>
                                                        </div>



                                                        <br><br>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('carousel_attributes_admin.Close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-success">{{ trans('carousel_attributes_admin.submit') }}</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $carousels_attribute->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('carousel_attributes_admin.delete') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ \LaravelLocalization::localizeURL(route('carousels_attributes.destroy', $carousels_attribute->id)) }}" method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('carousel_attributes_admin.warning') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $carousels_attribute->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('carousel_attributes_admin.close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{ trans('carousel_attributes_admin.submit') }}</button>
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
                            {{ trans('carousel_attributes_admin.add') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->

                        @if($carousel === '1')

                            <form action="{{ \LaravelLocalization::localizeURL(route('videoStore',$carousel)) }}" method="Post" enctype="multipart/form-data" >
                                @csrf
                                <h6 class="text-primary">Choose a Video or an Image</h6>

                                <label>Video</label>
                                <input id="myvideo" type="file" name="video">
                                <hr>
                                <label>Image</label>
                                <input type="file" name="image2">
                                <hr>
                                <br>
                                <input type="submit" value="submit">
                            </form>

                        @else
                            <form  action="{{ \LaravelLocalization::localizeURL(route('carousels_attributes.store')) }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="carousel" value="{{$carousel}}">
                                    <div class="col">
                                        <label for="title" class="mr-sm-2">{{ trans('carousel_attributes_admin.title_ar') }}
                                            :</label>
                                        <input id="title" type="text" name="title" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="title_en" class="mr-sm-2">{{ trans('carousel_attributes_admin.title_en') }}
                                            :</label>
                                        <input type="text" class="form-control" name="title_en">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="summary" class="mr-sm-2">{{ trans('carousel_attributes_admin.summary_ar') }}
                                            :</label>
                                        <input id="summary" type="text" name="summary" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="summary_en" class="mr-sm-2">{{ trans('carousel_attributes_admin.summary_en') }}
                                            :</label>
                                        <input type="text" class="form-control" name="summary_en">
                                    </div>
                                </div>

                                <input name="user_id" type="hidden" value="{{auth()->id()}}" />

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{ trans('carousel_attributes_admin.image') }}
                                        :</label>
                                    <input class="form-control" name="image" type="file" id="exampleFormControlTextarea1" />

                                </div>


                                @if($carousel=='3')

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{ trans('carousel_attributes_admin.small_image') }}
                                            :</label>
                                        <input class="form-control" name="image2" type="file" id="exampleFormControlTextarea1" />

                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            <label for="text1" class="mr-sm-2">{{ trans('carousel_attributes_admin.text1_ar') }}
                                                :</label>
                                            <input id="text1" type="text" name="text1" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="text1_en" class="mr-sm-2">{{ trans('carousel_attributes_admin.text1_en') }}
                                                :</label>
                                            <input type="text1" class="form-control" name="text1_en">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            <label for="text2" class="mr-sm-2">{{ trans('carousel_attributes_admin.text2_ar') }}
                                                :</label>
                                            <input id="text2" type="text" name="text2" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="text2_en" class="mr-sm-2">{{ trans('carousel_attributes_admin.text2_en') }}
                                                :</label>
                                            <input type="text" class="form-control" name="text2_en">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            <label for="text3" class="mr-sm-2">{{ trans('carousel_attributes_admin.text3_ar') }}
                                                :</label>
                                            <input id="text3" type="text" name="text3" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="text3_en" class="mr-sm-2">{{ trans('carousel_attributes_admin.text3_en') }}
                                                :</label>
                                            <input type="text" class="form-control" name="text3_en">
                                        </div>
                                    </div>


                                @endif


                                <br><br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('carousel_attributes_admin.Close') }}</button>
                                    <button type="submit" class="btn btn-success">{{ trans('carousel_attributes_admin.submit') }}</button>
                                </div>
                            </form>


                            @endif

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
                    url:"search/carousels_attribute",
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
