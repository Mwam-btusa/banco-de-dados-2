<?php
$mysqli = new mysqli("localhost", "root", "", "biblioteca");

?>
<doctype html>
<html>
    <head>
</head>
<body>
    <h1>Biblioteca</h1>
    <a href="editar.php">Incluir autor</a>
    <ul>
<?php
$result = $mysqli->query('SELECT * from autores');
foreach($result as $row){
    echo "<li>{$row['codigo']}, {$row['nome']},{$row['biografia']},{$row['data_nascimento']}</li>";
}
?>
</ul>    
</body>    
</html>   