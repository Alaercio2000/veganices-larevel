<?php

namespace App\Models;
use App\User;
use SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'slug'
    ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
