<?php

namespace App\Abstracts;
abstract class Pago {
    protected $monto;

    public function almacenarMontoPago($monto) {
       $this->monto = $monto;
    }
}
?>


