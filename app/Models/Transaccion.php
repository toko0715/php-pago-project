<?php

namespace App\Models;
class Transaccion {
    private $id;
    private $monto;
    private $metodo_transaccion;

    public function getId() {
        return $this->id;
    }
    public function getMonto() {
        return $this->monto;
    }
    public function getMetodo_transaccion() {
        return $this->metodo_transaccion;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setMonto($monto) {
        $this->monto = $monto;
    }
    public function setMetodo_transaccion($metodo_transaccion) {
        $this->metodo_transaccion = $metodo_transaccion;
    }
    public function __toString() {
        return "ID: ". $this->id . PHP_EOL . "Monto: ". $this->monto . PHP_EOL ."Metodo: ". $this->metodo_transaccion . PHP_EOL;
    }
}
?>