<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;
use App\Models\Wallet;
use App\Models\DocumentHasWallet;
 
class CreateDocumentSeeder extends Seeder
{ 
    public function run()
    {
      
        $wallet = Wallet::first();
        $cost = 1; //Costo 
        $price = 2; //prezzo di vendita 
        if(!empty($wallet)) 
        {
          $documents = [
                    [
                        'name'        =>'visura ordinaria impresa',
                        'description' => 'Si ottiene la visura ordinaria - l\'input puo essere solo CF o PIVA di 11 0 16 caratteri',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => 'getVisOrd'
                    ],
                    [
                        'name'        =>'visura storica impresa',
                        'description' => 'Si ottiene la visura storica - l\'input puo essere solo CF o PIVA di 11 0 16 caratteri',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => 'getVisSto'
                    ]
          ];
          foreach($documents as $document)
          {
            $insert = Document::create($document);
            if(!empty($insert))
            {
                $arr['document_id'] = $insert->id;
                $arr['wallet_id']   = $wallet->id;
                $arr['active']      = 1;
                $arr['cost']        = $cost;
                $arr['price']       = $price;
                DocumentHasWallet::create($arr);
            }
          }
        }
        return;
        
    }
}
 