@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('groups_admin.title_page') }}
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
                            {{ trans('groups_admin.add') }}
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
                                <th  class="boxShadowCustom" >{{ trans('groups_admin.tite') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('groups_admin.last_one_added_or_updated') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('groups_admin.created_at') }}</th>
                                <th  class="boxShadowCustom" >{{ trans('groups_admin.updated_at') }}</th>

                                <th>{{ trans('groups_admin.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @if(isset($groups))
                                @foreach ($groups as $group)
                                    <tr>


                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                            <td><a class="btn button_custom" href="newss?group={{$group->id}}">{{ $group->title }}</a></td>
                                        <td>{{ \App\User::find($group->user_id)->value('name') }}</td>
                                            <td>{{ $group->created_at }}</td>
                                            <td>{{ $group->updated_at }}</td>


                                            <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $group->id }}"
                                                    title="{{ trans('groups_admin.Edit') }}"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $group->id }}"
                                                    title="{{ trans('groups_admin.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- edit_modal_Grade -->
                                    <div class="modal fade" id="edit{{ $group->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('groups_admin.edit') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ route('groups.update', $group->id) }}" method="post" enctype="multipart/form-data">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="title_ar"
                                                                       class="mr-sm-2">{{ trans('groups_admin.title_ar') }}
                                                                    :</label>
                                                                <input id="title" type="text" name="title"
                                                                       class="form-control"
                                                                       value="{{ $group->getTranslation('title', 'ar') }}"  maxlength="110" required />
                                                                <input id="id" type="hidden" name="id" class="form-control"
                                                                       value="{{ $group->id }}">
                                                            </div>
                                                            <div class="col">
                                                                <label for="title_en"
                                                                       class="mr-sm-2">{{ trans('groups_admin.title_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                       value="{{ $group->getTranslation('title', 'en') }}"
                                                                       name="title_en"  maxlength="110" required />
                                                            </div>
                                                        </div>



                                                        <input type="hidden" name="user_id" value="{{auth()->id()}}" />

                                                        <br>








                                                        <br><br>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('groups_admin.Close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-success">{{ trans('groups_admin.submit') }}</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $group->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('groups_admin.delete') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('groups.destroy', $group->id) }}" method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('carousels.warning') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $group->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('groups_admin.close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{ trans('groups_admin.submit') }}</button>
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
                            {{ trans('groups_admin.add') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('groups.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="title" class="mr-sm-2">{{ trans('groups_admin.title_ar') }}
                                        :</label>
                                    <input id="title" type="text" name="title" class="form-control" maxlength="110" required>
                                </div>
                                <div class="col">
                                    <label for="title_en" class="mr-sm-2">{{ trans('groups_admin.title_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="title_en"  maxlength="110" required>
                                </div>
                            </div>


                            <input name="user_id" type="hidden" value="{{auth()->id()}}" />


                            <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('groups_admin.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('groups_admin.submit') }}</button>
                    </div>
                    </form>
                </div>

                </div>
            </div>
        </div>




            <div>

            </div>
    </div>

    {{ $groups->links() }}

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
                    url:"search/group",
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
