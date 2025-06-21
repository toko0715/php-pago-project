<?php
require_once "./../vendor/autoload.php";
use App\Controllers\TransaccionController;
$pdo = require_once "./../config/DBconn.php";
$transaccion = new TransaccionController($pdo);
$action = $_POST["action"] ?? 'admin';
switch ($action) {
    case 'admin':
        $transaccion->index();
        break;
    case 'add-transaccion':
        $transaccion->add_transaccion();
        break;
    case 'show-database':
        $transaccion->show_database();
        break;
    case 'delete-data':
        $transaccion->delete_data();
        break;
    case 'procesar-pago':
        $transaccion->procesar_pago();
    default:
        $transaccion->index();
        break;
}

?>






























<br><br><br>
if (isset($_POST["procesar-pago"])) {
    $dao_t = new TransaccionDAOImpl();
    $transaccion = $dao_t->getTransaccionById($_POST["id"]);
    if ($transaccion->getMetodo_transaccion() == "paypal") {
        $metodo = new PayPal($transaccion->getMonto(), "codigo generado automaticamente");
        $metodo->procesarPago();
    } elseif ($transaccion->getMetodo_transaccion() == "efectivo") {
        $metodo = new PagoEfectivo($transaccion->getMonto());
        $metodo->procesarPago();
    
    } elseif ($transaccion->getMetodo_transaccion() == "tarjeta") {
        $metodo = new TarjetaDeCredito($transaccion->getMonto());
        $metodo->procesarPago();
    }
}
?>