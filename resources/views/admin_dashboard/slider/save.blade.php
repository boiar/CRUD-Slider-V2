@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.sliders')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.homepage') }}"><i class="fa fa-dashboard"></i> @lang('site.admin_dashboard')</a></li>
                <li><a href="{{ route('slider.index') }}"> @lang('site.sliders')</a></li>
                <li class="active"><?php echo isset($slider->slider_id)? __('site.edit') : __('site.add') ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box" style="border-top-color: #605ca8">

                <div class="box-header">
                    <h3 class="box-title"> <?php echo isset($slider->slider_id)? __('site.edit') : __('site.add') ?> </h3>
                </div><!-- end of box header -->

                <div class="box-body">



                    @include('partials._errors')


                    <?php isset($slider->slider_id)?$id = $slider->slider_id : $id = null?>
                    <form class="form-group" action="{{ route('slider.save_slider', $id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <?php
                            if(isset($slider->slider_id)){
                                echo '<input hidden type="text" name="slider_id" value="'.$slider->slider_id.'">';
                            }
                        ?>


                        {{-- Main data for slider--}}
                        <label style="color: #ff9b01; font-size: x-large" dir="rtl">@lang('site.slider_main_data')</label>
                        <div class="box" style="border: 1px #3c8dbc solid;  padding: 10px">

                            <div class="row mb-3 margin-bottom" style="direction: rtl">
                                    <div class="col-md-12 pr-md-1">
                                        <label>@lang('site.slider_short_name')</label>
                                        <input type="text" style="text-align: right" name="short_name" class="form-control" value="<?php echo isset($slider->slider_id) && isset($slider->short_name)?  $slider->short_name : ''?>" required>
                                    </div>
                            </div>


                        </div>



                        {{-- Media data for slider--}}
                        <label style="color: #ff9b01; font-size: x-large">@lang('site.slider_media_data')</label>

                        <div class="box" style="border: 1px #3c8dbc solid;  padding: 10px">

                            <div class="row mb-3">

                                <div class="col-md-6 pr-md-1">
                                    <label>@lang('site.slider')</label>
                                    <div class="custom-file" style="width: 90%;">
                                        <input type="file" name="slider[path][new][]" id="slider_img" class="custom-file-input" multiple>
                                        <label class="custom-file-label" for="exampleInputFile">Choose photos</label>
                                    </div>
                                </div>
                            </div>
                            <div id="deleted_slider_imgs"></div>

                            <div class="container" id="slider_img_holder" class="">


                                <?php
                                    if(isset($slider->slider_id)){
                                    //edit
                                        if(!empty($slider->slider)){
                                            $img_obj = json_decode($slider->slider, true);

                                            for($i = 0; $i < count($img_obj); $i++){
												$slider_img_name = $img_obj[$i]['path'];
                                                $slider_img_path  = asset("$slider_img_name");
                                                $slider_img_alt   = $img_obj[$i]['alt'];
                                                $slider_img_title = $img_obj[$i]['title'];
                                                $delete           = __('site.delete');

                                                echo"
                                                     <div class='row mb-3 slider_img_row' id='$slider_img_name'>
                                                        <div class='col-md-6 '>
                                                            <img class='slider_img_style' src='$slider_img_path'>
                                                            <input type='hidden' name='slider[path][old][]' value='$slider_img_name'>
                                                        </div>




                                                        <div class='col-md-3'>
                                                            <label>الوصف</label>
                                                            <input type='text' name='slider[title][]' class='form-control' placeholder='وصف الصورة' value='$slider_img_title'>
                                                        </div>

                                                          <div class='col-md-1'>
                                                            <input type='hidden' name='slider[alt][]' class='form-control' placeholder='وصف الصورة' value='$slider_img_title'>
                                                        </div>

                                                        <div class='col-md-2'>
                                                            <button class='btn btn-danger float-right remover_div' onclick='remover_slider_img(this)'>$delete</button>
                                                        </div>
                                                     </div>
                                                ";
                                            }
                                        }
                                    }
                                ?>

                                <input hidden id="slider_counter_id" value="{{isset($slider->slider) ? count(json_decode($slider->slider)): 0 }}">

                            </div>

                        </div>


                        <div class="row margin-bottom">
                            <div class="col-md-12 pl-md-1 text-center">
                                <button type="submit" class="btn btn-lg btn-success border-5"></i> @lang('site.save')</button>
                            </div>
                        </div>



                    </form><!-- end of form -->



                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

    <script>
        images_previews('slider_img', 'slider_img_holder', 'slider_img', 'slider_img_style', 'form-control', 'slider', 'slider', 'slider_counter_id');
    </script>

@endsection
