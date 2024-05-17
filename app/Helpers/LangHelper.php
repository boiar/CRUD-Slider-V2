<?php


namespace App\Helpers;


use Illuminate\Support\Facades\File;

class LangHelper
{

    public static function getDefaultOrSpecificLang($attrs = null){


        if (isset($attrs['lang']) && $attrs['lang'] != ''){

            $lang = $attrs['lang'];
        }
        else {
            $lang = app()->getLocale();
        }


        return $lang;
    }



}
