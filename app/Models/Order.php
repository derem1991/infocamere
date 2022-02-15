<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'orders';
    
    protected $fillable = 
    [
        'id',
        'input',
        'user_id',
        'document_id',
        'wallet_id',
        'status_id',    
        'cost',
        'price',   
        'file_output'     
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
