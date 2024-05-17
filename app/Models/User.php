<?php

namespace App\Models;

use App\Helpers\ImgHelper;
use App\Helpers\ResponsesHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey='user_id';


    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_type', 'user_name', 'user_email', 'password', 'country', 'nationality'
    ];






    public static function createUser($data, $type, $image = null, $user_date_of_birth = null, $user_address=null) {
		$data = [];
        $userData = self::create($data);
        return $userData;
    }

    public static function updateUserProfile($data, $image = null) {
        if (is_null($image)){
            return self::where('user_id', '=', $data->user_id)
                ->update(array(
                    'user_name'    => $data->user_name,
                    'user_email'   => $data->user_email,
                    'user_address' => $data->user_address,
                ));
        }
        else {

            return self::where('user_id', '=', $data->user_id)
                ->update(array(
                    'user_name'    => $data->user_name,
                    'user_email'   => $data->user_email,
                    'user_address' => $data->user_address,
                    'user_img'     => $image,
                ));
        }
    }


    public static function getUsersByType($type, $attrs =[]) {
        // $type => user || admin

        $users = self::query()
                ->select(
                    'users.user_id',
                    'users.user_name',
                    'users.user_email'
                )->where('user_type', $type);



        if(isset($attrs['date_from']) && $attrs['date_from'] != ''){
            $attrs['date_from'] = date('Y-m-d H:i:s', strtotime($attrs['date_from']));
            $users = $users->where('users.created_at','>=', $attrs['date_from']);
        }

        if(isset($attrs['date_to']) && $attrs['date_to'] != ''){

            $attrs['date_to'] = date('Y-m-d H:i:s', strtotime('+23 hour +59 minutes +59 seconds',strtotime($attrs['date_to'])));
            $users = $users->where('users.created_at','<=', $attrs['date_to']);
        }

        if(isset($attrs['paginate']) && $attrs['paginate'] != ''){
            $users = $users->paginate($attrs['paginate']);
        }
        else{
            $users = $users->get();
        }


        return $users;
    }

    public static function updateActivationStatus($userId, $status){
        //$status => 0 || 1
        self::where('user_id', '=', $userId)
            ->update(array(
                'user_is_active' => $status,
                'updated_at'     => now()
            ));

    }


    public static function getUserById($userId){
		return self::where('user_id', $userId)->first();
    }

    public static function saveAdminData($data)
    {
		$data['updated_at'] = now();
        if (!isset($data['user_id'])){
            $data['created_at'] = now();
            return self::create($data);
        }
        else{
            return self::where('user_id', '=', $data['user_id'])->update($data);
        }

    }

    public static function getUserByEmailAndPassword($data){
        return self::query()
            ->select('*')
            ->where('user_email','=',$data['email'])
            ->where('password','=',bcrypt($data['password']))->first();
    }




}
