<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'checkpoint_id',
        'user_id',
        'review_id',
        'attitude',
        'performance',
        'teamwork',
        'training',
        'adhere',
        'strength',
        'weakness',
    ];

    public function nameCheckpoint()
    {
        return $this->belongsTo(Checkpoint::class, 'checkpoint_id', 'id');
    }
    public function demo()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function userInfo()
    {
        return $this->belongsTo(User::class, 'user_id', 'id' );
    }
    public function reviewInfo()
    {
        return $this->belongsTo(User::class, 'review_id', 'id' );
    }

}
