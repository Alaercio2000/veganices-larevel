<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'slug'
    ];

    public function tagsCommunityPost(){
        return $this->hasMany(TagCommunityPost::class , 'tags_id' , 'id');
    }

}
