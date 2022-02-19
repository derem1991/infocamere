<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Auth;
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

    public static function getOrderByPermission()
    {
        if(Auth::user()->can('order-list')) // possibilita vedere tutti gli ordini
            $orders = Order::all();
        else if(Auth::user()->can('order-mywallet'))// ordini stesso wallet
            $orders = Order::where('wallet_id',Auth::user()->wallet_id)->get();
        else
            $orders = Order::where('user_id',Auth::user()->id)->get();             
        
        return $orders;
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
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
