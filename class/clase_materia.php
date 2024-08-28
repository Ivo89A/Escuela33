<?php
class materia{
    public $idmateria;
    public $nombre_materia;
    public $iddocente;

    public function __construct($idmateria,$nombre_mat,$iddoc)
    {
        $this->idmateria=$idmateria;
        $this->nombre_materia=$nombre_mat;
        $this->iddocente=$iddoc;
    }

    public function guardar()
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        if ($mysql->connect_error)
        die('Problema con la conexion a la base de datos.');

        $cadena='insert into materias(idmateria,nombre_materia,iddocente) values (null , "'.$this->idmateria.'","'.$this->nombre_materia.'","'.$this->iddocente.'")';
        
        $mysql->query($cadena) or die($mysql->error);
        $mysql->close();
    }

    public function listar()
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        $cadena="select idmateria,nombre_materia, iddocente from materias order by nombre_materia";
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "<table class='table table-striped --bs-light' style='background-color:white';>";            
        echo "<tr>";
        echo "<thead>";
        echo "<th>ID Materia</th>";
        echo "<th>Nombre de la materia</th>";
        echo "<th>ID docente</th>";
        echo "</tr>";
        echo "</thead>";
        while($reg=$registros->fetch_array()){
            echo "<tr>";
            echo "<td>".$reg['idmateria']."</td>";
            echo "<td>".$reg['nombre_materia']."</td>";
            echo "<td>".$reg['iddocente']."</td>";
            echo '<td><a class="btn btn-danger" href="eliminar_materia.php?id='.$reg["idmateria"].'">Eliminar</td>';
            echo "</tr>";
        }
        echo "</table>";
        $mysql->close();
    }

    public function eliminar($id)
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        $cadena="delete from materias where idmateria=".$id;
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "Se elimino el registro";
        $mysql->close();
    }

}

?>