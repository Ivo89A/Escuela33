<?php
class curso{
    public $idcurso;
    public $nombre_curso;
    public $turno;
    public $aula;

    public function __construct($nom,$tur,$au)
    {
        $this->nombre_curso=$nom;
        $this->turno=$tur;
        $this->aula=$au;
    }

    public function guardar()
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        if ($mysql->connect_error)
        die('Problema con la conexion a la base de datos.');

        $cadena='insert into cursos(nombre_curso,turno,aula) values ( "'.$this->nombre_curso.'","'.$this->turno.'",'.$this->aula.')';
        
        $mysql->query($cadena) or die($mysql->error);
        $mysql->close();
    }

    public function listar()
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        $cadena="select idcurso, nombre_curso,turno, aula from cursos order by nombre_curso";
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "<table class='table table-striped --bs-light' style='background-color:white';>";            
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID del curso</th>";
        echo "<th>Nombre del curso</th>";
        echo "<th>Turno</th>";
        echo "<th>Aula</th>";
        echo "<th>Eliminar</th>";
        echo "</tr>";
        echo "</thead>";
        while($reg=$registros->fetch_array()){
            echo "<tr>";
            echo "<td>".$reg['idcurso']."</td>";
            echo "<td>".$reg['nombre_curso']."</td>";
            echo "<td>".$reg['turno']."</td>";
            echo "<td>".$reg['aula']."</td>";
            echo '<td><a class="btn btn-danger" href="../eliminar/eliminar_curso.php?id='.$reg["idcurso"].'">Eliminar</td>';
            echo "</tr>";
            }
            echo "</table>";
        $mysql->close();
    }

    public function eliminar($id)
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        $cadena="delete from cursos where idcurso=".$id;
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "Se elimino el registro";
        $mysql->close();
    }

}

?>