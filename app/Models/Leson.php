<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leson extends Model
{
    protected $fillable = [
        "leson"
    ];

    public function applications() {
        return $this->hasMany(Application::class);
    }
}
