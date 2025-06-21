<?php

namespace App\Models;

use App\Abstracts\Pago;
use App\Interfaces\MetodoDePago;
final class PagoEfectivo extends Pago implements MetodoDePago {
        public function procesarPago() {
        echo "chin chin hemos procesado su pago, gracias por usar: Pago en Efectivo" . PHP_EOL;
    }
}
?>