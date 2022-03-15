<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#plans">
                            <div class="pull-left"><i class="ti-menu-alt"></i><span
                                    class="right-nav-text">{{trans('main_trans.employees')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="plans" class="collapse" data-parent="#plans">
                            <li> <a href="{{url("employees")}}"> {{trans('main_trans.all_employees')}}</a> </li>
                            <li> <a href="{{url("unseen_employees")}}"> {{trans('main_trans.unseen_employees')}}</a> </li>

                            <li> <a href="{{url("accepted_employees")}}"> {{trans('main_trans.accepted_employees')}}</a> </li>
                            <li> <a href="{{url("rejected_employees")}}"> {{trans('main_trans.rejected_employees')}}</a> </li>
                            <li> <a href="{{url("postponed_employees")}}"> {{trans('main_trans.postponed_employees')}}</a> </li>

                        </ul>



                    </li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="{{url('about_company')}}"   >
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{trans('main_trans.about_company')}}</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item constructions-->
                    <li>
                        <a href="{{url('constructions')}}">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{trans('main_trans.constructions')}}</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="{{url('electrics')}}"><i class="ti-menu-alt"></i><span class="right-nav-text">{{trans('main_trans.electrics')}}</span> </a>
                    </li>
                    <!-- menu item chat-->
                    <li>
                        <a href="{{url('roads')}}"><i class="ti-comments"></i><span class="right-nav-text">{{trans('main_trans.roads')}}
                            </span></a>
                    </li>
                    <!-- menu item mailbox-->
                    <li>
                        <a href="{{url('landscapes')}}"><i class="ti-email"></i><span class="right-nav-text">{{trans('main_trans.landscapes')}}
                                </span> <span class="badge badge-pill badge-warning float-right mt-1"></span> </a>
                    </li>

                    <!-- menu item mailbox-->
                    <li>
                        <a href="{{url('carousels')}}"><i class="ti-email"></i><span class="right-nav-text">{{trans('main_trans.carousel')}}
                                </span> <span class="badge badge-pill badge-warning float-right mt-1"></span> </a>
                    </li>

                    <li>
                        <a href="{{url('groups')}}"><i class="ti-email"></i><span class="right-nav-text">{{trans('main_trans.groups_of_news')}}
                                </span> <span class="badge badge-pill badge-warning float-right mt-1"></span> </a>
                    </li>


                    <li>
                        <a href="{{url('managers')}}"><i class="ti-email"></i><span class="right-nav-text">{{trans('main_trans.managers')}}
                                </span> <span class="badge badge-pill badge-warning float-right mt-1"></span> </a>
                    </li>

                    <li>
                        <a href="{{url('footers')}}"><i class="ti-email"></i><span class="right-nav-text">{{trans('main_trans.footer')}}
                                </span> <span class="badge badge-pill badge-warning float-right mt-1"></span> </a>
                    </li>

                    <li>
                        <a href="{{url('clients')}}"><i class="ti-email"></i><span class="right-nav-text">{{trans('main_trans.clients')}}
                                </span> <span class="badge badge-pill badge-warning float-right mt-1"></span> </a>
                    </li>



                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
