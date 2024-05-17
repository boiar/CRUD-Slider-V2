<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;


class Setting extends Model
{
    use HasFactory;
    use AbstractionModelTrait;

    protected $table = "settings";
    protected $primaryKey = "setting_id";
    protected $fillable =
    [
        'setting_name',
        'setting_key',
        'setting_value'
    ];

    public static function getSettingByKey($key, $apiOrWeb)
    {
        // $apiOrWeb => api || web

        $setting = self::query()
            ->select(
                'setting_id',
                'setting_value'
            )
            ->where('setting_key','=', $key);

            if($apiOrWeb == 'api'){
                $setting = $setting->addSelect(self::getValueWithSpecificLang('setting_name', app()->getLocale(),'setting_name'));
            }
            else{
                $setting = $setting->addSelect('setting_name');
            }

            return $setting->first();
    }



    public static function saveSettingByKey($data) {

		$socialMedia        = self::getSettingByKey($data['setting_key'], 'api');
		$data['updated_at'] = now();


		if (empty($socialMedia)){
			$data['created_at'] = now();
			self::create($data);
		}
		else{
			self::where('setting_key', '=', $data['setting_key'])->update($data);
		}

    }



	public static function destroySettingByKey($settingKey) {
		self::where('setting_key', '=', $settingKey)->delete();
	}



}
