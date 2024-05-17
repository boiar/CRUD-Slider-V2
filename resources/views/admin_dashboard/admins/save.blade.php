@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.admins')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.homepage') }}"><i class="fa fa-dashboard"></i> @lang('site.admin_dashboard')</a></li>
                <li><a href="{{ route('admin.index') }}"> @lang('site.admins')</a></li>
                <li class="active"><?php echo isset($admin->user_id)? __('site.edit') : __('site.add') ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title"> <?php echo isset($admin->user_id)? __('site.edit') : __('site.add') ?> </h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')



                    <?php isset($admin->user_id)?$id = $admin->user_id : $id = null?>
                    <form class="form-group" action="{{ route('admin.save_admin', $id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <?php
                            if(isset($admin->user_id)){
                                echo '<input hidden type="text" name="user_id" value="'.$admin->user_id.'">';
                            }
                        ?>

                        <div class="row mb-3 margin-bottom">
                            <div class="col-md-6 pr-md-1">
                                <label style="font-weight:bold; font-size: 18px">@lang('site_admin.admin_name')</label>
                                <input style="font-weight:bold; font-size: 16px" type="text" name="user_name" class="form-control" value="<?php echo isset($admin->user_id) && isset($admin->user_name)?  $admin->user_name : Request::old('user_name')?>">
                            </div>
                            <div class="col-md-6 pr-md-1">
                                <label style="font-weight:bold; font-size: 18px">@lang('site_admin.user_email')</label>
                                <input style="font-weight:bold; font-size: 16px" type="text" name="user_email" class="form-control" value="<?php echo isset($admin->user_id) && isset($admin->user_email)?  $admin->user_email : Request::old('user_email')?>">
                            </div>

                        </div>


                        <div class="row mb-3 margin-bottom">
                            <div class="col-md-6 pr-md-1">
                                <label style="font-weight:bold; font-size: 18px">@lang('site_admin.admin_password')</label>
                                <input style="font-weight:bold; font-size: 16px" type="password" name="password" class="form-control" value="">
                            </div>

                            <div class="col-md-6 pr-md-1">
                                <label style="font-weight:bold; font-size: 18px">@lang('site_admin.admin_confirm_password')</label>
                                <input style="font-weight:bold; font-size: 16px" type="password" name="confirm_password" class="form-control" value="">
                            </div>

                        </div>


                        <div class="row margin-bottom">
                            <div class="col-md-6 pl-md-1">
                                <button type="submit" class="btn btn-success"></i> @lang('site.save')</button>
                            </div>
                        </div>


                    </form><!-- end of form -->



                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
