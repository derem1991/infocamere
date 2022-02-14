<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Auth;

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
        'wallet_id',
        'is_piva',
        'is_cfiscale',        
    ];
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public static function getDispoByUser($id = null) //prendere i documenti disponibili in base alla disponibilità del cliente
    {
      $user = !empty($id) ? User::find($id) : Auth::user();
      $wallet = Wallet::Find($user->wallet_id);
      return Document::select('documents.*','dhw.price','dhw.cost')
                    ->join('document_has_wallets as dhw','dhw.document_id','documents.id')
                    ->where('documents.active',1)
                    ->where('dhw.active',1)
                    ->where('dhw.wallet_id',$wallet->id)
                    ->where('dhw.cost','<=',$wallet->budget_remaining)
                    ->where('dhw.price','<=',$user->budget)
                    ->get();
    }
   
}
