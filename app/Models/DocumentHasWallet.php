<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class DocumentHasWallet extends Model
{
    use HasFactory, Notifiable;
  
    protected $fillable = 
    [
        'id',
        'document_id',
        'wallet_id',
        'active',
        'cost',
        'price',        
    ];   

    public function document()
    {
       return $this->belongsTo(Document::class);
    }
}
