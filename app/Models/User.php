<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use HasRoles;

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
        'status',
        'role'
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
        'password' => 'hashed',
    ];

    static public function getAdmin()
    {
        return self::select('users.*')
            ->where('role', '=', 2)
            ->orderBy('id', 'DESC')
            ->get();

    }

    static public function getLecturer()
    {
        return self::select('users.*')
            ->where('role', '=', 3)
            ->orderBy('id', 'DESC')
            ->get();

    }

    static public function getStudent()
    {
        return self::select('users.*')
            ->where('role', '=', 4)
            ->orderBy('id', 'DESC')
            ->get();

    }

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    // protected function role(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) =>  ["user", "superadmin", "admin", "lecturer"][$value],
    //     );
    // }
}
