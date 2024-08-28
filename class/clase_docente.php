<?php
class docente{
    public $iddocente;
    public $apellido;
    public $nombre;
    public $mail;

    public function __construct($ape,$nom,$mail)
    {
        $this->apellido=$ape;
        $this->nombre=$nom;
        $this->mail=$mail;
    }

    public function guardar()
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        if ($mysql->connect_error)
        die('Problema con la conexion a la base de datos.');

        $cadena='insert into docentes(apellido,nombre,mail) values ( "'.$this->apellido.'","'.$this->nombre.'","'.$this->mail.'")';
        
        $mysql->query($cadena) or die($mysql->error);
        $mysql->close();
    }

    public function listar()
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        $cadena="select iddocente,apellido,nombre, mail from docentes order by apellido";
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "<table class='table table-striped --bs-light' style='background-color:white';>";            
        echo "<tr>";
        echo "<thead>";
        echo "<th>Apellido</th>";
        echo "<th>Nombre</th>";
        echo "<th>Email</th>";
        echo "<th>Eliminar docente</th>";
        echo "</tr>";
        echo "</thead>";
        while($reg=$registros->fetch_array()){
            echo "<tr>";
            echo "<td>".$reg['apellido']."</td>";
            echo "<td>".$reg['nombre']."</td>";
            echo "<td>".$reg['mail']."</td>";
            echo '<td><a class="btn btn-danger" href="../eliminar/eliminar_docente.php?id='.$reg["iddocente"].'">Eliminar</td>';
            echo "</tr>";
        }
        echo "</table>";
        $mysql->close();
    }

    public function eliminar($id)
    {
        $mysql = new mysqli("localhost","root","","bdescuela");
        $cadena="delete from docentes where iddocente=".$id;
        $registros=$mysql->query($cadena) or die($mysql->error);
        echo "Se elimino el registro";
        $mysql->close();
    }

}

?>