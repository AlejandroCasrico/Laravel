<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
 {

    protected $fillable = [
        'timestamp',
        'src_ip',
        'src_port',
        'dest_ip',
        'dest_port',
        'protocol',
    ];


}