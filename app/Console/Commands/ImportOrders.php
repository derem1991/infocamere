<?php

namespace App\Console\Commands;
use Log;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Config;
use Carbon\Carbon;
use Mail;
use App\Models\InfoCamere;
class ImportOrders extends Command
{
 
  protected $signature = 'orders:import {option} ';
 
  protected $description = 'Esegue import degli ordini e dei dati di ogni singolo ordine
                            Tipo Ordini
                            1) Importa file relativi agli ordini e aggiornamento
                            ';
 
  public function __construct()
  {
    parent::__construct();
  }
 
  public function handle()
  {
    $opt = $this->argument('option');
    switch($opt)
    {
	    case '1':
        $this->runHandle(1);
        break;
      default:
        break;
    }
    $this->info("Importazione completata");
  }

  public function runHandle($id)
  {
    switch($id)
    {
      case '1':
       $models = new InfoCamere();
       $models->initOrders();
      break;
      default:
      break;
    }
  }
}


