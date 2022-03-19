<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Auth;
class Research extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'researchs';
    
    protected $fillable = 
    [
        'id',
        'input',
        'user_id',
        'wallet_id',
        'xml',    
        'cost',
        'price',   
    
    ];
    
    public static function getResearchByPermission()
    {
        if(Auth::user()->can('research-list')) // possibilita vedere tutti le ricerche
            $researchs = Research::all();
        else if(Auth::user()->can('research-mywallet'))// ricerche stesso wallet
            $researchs = Research::where('wallet_id',Auth::user()->wallet_id)->get();
        else
            $researchs = Research::where('user_id',Auth::user()->id)->get();             
        
        return $researchs;
    }
    
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
