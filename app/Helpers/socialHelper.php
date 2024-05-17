<?php


namespace App\Helpers;


use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;


class socialHelper
{



	public static function socialMediaHandler() {

		$data['social_media'] = Setting::getSettingByKey('social_media','api');

		if(!empty($data['social_media'])){
			$social_media         = [];
			$data['social_media'] = json_decode(collect($data['social_media'])->get('setting_value'), true);

			foreach ($data['social_media'] as $key => $item){
				if ($item['name'] == 'whatsapp' || $item['name'] == 'viber'){
					$func_name = $item['name'] . '_link_handler';
					$item['link'] = self::$func_name($item);
				}
				$social_media[$key] = $item;
			}
			$data['social_media'] = $social_media;
		}
		return $data['social_media'];
	}

	private static function whatsapp_link_handler($social_media_item) {
		$number =  ltrim($social_media_item['link'], "0");
		return "https://wa.me/".$number . "?text=" .trans('user_homepage.whatsapp_first_msg');
	}

	private static function viber_link_handler($social_media) {
		$number =  '%2B'. ltrim($social_media['link'], "0");
		return "viber://chat?number=".$number;
	}

	public static function phoneNumberHandler(){

		$data['app_phone_number'] = Setting::getSettingByKey('phone_number','api');

		if (!empty($data['app_phone_number'])){

			$data['app_phone_number'] = collect($data['app_phone_number'])->toArray();
			$data['app_phone_number'] = '+20 ' . $data['app_phone_number']['setting_value'];
		}

		return $data['app_phone_number'];

	}

}
