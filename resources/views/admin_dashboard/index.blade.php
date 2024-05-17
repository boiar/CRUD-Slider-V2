@extends('layouts.dashboard.app')

@section('content')


    <div class="content-wrapper">
        <section class="content-header">

        </section>

        <section class="content">

            <!-- Small boxes (Stat box) -->
{{--
            <div class="row">

                <div class="col-lg-3 col-xs-6" style="width: 25%">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$all_admins_count}}</h3>
                            <p style="font-size: 15px; font-weight: bold">@lang('site.admins')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6" style="width: 25%">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$all_trips_count}}</h3>
                            <p style="font-size: 15px; font-weight: bold">@lang('site.trips')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-plane"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6" style="width: 25%">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$trips_in_homepage_count}}</h3>
                            <p style="font-size: 15px; font-weight: bold">@lang('site.trips_in_homepage')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-plane"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6" style="width: 25%">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$all_comments_count}}</h3>
                            <p style="font-size: 15px; font-weight: bold">@lang('site.comments')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-textsms"></i>
                        </div>
                    </div>
                </div>


            </div>
--}}



        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
