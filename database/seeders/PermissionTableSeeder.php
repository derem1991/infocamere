<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = 
        [
           ['name'=>'role-list','description' =>'Lista dei ruoli'],
           ['name'=>'role-create','description' =>'Creare un ruolo'],
           ['name'=>'role-edit','description' =>'Editare un ruolo'],
           ['name'=>'role-delete','description' =>'Cancellare un ruolo'],
           ['name'=>'permission-list','description' =>'Lista dei permessi'],
           ['name'=>'permission-create','description' =>'Creare un permesso'],
           ['name'=>'permission-edit','description' =>'Cancellare un permesso'],
           ['name'=>'permission-delete','description' =>'Eliminare un permesso'],
           ['name'=>'user-mylist','description' =>'Lista degli utenti del proprio wallet'],
           ['name'=>'user-list','description' =>'Lista di tutti gli utenti e sovrascrive mylist'],
           ['name'=>'user-create','description' =>'Creare un utente'],
           ['name'=>'user-edit','description' =>'Editare un utente'],
           ['name'=>'user-delete','description' =>'Eliminare un utente'],
           ['name'=>'wallet-mylist','description' =>'Wallet a cui sono associato e non puoi modificare tutti gli altri'],
           ['name'=>'wallet-list','description' =>'Lista tutti wallet e sovrascrive mylist'],
           ['name'=>'wallet-create','description' =>'Creare un wallet'],
           ['name'=>'wallet-edit','description' =>'Editare un wallet'],
           ['name'=>'wallet-delete','description' =>'Eliminare un wallet'],
           ['name'=>'document-mylist','description' =>'Lista degli documenti del proprio wallet'],
           ['name'=>'document-list','description' =>'Lista di tutti i documenti'],
           ['name'=>'document-developer','description' =>'Modificare campi tecnici'],
           ['name'=>'document-create','description' =>'Creare un documento'],
           ['name'=>'document-edit','description' =>'Editare un documento'],
           ['name'=>'document-delete','description' =>'Eliminare un documento'],
           ['name'=>'order-mywallet','description' =>'Può vedere tutti gli ordini del proprio wallet'],
           ['name'=>'order-mylist','description' =>'Lista dei propri ordini'],
           ['name'=>'order-list','description' =>'Lista di tutti gli ordini'],
           ['name'=>'order-create','description' =>'Creare un ordine'],
           ['name'=>'order-edit','description' =>'Editare un ordine'],
           ['name'=>'order-row','description' =>'Può vedere tutte le righe di un ordine'],
           ['name'=>'order-delete','description' =>'Eliminare un ordine'],
           ['name'=>'research-mywallet','description' =>'Lista delle ricerche del proprio wallet'],
           ['name'=>'research-mylist','description' =>'Lista delle proprie ricerche'],
           ['name'=>'research-row','description' =>'Può vedere tutte le righe di una ricerca'],
           ['name'=>'research-list','description' =>'Lista di tutte le ricerche'],
           ['name'=>'research-create','description' =>'Creare una ricerca'],
           ['name'=>'research-edit','description' =>'Editare una ricerca'],
           ['name'=>'research-delete','description' =>'Eliminare una ricerca'],
        ];
   
        foreach ($permissions as $permission) 
        {
           Permission::create(['name' => $permission['name'],'description'=>$permission['description']]);
        }
    }
}
