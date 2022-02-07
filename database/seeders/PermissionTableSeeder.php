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
           ['name'=>'user-delete','description' =>'Eliminare un utente']
        ];
   
        foreach ($permissions as $permission) 
        {
           Permission::create(['name' => $permission['name'],'description'=>$permission['description']]);
        }
    }
}
