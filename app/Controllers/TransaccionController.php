<?php

namespace App\Controllers;
use App\DAO\TransaccionDAOImpl;
use App\Models;
use App\Models\PagoEfectivo;
use App\Models\PayPal;
use App\Models\TarjetaDeCredito;
class TransaccionController {
    private $transaccion;
    public function __construct($pdo) {
        $this->transaccion = new TransaccionDAOImpl($pdo);
    }
    public function index() {
        require_once __DIR__ . "/../Views/pagos/admin-pagos.html";
        exit();
    }

    public function add_transaccion() {
        $monto = $_POST["monto"];
        $tipo = $_POST["tipo"];
        if(!$this->transaccion->addTransaccion($monto, $tipo)) {
            $error = "Error al hacer la transaccion";
            exit($error);
        }
        header("Location: /");
        exit();
        #en caso de querer trabajar con el id del registro agregado, puedes almacenar el return de el metodo addTransaccion()
    }
    
    public function show_database() {
        $transacciones = $this->transaccion->getTransaccion();
        require_once __DIR__ ."/../Views/pagos/admin-showpagos.php";
        exit();
    }

    public function delete_data() {
        $id = $_POST["id"];
        if ($this->transaccion->deleteTransaccion($id)) {
            header("Location: /");
            exit();
        } else {
            $error = "no se elimino";
            exit($error);
        }
    }

    public function procesar_pago() {
        $id = $_POST["id"];
        $transacciones = $this->transaccion->getTransaccionById( $id );
        if (count($transacciones) == 1) { 
            require_once __DIR__ ."/../Views/pagos/admin-showpagos.php";
            echo "<br>";
            $metodo_transaccion = $transacciones[0]["metodo_transaccion"];
            switch ($metodo_transaccion) {
                case "paypal":
                    new PayPal()->procesarPago();
                    break;
                case "efectivo":
                    echo new PagoEfectivo()->procesarPago();
                    break;
                case "tarjeta":
                    echo new TarjetaDeCredito()->procesarPago();
                    break;
            } exit();
        } else{
            $error = "No existe ninguna transaccion con ese ID o hay mas de 1";
            exit($error);
        }
    }
}
?>