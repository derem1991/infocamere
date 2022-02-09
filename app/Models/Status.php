<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Status extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'statuses';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'color',
        'background'
    ];
  
} 