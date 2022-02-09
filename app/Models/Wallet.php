<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Auth;
class Wallet extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'wallets';

    protected $fillable = [
        'id',
        'name',
        'description',
        'budget',
        'budget_remaining'
    ];
 
  
}
