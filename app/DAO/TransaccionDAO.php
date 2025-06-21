<?php

namespace App\DAO;
use App\Models\Transaccion;
interface TransaccionDAO {
    public function addTransaccion($monto, $metodo_transaccion);
    public function getTransaccion();
    public function deleteTransaccion(int $id);

    public function getTransaccionById(int $id);
}

?>