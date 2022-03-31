<?php
namespace App\Traits;
use Illuminate\Support\Carbon;

 /**
  *
  */
 trait ParseDatePt
 {
    private function formatDate(Carbon $date)
    {
        return    __(date_format($date,'j')) . ' de ' . __(date_format($date,'F')) . ' de ' . _(date_format($date,'Y'));
    }
 }

