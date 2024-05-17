@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.slider')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.homepage') }}"><i class="fa fa-dashboard"></i> @lang('site.admin_dashboard')</a></li>
                <li class="active">@lang('site.slider')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px; color: #605ca8">@lang('site.slider')</h3>

                    <div class="row">
                        <div class="col-md-4">

                            <a href="{{ route('slider.get_slider') }}" class="btn btn-success"><i class="fa fa-plus"></i> @lang('site.add')</a>

                        </div>
                    </div>

                </div><!-- end of box header -->

                <div class="table-responsive">


                    @if ( count($sliders) > 0)

                        <table class="table table_with_buttons_without_paging table-hover">

                            <thead class="bg-black">
                            <tr>
                                <th style='text-align: center; font-size: 18px; font-weight: bold' >#</th>
                                <th style='text-align: center; font-size: 18px; font-weight: bold' >@lang('site.slider_short_name')</th>
                                <th style="text-align: center; font-size: 18px; font-weight: bold">@lang('site.action')</th>
                            </tr>
                            </thead>

                            <tbody>

                                @foreach ($sliders as $index => $slider)
                                    <tr>
                                        <td style='text-align: center; font-size: 18px; font-weight: bold' >{{ $index + 1 }}</td>
                                        <td style='text-align: center; font-size: 18px; font-weight: bold' >{{ $slider->short_name }}</td>
                                        <td style='text-align: center; font-size: 18px; font-weight: bold'>
                                            <a style="font-weight: bold; font-size: 16px" href="{{ route('slider.get_slider', $slider->slider_id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            <form action="{{ route('slider.destroy', $slider->slider_id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button style="font-weight: bold; font-size: 16px" type="submit" class="btn bg-purple delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="copy_slider_imges({{$slider->slider_id}})">
                                                <i class="fa fa-image"></i>
                                                نسخ صور الالبوم
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table><!-- end of table -->

                   {{-- <div class="align-content-center">
                        {!! $sliders->links("pagination::bootstrap-4") !!}
                        {{ $sliders->appends(request()->query())->links() }}
                    </div>--}}


                    @else
                        <h2>@lang('site.no_data_found')</h2>
                    @endif

                </div><!-- end of box body -->
            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">نسخ الصور الي البوم اخر</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <form method="post" action="{{ route('slider.copy_slider') }}" id="slider_copy_form">
                        @csrf

                        <input type="hidden" name="from_slider_id" id="from_slider_id">

                        <div class="form-group">
                            <label for="exampleInputMessage">اختر اسم البوم</label>
                            <select class="form-control" name="slider_id" id="exampleSelect">
                                <option value="0" disabled>اختر</option>
                                @foreach($sliders as $slider)
                                    <option value="{{ $slider->slider_id }}">{{ $slider->short_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">نسخ</button>
                    </form>
                </div>



            </div>
        </div>
    </div>

    <script>

        function copy_slider_imges(slider_id) {
            var element = document.getElementById('from_slider_id');

            element.value = slider_id;
        }

    </script>





@endsection

