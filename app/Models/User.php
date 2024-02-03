<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;




class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    public static function addUser(array $data){
        $u = new User;
        $u->name = $data['fullname'];
        $u->email = $data['email'];
        $u->password = bcrypt($data['password']);
        $u->status = '1';
        $u->vendor_status = '0';
        $u->save();
    }

    public static function updateVendor(array $data){
        $u = User::find(Auth::id());
        $u->name = $data['name'];
        $u->business_name = $data['business_name'];
        $u->phone = $data['phone'];
        $u->address = $data['address'];
        $u->country_id = $data['country_id'];
        $u->city = $data['city'];
        $u->state = $data['state'];
        $u->province = $data['province'];
        $u->website_link = $data['website_link'];
        $u->description = $data['description'];
        $u->save();
    }

    public static function becomeVendor(array $data){
        $u = User::find(Auth::id());
        $u->name = $data['name'];
        $u->business_name = $data['business_name'];
        $u->phone = $data['phone'];
        $u->address = $data['address'];
        $u->website_link = $data['website_link'];
        $u->description = $data['description'];
        $u->vendor_status = '1';
        $u->save();
    }

    public static function updateProfile(array $data){
        $u = User::find(Auth::id());
        $u->name = $data['name'];
        $u->business_name = $data['business_name'];
        $u->phone = $data['phone'];
        $u->address = $data['address'];
        $u->country_id = $data['country_id'];
        $u->city = $data['city'];
        $u->state = $data['state'];
        $u->province = $data['province'];
        $u->website_link = $data['website_link'];
        $u->description = $data['description'];
        $u->save();
    }

    public static function updateProfileImage($filename){
        $u=User::find(Auth::id());
        $u->image = $filename;
        $u->save();
    }

    public static function updateLogo($filename){
        $u = User::find(Auth::id());
        $u->logo = $filename;
        $u->save();
    }








    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded =[];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
