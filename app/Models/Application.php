<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'leson_id',
        // 'course_name',
        'start_date',
        'payment_method',
        'status',
        'review',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leson() {
        return $this->belongsTo(Leson::class);
    }
}
