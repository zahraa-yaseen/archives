<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'email_verified_at',
        'current_team_id',
        'profile_photo_path',
         'user_types_id',
        'depart_id',
        'division_id',

      ];
      public function depart(){
        return $this ->belongsTo('App\Depart' ,'depart_id');
    }
    public function division(){
        return $this ->belongsTo('App\Division' ,'division_id');
    }
    
    public function user_type(){
        return $this ->belongsTo('App\User_Type' ,'user_types_id');
    }
      public function setPasswordAttribute($value)
{
   $this->attributes['password'] = bcrypt($value);
}
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
