@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('clients_admin.title_page') }}
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
                                    {{ trans('clients_admin.add') }}
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
                                <th  class="boxShadowCustom" >{{ trans('clients_admin.title') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('clients_admin.summary') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('clients_admin.images') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('clients_admin.trusted_client') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('clients_admin.user_id') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('clients_admin.created_at') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('clients_admin.updated_at') }}</th>

                                <th>{{ trans('clients_admin.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @if(isset($clients))
                                @foreach ($clients as $client)
                                    <tr @if($client->trusted_client === 1) class="trusted_color" @endif>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $client->title }}</td>
                                        <td>{{ $client->summary }}</td>
                                            <td><img class="boxShadowCustom" src="{{asset('assets/images_front/clients_images/')}}/{{ $client->image }}" width="200" height="200"></td>


                                            <td>{{ $client->trusted_client }}</td>
                                            <td>{{ \App\User::find($client->user_id)->value('name') }}</td>
                                            <td>{{ $client->created_at }}</td>
                                            <td>{{ $client->updated_at }}</td>

                                            <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $client->id }}"
                                                    title="{{ trans('clients_admin.Edit') }}"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $client->id }}"
                                                    title="{{ trans('clients_admin.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- edit_modal_Grade -->
                                    <div class="modal fade" id="edit{{ $client->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('clients_admin.edit') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ \LaravelLocalization::localizeURL(route('clients.update', $client->id)) }}" method="post" enctype="multipart/form-data">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="title_ar"
                                                                       class="mr-sm-2">{{ trans('clients_admin.title_ar') }}
                                                                    :</label>
                                                                <input id="title" type="text" name="title"
                                                                       class="form-control"
                                                                       value="{{ $client->getTranslation('title', 'ar') }}" required  maxlength="110"  />
                                                                <input id="id" type="hidden" name="id" class="form-control"
                                                                       value="{{ $client->id }}">
                                                            </div>
                                                            <div class="col">
                                                                <label for="title_en"
                                                                       class="mr-sm-2">{{ trans('clients_admin.title_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                       value="{{ $client->getTranslation('title', 'en') }}"
                                                                       name="title_en" required  maxlength="110"  />
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="summary_ar"
                                                                       class="mr-sm-2">{{ trans('clients_admin.summary_ar') }}
                                                                    :</label>
                                                                <input id="summary" type="text" name="summary"
                                                                       class="form-control"
                                                                       value="{{ $client->getTranslation('summary', 'ar') }}" required  maxlength="110"  />
                                                            </div>
                                                            <div class="col">
                                                                <label for="summary_en"
                                                                       class="mr-sm-2">{{ trans('clients_admin.summary_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                       value="{{ $client->getTranslation('summary', 'en') }}"
                                                                       name="summary_en" required  maxlength="110"  />
                                                            </div>
                                                        </div>


                                                        <input type="hidden" name="user_id" value="{{auth()->id()}}" />

                                                        <br>

                                                        <div class="form-group">

                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('clients_admin.trusted_client') }}
                                                                :</label>
                                                            <br>
                                                            <select name="trusted_client">
                                                                <option @if($client->trusted_client === 0) selected @endif value="{{(int)0}}"> {{ trans('clients_admin.un_trusted') }}</option>
                                                                <option  @if($client->trusted_client === 1) selected @endif  value="{{(int)1}}"> {{ trans('clients_admin.trusted') }}</option>

                                                            </select>
                                                        </div>


                                                        <div class="form-group">

                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('clients_admin.image') }}
                                                                :</label>
                                                            <br>
                                                            <input type="file" name="image" value="{{$client->image}}"  />
{{--                                                            <img class="form-control"--}}
{{--                                                                      id="exampleFormControlTextarea1"--}}
{{--                                                                      src="{{asset('assets/images_front/projects_page/')}}/{{ $client->image }}" width="200" height="200" />--}}
                                                        </div>


                                                        <div class="form-group">

                                                            <br>
                                                        </div>



                                                        <br><br>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('clients_admin.Close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-success">{{ trans('clients_admin.submit') }}</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $client->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('clients_admin.delete') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ \LaravelLocalization::localizeURL(route('clients.destroy', $client->id)) }}" method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('clients_admin.warning') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $client->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('clients_admin.close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{ trans('clients_admin.submit') }}</button>
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
                            {{ trans('clients_admin.add') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ \LaravelLocalization::localizeURL(route('clients.store')) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="title" class="mr-sm-2">{{ trans('clients_admin.title_ar') }}
                                        :</label>
                                    <input id="title" type="text" required maxlength="110" name="title" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="title_en" class="mr-sm-2">{{ trans('clients_admin.title_en') }}
                                        :</label>
                                    <input type="text" class="form-control" required  maxlength="110"  name="title_en">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="summary"  class="mr-sm-2">{{ trans('clients_admin.summary_ar') }}
                                        :</label>
                                    <input id="summary" type="text" name="summary" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="summary_en" class="mr-sm-2">{{ trans('clients_admin.summary_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="summary_en">
                                </div>
                            </div>

                            <input name="user_id" type="hidden" value="{{auth()->id()}}" />


                            <div class="form-group">

                                <label>
                                    {{ trans('clients_admin.trusted_client') }}
                                    :</label>
                                <br>
                                <select name="trusted_client" required>
                                    <option  value="0"> {{ trans('clients_admin.un_trusted') }}</option>
                                    <option  value="1"> {{ trans('clients_admin.trusted') }}</option>

                                </select>
                            </div>





                            <div class="form-group">
                                <label>
                                    {{ trans('clients_admin.image') }}
                                    :</label>
                                <input class="form-control" name="image" type="file" required />

                            </div>



                            <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('clients_admin.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('clients_admin.submit') }}</button>
                    </div>
                    </form>
                </div>

                </div>
            </div>
        </div>




            <div>

            </div>

    </div>
    {{ $clients->links() }}

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
                    url:"search/client",
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
