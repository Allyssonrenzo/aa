<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            color: #333333;
        }

    form {
        margin: 20px;
        max-width: 400px;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    input[type="text"] {
        width: 98%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus {
        border-color: #0000ff;
        outline: none;
    }

    input[type="submit"] {
        background-color: #0000ff;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .button-container {
        margin: 20px;
        text-align: center;
    }

    .button {
        display: inline-block;
        background-color: #0000ff;
        color: #ffffff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }
    input[type="date"] {
        width: 98%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        transition: border-color 0.3s ease;
    }

    input[type="date"]:focus {
        border-color: #0000ff;
        outline: none;
    }

    .button:hover {
        background-color: #333333;
    }

    a {
        text-decoration: none;
        color: inherit;
    }
</style>

</head>
<body> 
<?php
require_once('../conexao.php');

if (isset($_GET['cadastrar'])) {
    // Verificar se todos os campos foram preenchidos
    if (!empty($_GET['horario']) && !empty($_GET['dt'] )) {
        // Receber os valores dos campos do formulário
        $horario = $_GET['horario'];
        $dt = $_GET['dt'];
        $funcionario = $_GET['funcionario'];
        

        // Consultar o banco de dados para verificar se já existe o mesmo horário e dia cadastrados
        $sqlVerificaHorario = "SELECT COUNT(*) as total FROM horarioss WHERE horario = :horario AND dt = :dt ";
        $stmtVerificaHorario = $conexao->prepare($sqlVerificaHorario);
        $stmtVerificaHorario->bindParam(':horario', $horario, PDO::PARAM_STR);
        $stmtVerificaHorario->bindParam(':dt', $dt, PDO::PARAM_STR);
     
        $stmtVerificaHorario->execute();
        $totalHorarios = $stmtVerificaHorario->fetch(PDO::FETCH_ASSOC)['total'];

        if ($totalHorarios > 0) {
            echo "<p><strong>Erro:</strong> Já existe um horário cadastrado com o mesmo horário e data.</p>";
        } else {
            // Inserir os dados na tabela horarios
            $sqlInserir = "INSERT INTO horarioss (horario, dt, funcionario) VALUES (:horario, :dt, :funcionario)";
            $stmtInserir = $conexao->prepare($sqlInserir);
            $stmtInserir->bindParam(':horario', $horario, PDO::PARAM_STR);
            $stmtInserir->bindParam(':dt', $dt, PDO::PARAM_STR);
            $stmtInserir->bindParam(':funcionario', $funcionario, PDO::PARAM_STR);
            if ($stmtInserir->execute()) {
                echo "<p><strong>Sucesso:</strong> Horário cadastrado com sucesso!</p>";
            } else {
                echo "<p><strong>Erro:</strong> Não foi possível cadastrar o horário.</p>";
            }
        }
    } else {
        echo "<p><strong>Erro:</strong> Preencha todos os campos do formulário.</p>";
    }
}
?>


    
    <form method="GET" action="cadastrarhorarios.php">
        <label for="horario">Horario</label>
        <input type="text" id="horario" name="horario">

        <label for="dt">Data</label>
        <input type="date" id="dt" name="dt">

        <label for="dt">Funcionario</label>
        <input type="text" id="funcionario" name="funcionario">

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>

    <div class="button-container">
        <a href="calendariof.php" class="button">Voltar</a>
    </div>
</body>
</html>
