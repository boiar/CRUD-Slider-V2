<?php

namespace App\Http\Controllers\Admin_Dashboard;

use App\Helpers\ImgHelper;
use App\Http\Controllers\AdminBaseController;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends AdminBaseController
{

    public function index() {

        $sliders = Slider::getSliders();


        return view('admin_dashboard.slider.index')->with(['sliders' => $sliders]);
    }


    public function getSlider($slider_id = null){

        $data = [];
        // Edit trip
        if (!is_null($slider_id)){
			$slider = Slider::getSliderById($slider_id);
			if (empty($slider)){
				session()->flash('warning', 'الرقم المعرف غير صحيح');
				return back();
			}


			$data['slider'] = $slider;
        }

        // Create new trip
        return view('admin_dashboard.slider.save')->with($data);
    }


    public function saveSlider(Request $request, $slider_id = null) {

        $data['short_name'] = $request->short_name;
        $data['slider']     = ImgHelper::uploadSlider($request->slider);

        if (!is_null($slider_id)){
			/**************  Edit slider Data ***************/
            $data['slider_id'] = $slider_id;
			Slider::updateSliderData($data);
            session()->flash('success', __('site.updated_successfully'));
        }
        else{
            /**************  Create slider Data ***************/
			Slider::createSlider($data);
            session()->flash('success', __('site.created_successfully'));
        }

        return redirect(route('slider.index'));
    }




    public function destroy($id){
        Slider::findOrFail($id)->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return back();
    }


    public function copySliderImgs(Request $request)
    {
        $from_slider = json_decode(Slider::getSliderById($request->from_slider_id)->slider);
        $to_slider   = json_decode(Slider::getSliderById($request->slider_id)->slider);

        $data['slider_id'] = $request->slider_id;
        $data['slider'] = json_encode(array_merge($to_slider, $from_slider));
        Slider::updateSliderData($data);

        session()->flash('success', 'تم نسخ الصور بنجاح');
        return redirect(route('slider.index'));
    }


}
