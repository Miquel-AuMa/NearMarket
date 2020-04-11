<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public static function registerUserWithShop(array $data)
    {
        $shop = null;
        if ($data['user']['is_shop']) {
            $shop = Shop::makeOne($data['shop']);
        }

        return self::makeOne($data['user'], $shop);
    }

    public static function makeOne(array $data, ?Shop $shop)
    {
        $user = new User();

        if ($shop) {
            $user->shop()->associate($shop);
        }

        $user->phone_number = $data['phone_number'];
        $user->password = bcrypt($data['password']);
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->type = $data['is_shop'] ? 'shop' : 'user';
        $user->address_line_1 = $data['address_line_1'];
        $user->city = $data['city'];
        $user->zip = $data['zip'];

        $user->save();

        $user->load('shop');

        return $user;
    }

    public function updateMe(array $data)
    {
        $this->phone_number = $data['phone_number'] ?? $this->phone_number;
        $this->password = isset($data['password'])
            ? bcrypt($data['password'])
            : $this->password;
        $this->name = $data['name'] ?? $this->name;
        $this->surname = $data['surname'] ?? $this->surname;
        $this->address_line_1 = $data['address_line_1'] ?? $this->address_line_1;
        $this->city = $data['city'] ?? $this->city;
        $this->zip = $data['zip'] ?? $this->zip;

        $this->save();

        $this->load('shop');

        return $this;
    }
}
