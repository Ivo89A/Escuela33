<?php
class alumno{
    public $idalumno;
    public $apellido;
    public $nombre;
    public $sexo;
    public $fecha_nacimiento;

    public function __construct($ape,$nom,$sexo,$fec)
    {
        $this->apellido=$ape;
        $this->nombre=$nom;
        $this->sexo=$sexo;
        $this->fecha_nacimiento=$fec;
    }

    public function guardar()
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        if ($mysql->connect_error)
        die('Problema con la conexion a la base de datos.');

        $cadena='insert into alumnos(idalumno,apellido,nombre,sexo,fecha_nacimiento) values (null, "'.$this->apellido.'","'.$this->nombre.'","'.$this->sexo.'","'.$this->fecha_nacimiento.'")';
        
        $mysql->query($cadena) or die($mysql->error);
        $mysql->close();
    }

    public function listar()
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        $cadena="select idalumno,apellido, nombre, sexo, fecha_nacimiento from alumnos order by apellido";
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "<table class='table table-striped --bs-light' style='background-color:white';>";            
        echo "<tr>";
        echo "<thead>";
        echo "<th>Apellido</th>";
        echo "<th>Nombre</th>";
        echo "<th>Sexo</th>";
        echo "<th>Fecha de nacimiento</th>";
        echo "<th>Eliminar Alumno</th>";
        echo "<th>Notas</th>";
        echo "<th>Calificaciones</th>";
        echo "</tr>";
        echo "</thead>";
        while($reg=$registros->fetch_array()){

            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$reg['apellido']."</td>";
            echo "<td>".$reg['nombre']."</td>";
            echo "<td>".$reg['sexo']."</td>";
            echo "<td>".$reg['fecha_nacimiento']."</td>";
            echo '<td><a class="btn btn-danger" href="../eliminar/eliminar_alumno.php?id='.$reg["idalumno"].'">Eliminar</td>';
            echo '<td><a class="btn btn-info" href="../listados/lista_nota.php?id='.$reg["idalumno"].'&alumno='.$reg['apellido'].'">NOTAS</td>';
            echo '<td><a class="btn btn-warning" href="../registrar_calificacion.php?id='.$reg["idalumno"].'&alumno='.$reg['apellido'].'">CALIFICACION</td>';
            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
        $mysql->close();
    }
    
    /*============================
    OBTENER UN ALUMNO
    ============================*/
    public static function obtenerUno($id) {
        $mysql = new mysqli("localhost", "root", "", "bdescuela");
        if ($mysql->connect_error) {
            die('Problema con la conexión a la base de datos: ' . $mysql->connect_error);
        }

        $sentencia = $mysql->prepare("SELECT idalumno, apellido, nombre, sexo, fecha_nacimiento FROM alumnos WHERE idalumno = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $alumno = $resultado->fetch_object();
        $sentencia->close();
        $mysql->close();

        return $alumno;
    }


    /*===========================
    ===========================*/
    public function mostrar_alumno($id)
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        $cadena="select idalumno, apellido, nombre, sexo, provincia from alumnos where idalumno=".$id;
        $registros=$mysql->query($cadena) or die($mysql->error);
        if($reg=$registros->fetch_array()){
            echo "idalumno:".$reg['idalumno'];
            echo "<br>";
            echo "<strong>Apellido:</strong>".$reg['apellido'];
            echo "<br>";
            echo "<strong>Nombre</strong>".$reg['nombre'];
            echo "<br>";
            echo "<strong>Sexo:</strong>".$reg['sexo'];
            echo "<br>";
            echo "<strong>Provincia:</strong>".$reg['provincia'];
            echo "<hr>";
        }else{
            echo "No se encuentra el registro";
        }
        $mysql->close();
    }
    public function eliminar($id)
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        $cadena="delete from alumnos where idalumno=".$id;
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "Se elimino el registro";
        $mysql->close();
    }
}

?>