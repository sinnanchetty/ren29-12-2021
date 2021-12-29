<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{

	//notifications post table used
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'post_id',
        'updated_at',
        'lastnotified_dt',
        'notify'

    ];
}

