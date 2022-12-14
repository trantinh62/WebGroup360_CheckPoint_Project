<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Checkpoint;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const LEVEL_GROUP_LEADER = 1;
    public const LEVEL_LEADER = 2;
    public const DISABLE = 'disable';



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'age',
        'address',
        'phone',
        'token_reset_password',
        'role_id',
        'status',
        'token_register'
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

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => bcrypt($value)
        );
    }
    public function checkpoints()
    {
        return $this->hasMany(Checkpoint::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function assignReview()
    {
        return $this->hasMany(Review::class, 'review_id', 'id' );
    }
    public function userReview()
    {
        return $this->hasMany(Review::class, 'user_id', 'id' );
    }
}
