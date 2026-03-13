<?php
// test_db.php
$mysqli = new mysqli("localhost", "root", "", "examen_mascotas");

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

echo "<h2>Conexión exitosa a la base de datos</h2>";

// Probar una consulta simple
$res = $mysqli->query("SHOW TABLES");
if($res) {
    echo "<p>Tablas en la base de datos:</p><ul>";
    while($row = $res->fetch_array()) {
        echo "<li>" . $row[0] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No se pudieron obtener las tablas.";
}
?>