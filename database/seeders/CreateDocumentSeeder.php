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
                    ],
                    [
                        'name'        =>'Capitale e strumenti finanziari (blocco CAP)',
                        'description' => 'Si ottengono il Capitale e strumenti finanziari di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('CAP')"
                    ],
                    [
                        'name'        =>'Informazioni patrimoniali (blocco IPA)',
                        'description' => 'Si ottengono Informazioni patrimoniali di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('IPA')"
                    ],
                    [
                        'name'        =>'Amministratori (blocco AMM)',
                        'description' => 'Si ottengono gli Amministratori di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('AMM')"
                    ],
                    [
                        'name'        =>'Sindaci, membri organi di controllo (blocco SIN)',
                        'description' => 'Si ottengono Sindaci, membri organi di controllo di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('SIN')"
                    ],
                    [
                        'name'        => 'Titolari di altre cariche o qualifiche (blocco APE)',
                        'description' => 'Si ottengono Titolari di altre cariche o qualifiche di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('APE')"
                    ],
                    [
                        'name'        => 'Soci e titolari di diritti su quote o azioni (blocco SOC)',
                        'description' => 'Si ottengono Soci e titolari di diritti su quote o azioni di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('SOC')"
                    ],
                    [
                        'name'        => 'Trasferimenti d\'azienda, fusioni, scissioni, subentri (blocco TFS)',
                        'description' => 'Si ottengono Trasferimenti d\'azienda, fusioni, scissioni, subentri di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('TFS')"
                    ],
                    [
                        'name'        => 'Attività, albi, ruoli e licenze (blocco ALB)',
                        'description' => 'Si ottengono Attività, albi, ruoli e licenze di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('ALB')"
                    ],
                    [
                        'name'        => 'Società o enti controllanti (blocco CON)',
                        'description' => 'Si ottengono Società o enti controllanti di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('CON')"
                    ],
                    [
                        'name'        => 'Pratiche in istruttoria (blocco PRA)',
                        'description' => 'Si ottengono Pratiche in istruttoria di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('PRA')"
                    ],
                    [
                        'name'        => 'Storia dei trasferimenti di quote - solo per SRL (blocco QUO)',
                        'description' => 'Si ottengono Storia dei trasferimenti di quote - solo per SRL di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('QUO')"
                    ],
                    [
                        'name'        => 'informazioni da patti sociali (blocco PAT)',
                        'description' => 'Si ottengono informazioni da patti sociali di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('PAT')"
                    ],
                    [
                        'name'        => 'informazioni da statuto (blocco STA)',
                        'description' => 'Si ottengono informazioni da statuto di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('STA')"
                    ],
                    [
                        'name'        => 'storia delle modifiche (blocco STO)',
                        'description' => 'Si ottengono storia delle modifiche di un\'impresa',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getBlock('STO')"
                    ],
                    [
                        'name'        =>'Partecipazione attuale (PAR) ',
                        'description' => 'Si ottiene la partecipazione attuale - l\'input puo essere solo CF o PIVA di 11 0 16 caratteri',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => 'getPasAtt'
                    ],
                    [
                        'name'        =>'Partecipazione storica (PAS) ',
                        'description' => 'Si ottiene la Partecipazione storica - l\'input puo essere solo CF o PIVA di 11 0 16 caratteri',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => 'getPasSto'
                    ],
                    [
                        'name'        =>'Anagrafica sedi',
                        'description' => 'Si puo richiedere l\'anagrafica delle sedi dell\'azienda - l\'input puo essere solo CF o PIVA di 11 0 16 caratteri',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => 'getSedi'
                    ],
                    [
                        'name'        =>'Cariche attuali',
                        'description' => 'Si posson avere le cariche attuali - l\'input puo essere solo CF o PIVA di 11 0 16 caratteri',
                        'active'      => 1,
                        'is_piva'     => 1,
                        'is_cfiscale' => 1,
                        'wallet_id'   => $wallet->id,
                        'method'      => "getCariche('A')"
                    ],
                    [
                      'name'        =>'Cariche cessate',
                      'description' => 'Si posson avere le cariche cessate - l\'input puo essere solo CF o PIVA di 11 0 16 caratteri',
                      'active'      => 1,
                      'is_piva'     => 1,
                      'is_cfiscale' => 1,
                      'wallet_id'   => $wallet->id,
                      'method'      => "getCariche('C')"
                    ],
                    [
                      'name'        =>'Cariche attuali e cessate',
                      'description' => 'Si posson avere le cariche cessate - l\'input puo essere solo CF o PIVA di 11 0 16 caratteri',
                      'active'      => 1,
                      'is_piva'     => 1,
                      'is_cfiscale' => 1,
                      'wallet_id'   => $wallet->id,
                      'method'      => "getCariche('AC')"
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
 