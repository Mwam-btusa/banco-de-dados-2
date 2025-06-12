<?php
$mysqli = new mysqli("localhost", "root", "", "biblioteca");

if (isset($_POST) && count($_POST)>0){
    $nome = $_POST['nome'];
    $biografia = $_POST['biografia'];
    $data_de_nascimento = $_POST['datadenascimento'];
    $codigo_nacionalidade = $_POST['codigo_nacionalidade'];

    $sql = 'INSERT into autores(nome,biografia,data_nascimento,codigo_nacionalidade) VALUES (';
    $sql.= "'$nome',";
    $sql.= "'$biografia',";
    $sql.= "'$data_de_nascimento',";
    $sql.= "$codigo_nacionalidade)";

    $mysqli->query($sql);

    header('location:index.php');
    exit;
}

$result = $mysqli->query("SELECT codigo FROM nacionalidades");
if ($result->num_rows == 0){
    $mysqli->query("INSERT INTO nacionalidades(nome) VALUES
    ('alemão'), ('brasileiro'), ('chinês')");
}

?>
<doctype html>
<html>
    <head>
</head>
<body>
    <h1>Incluir autor</h1>
    <form method="post" action="editar.php">
        Nome: <input type="text" name="nome" size="50"/><br/>
        Biografia: <br/><textarea name="biografia" cols="80"></textarea><br/>
        Data de nascimento:<input type="date"  name="datadenascimento"/><br/>
        Nacionalidade:
        <select name="codigo_nacionalidade">
        <?php
        $result = $mysqli->query("SELECT codigo, nome FROM nacionalidades");
        foreach ($result as $row) {
            echo '<option value="' . $row['codigo'] .
            '">' . $row['nome']  . '</option>';
        }
        ?>
        </select><br/>
        <input type="submit" value="gravar">
</form>
<a href="index.php">Voltar</a>
</body>    
</html>  