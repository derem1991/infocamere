<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Document extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'documents';
    
    protected $fillable = 
    [
        'id',
        'name',
        'description',
        'active',
        'is_piva',
        'is_cfiscale',        
    ];
 
   
}
