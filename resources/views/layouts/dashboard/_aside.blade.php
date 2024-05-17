<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">

                <img src="{{ asset('dashboard_files/images/user_avatar.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->user_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">



            <li style="font-size: 16px; font-weight: bold"><a href="{{route('admin.homepage')}}"><i class="fa fa-dashboard"></i><span>@lang('site.admin_dashboard')</span></a></li>
            {{--<li style="font-size: 16px; font-weight: bold"><a href="{{route('admin.index')}}"><i class="fa fa-users" aria-hidden="true"></i><span>@lang('site.admins')</span></a></li>
            <li style="font-size: 16px; font-weight: bold"><a href="{{route('trip_type.index')}}"><i class="fa fa-tags"></i><span>@lang('site_trip_types.trip_types')</span></a></li>
            <li style="font-size: 16px; font-weight: bold"><a href="{{route('trip_destination.index')}}"><i class="fa fa-map-marker"></i><span>@lang('site_trip_destinations.trip_destinations')</span></a></li>
            --}}
            <li style="font-size: 16px; font-weight: bold"><a href="{{route('slider.index')}}"><i class="fa fa-image"></i><span>@lang('site.album')</span></a></li>
{{--
            <li style="font-size: 16px; font-weight: bold"><a href="{{route('comment.index')}}"><i class="fa fa-comment"></i><span>@lang('site.comments')</span></a></li>
--}}
            {{--<li style="font-size: 16px; font-weight: bold"><a href="{{route('setting.social_media')}}"><i class="fa fa-cogs" aria-hidden="true"></i><span>@lang('site_setting.social_media')</span></a></li>
            <li style="font-size: 16px; font-weight: bold"><a href="{{route('setting.get_app_phone_number')}}"><i class="fa fa-cogs" aria-hidden="true"></i><span>@lang('site_setting.app_phone_number')</span></a></li>
--}}

        </ul>

    </section>

</aside>

