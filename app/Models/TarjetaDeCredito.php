<?php 

namespace App\Models;

use App\Abstracts\Pago;
use App\Interfaces\MetodoDePago;
final class TarjetaDeCredito extends Pago implements MetodoDePago {
    public function procesarPago() {
        echo "chin chin hemos procesado su pago, gracias por usar: Tarjeta de Credito" . PHP_EOL;
    }
}

?>