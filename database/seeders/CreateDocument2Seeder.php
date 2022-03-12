<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;
use App\Models\Wallet;
use App\Models\DocumentHasWallet;
 
class CreateDocument2Seeder extends Seeder
{ 
    public function run()
    {
      
        $wallet = Wallet::first();
        $cost = 1; //Costo 
        $price = 2; //prezzo di vendita 
        if(!empty($wallet)) 
        {
          $documents = [
                   /* [
                        'name'        =>'Fallimenti e procedure concorsuali (XML)',
                        'description' => 'Restituisce il blocco PCO - Scioglimento, Procedure Concorsuali e Cancellazione - per le imprese presenti nel R.I. indipendentemente dalla classe di natura giuridica. L\'informazione non è disponibile per le posizioni di fonte Registro Ditte- l\'input puo essere solo CF o PIVA di 11 0 16 caratteri',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => 'GetProcedure'
                    ], */
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
 