<?php


namespace App\Helpers;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ImgHelper
{

    public static function uploadImage($folder, $image) {
		Storage::disk($folder)->put('/',  $image);
		return  'uploads/' . $image->hashName();
    }


    public static function deleteImage($oldImg){
       try{
           File::delete(public_path($oldImg));

       }catch (\Exception $exception){

       }
    }


    public static function returnImageLink($obj){

        $path = $obj;
        if(is_object(json_decode($obj))){
            $obj  = json_decode($obj);

            if(isset($obj->path)){
                $path = $obj->path;
            }
        }
        if(File::exists($path)){
            return url($path);
        }
        return url("/images/default_ad_img.jpg");
    }


    public static function returnSliderLinks($links) {


        if (empty($links)){
            return "";
        }


        $returnLinks = [];
        $links = json_decode($links);

        foreach ($links as $link){
            $link = json_encode($link);
            $returnLinks[] = self::returnImageLink($link);
        }

        return $returnLinks;
    }


    public static function getImgPathFromUrl($link)
    {
        $path  = parse_url($link);
        $path = ltrim($path['path'],'/');
        return $path;
    }


    public static function getSliderPathFromUrl($links)
    {
        $data = [];
        foreach ($links as $link){
            $data[] = self::getImgPathFromUrl($link);
        }

        return $data;
    }


    public static function returnViedoLink($obj){


        if(is_object(json_decode($obj))){

            $obj  = json_decode($obj);
            if(isset($obj->path)){
                return $obj->path;
            }
        }

        return "";
    }


	public static function uploadSlider($data) {


		/**************  delete old slider images ***************/
		if(isset($data['deleted_urls'])){
			$deleted_urls = $data['deleted_urls'];
			for($i  = 0; $i < count($deleted_urls); $i++){


				if(isset($deleted_urls[$i]) && File::exists((public_path($deleted_urls[$i])))){

					self::deleteImage($deleted_urls[$i]);

				}
			}
			unset($data['deleted_urls']);
		}


		$old_urls   = isset($data['path']['old']) ?  $data['path']['old'] : array();
		$new_urls   = isset($data['path']['new']) ?  $data['path']['new'] : array();
		$all_urls   = array_merge($old_urls, $new_urls);


		if(!empty($all_urls)){
			$all_titles  = isset($data['title'])? array_merge($data['title']) : '';
			$all_alts    = isset($data['alt'])? array_merge($data['alt']) : '';
			$slider_data = array();


			for($i = 0; $i < count($all_urls); $i++){

				$slider_data[$i]['alt']     = $all_alts[$i];
				$slider_data[$i]['title']   = $all_titles[$i];

				if(is_file($all_urls[$i]) && !is_string($all_urls[$i])){
					Storage::disk('images')->put('/',  $all_urls[$i]);
					$slider_data[$i]['path'] =  'uploads/' . $all_urls[$i]->hashName();
				}
				else {
					$slider_data[$i]['path']  = $all_urls[$i];
				}
			}



			$data['slider'] = json_encode($slider_data);
		}
		else{
			$data['slider'] = null;
		}

		return $data['slider'];
	}


}
