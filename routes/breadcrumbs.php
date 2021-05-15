<?php

// Documenti
Breadcrumbs::for('documents', function ($trail) 
{
    $trail->push('Home', route('home'));
    $trail->push('Documenti', route('documents.index'));
});

// Ruoli
Breadcrumbs::for('roles', function ($trail) 
{
    $trail->push('Home', route('home'));
    $trail->push('Ruoli', route('roles.index'));
    if(last(request()->segments()) == 'create')
     $trail->push('Creazione Ruolo',null);//ultimo ramo
    if(last(request()->segments()) == 'edit')
     $trail->push('Modifica Ruolo',null);//ultimo ramo
});

// Users
Breadcrumbs::for('users', function ($trail) 
{
    $trail->push('Home', route('home'));
    $trail->push('Utenti', route('users.index'));
    if(last(request()->segments()) == 'create')
     $trail->push('Creazione Utente',null);//ultimo ramo
    if(last(request()->segments()) == 'edit')
     $trail->push('Modifica Utente',null);//ultimo ramo
});

// Permessi
Breadcrumbs::for('permissions', function ($trail) 
{
    $trail->push('Home', route('home'));
    $trail->push('Permessi', route('permissions.index'));
    if(last(request()->segments()) == 'create')
     $trail->push('Creazione Permesso',null);//ultimo ramo
    if(last(request()->segments()) == 'edit')
     $trail->push('Modifica Permesso',null);//ultimo ramo
});