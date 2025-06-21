<?php

#DELETE FROM transacciones where id = ?
namespace App\DAO;
use App\DAO\TransaccionDAO;
use App\Models\Transaccion;
use PDO;
class TransaccionDAOImpl implements TransaccionDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function addTransaccion($monto, $metodo_transaccion){
        $sql = "INSERT INTO Transacciones (monto, metodo_transaccion) VALUES (? , ?)";
        $stmt = $this->pdo->prepare($sql);
        $validate = $stmt->execute([$monto, $metodo_transaccion]);

        if($validate){
            $lastid = $this->pdo->lastInsertId();
            return $lastid;
        }
        return false;
    }

    public function getTransaccion(){
        $sql = "SELECT * FROM Transacciones";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTransaccionById($id){
        $sql = "SELECT * FROM Transacciones WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll((PDO::FETCH_ASSOC));
    }

    public function deleteTransaccion($id) {
        $sql = "DELETE FROM transacciones WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $validate = $stmt->execute([$id]);
        if ($validate) {
            return true;
        } else {
            return false;
        }
    }
}


?>