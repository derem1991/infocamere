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
           ['name'=>'user-list','description' =>'Lista di tutti gli utenti'],
           ['name'=>'user-create','description' =>'Creare un utente'],
           ['name'=>'user-edit','description' =>'Editare un utente'],
           ['name'=>'user-delete','description' =>'Eliminare un utente'],
           ['name'=>'wallet-list','description' =>'Lista tutti wallet'],
           ['name'=>'wallet-create','description' =>'Creare un wallet'],
           ['name'=>'wallet-edit','description' =>'Editare un wallet'],
           ['name'=>'wallet-delete','description' =>'Eliminare un wallet'],
           ['name'=>'document-mylist','description' =>'Lista degli documenti del proprio wallet'],
           ['name'=>'document-list','description' =>'Lista di tutti i documenti'],
           ['name'=>'document-developer','description' =>'Modificare campi tecnici'],
           ['name'=>'document-create','description' =>'Creare un documento'],
           ['name'=>'document-edit','description' =>'Editare un documento'],
           ['name'=>'document-delete','description' =>'Eliminare un documento'],
        ];
   
        foreach ($permissions as $permission) 
        {
           Permission::create(['name' => $permission['name'],'description'=>$permission['description']]);
        }
    }
}
