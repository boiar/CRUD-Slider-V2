<?php

namespace App\Models;

use App\Helpers\ImgHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;


class Slider extends Model
{
    use HasFactory;
    use AbstractionModelTrait;

    protected $table = "slider";
    protected $primaryKey = "slider_id";
    protected $guarded = ['slider_id',];
    protected $fillable = [
        'short_name', 'slider'
    ];







    public static function getSliders($id = null) {

        $slider = self::query()
            ->select(
                'slider_id',
                'slider',
                'short_name'
            );

            if (is_null($id)){
                $slider = $slider->get();
            } else {
                $slider = $slider->first();
                $slider->slider = ImgHelper::returnSliderLinks($slider['slider']);
            }

        return $slider;
    }



    public static function getSliderById($id) {
        return  self::where('slider_id', $id)->first();
    }


	public static function updateSliderData($data) {
		return self::where('slider_id', '=', $data['slider_id'])->update($data);
	}

	public static function createSlider($data){
		$data['created_at'] = now();
		$data['updated_at'] = now();
		return self::create($data);

	}

}
