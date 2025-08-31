<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Oportunidades extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject', 
        'message',
        'link_path'
    ];
}
