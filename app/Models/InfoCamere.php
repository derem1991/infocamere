<?php

namespace App\Models;

use App\Http\Traits\InfoCamereTrait;
use Illuminate\Database\Eloquent\Model;
use DB;

class InfoCamere extends Model
{
  use InfoCamereTrait;

  public function initOrders() 
  {
    return $this->getOrders();
  }

}

