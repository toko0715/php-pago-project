<?php

namespace App\Models;

use App\Abstracts\Pago;
use App\Interfaces\MetodoDePago;
final class PayPal extends Pago implements MetodoDePago {
    private $codigo_autenticacion = null;

    public function __construct() {
        $this->codigo_autenticacion = bin2hex(random_bytes(32));
    }
    public function procesarPago() {
        echo "chin chin hemos procesado su pago con codigo de autenticacion (paypal): " . $this->codigo_autenticacion . ". gracias por usar: Paypal" . PHP_EOL;
    }
}
?>