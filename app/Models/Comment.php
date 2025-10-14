<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illmunite\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'content'];
}
