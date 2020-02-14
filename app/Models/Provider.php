<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Provider extends Model
{
    use Notifiable , SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'cnpj' , 'avatar','phone' , 'user_id' , 'date_opening'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
