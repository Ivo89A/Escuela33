<?php
class Calificacion {
    public $idcalificaciones;
    public $idalumno;
    public $idmateria;
    public $nota1;

    public function __construct( $idalumno, $idmateria, $nota1) {
        $this->idalumno = $idalumno;
        $this->idmateria = $idmateria;
        $this->nota1 = $nota1;

    }

    private function conectar() {
        $mysql = new mysqli("localhost", "root", "", "bdescuela");
        if ($mysql->connect_error) {
            die('Problema con la conexión a la base de datos: ' . $mysql->connect_error);
        }
        return $mysql;
    }


  public function guardar()
{
    $mysql = new mysqli("localhost", "root", "", "bdescuela");
    
    if ($mysql->connect_error) {
        die('Problema con la conexión a la base de datos.');
    }
    
    $stmt = $mysql->prepare("INSERT INTO calificaciones (idalumno, idmateria, nota1) VALUES (?, ?, ?)");
    if (!$stmt) {
        die('Problema con la preparación de la consulta: ' . $mysql->error);
    }

    $stmt->bind_param("iii", $_REQUEST['apellido'], $_REQUEST['materias'], $_REQUEST['nota1']);
    
    if (!$stmt->execute()) {
        die('Problema con la ejecución de la consulta: ' . $stmt->error);
    }

    $stmt->close();
    $mysql->close();
}


    public function listar() {
        $mysql = $this->conectar();
        $cadena = "SELECT idcalificacion, idalumno, idmateria, nota1 FROM calificaciones ORDER BY idalumno";
        $registros = $mysql->query($cadena);
        if ($registros === false) {
            die($mysql->error);
        }

        echo "<table class='table table-striped' style='background-color:white;'>";
        echo "<thead>";
        echo "<tr><th>ID Alumno</th><th>Materia</th><th>Nota 1</th><th>Nota 2</th><th>Promedio</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($reg = $registros->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$reg['idalumno']}</td>";
            echo "<td>{$reg['idmateria']}</td>";
            echo "<td>{$reg['nota1']}</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        $mysql->close();
    }

    public function mostrar_alumno($id) {
        $mysql = $this->conectar();
        $cadena = "SELECT idcalificaciones, idalumno, idmateria, nota1 FROM calificaciones WHERE idcalificaciones = ?";
        $stmt = $mysql->prepare($cadena);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($reg = $resultado->fetch_assoc()) {
            echo "ID Calificaciones: {$reg['idcalificaciones']}<br>";
            echo "<strong>ID Alumno:</strong> {$reg['idalumno']}<br>";
            echo "<strong>ID Materia:</strong> {$reg['idmateria']}<br>";
            echo "<strong>Nota 1:</strong> {$reg['nota1']}<br>";
            echo "<hr>";
        } else {
            echo "No se encuentra el registro";
        }
        $stmt->close();
        $mysql->close();
    }

    public function eliminar($id) {
        $mysql = $this->conectar();
        $cadena = "DELETE FROM calificaciones WHERE idcalificaciones = ?";
        $stmt = $mysql->prepare($cadena);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if ($stmt->error) {
            die('Error al eliminar: ' . $stmt->error);
        } else {
            echo "Se eliminó el registro";
        }
        $stmt->close();
        $mysql->close();
    }



}
?>
