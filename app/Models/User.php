<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
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
        'password',
    ];

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

    /** function to return the number of records to be fetched  */
    public static function getBirthdaysOfWeek($date)
    {
        $WeekCount  =   User::select(DB::raw('count(id) as count'))
            ->whereDate('dob', '>=', date('Y-m-d', strtotime($date)))
            ->whereDate('dob', '<=', date('Y-m-d', strtotime($date . '+ 6 days')))
            ->first();

        return ($WeekCount->count <= 3) ? 3 : $WeekCount->count;
    }
}
