<?php


namespace App\Helpers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LocaleHelper
{

    public static function getLocale(){


        $locale = $request->segment(1);

        $languages = config('app.available_locales');

        if (empty($locale) && in_array($locale, $languages)){
            $locale = app()->getLocale();
        }

        return $locale;


    }

}
