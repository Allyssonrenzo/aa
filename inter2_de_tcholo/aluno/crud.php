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
        width: 100%;
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
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao2.php');



##cadastrar
if (isset($_GET['cadastrar'])) {
        // Verificar se todos os campos foram preenchidos
        if (!empty($_GET['horario']) && !empty($_GET['dt'])) {
            // Receber os valores dos campos do formulário
            $horario = $_GET['horario'];
            $dt = $_GET['dt'];
            $funcionario = $_GET['funcionario'];
            // Consultar o banco de dados para verificar se já existe o mesmo horário e dia cadastrados
            $sqlVerificaHorario = "SELECT COUNT(*) as total FROM horarioss WHERE horario = :horario";
            $stmtVerificaHorario = $conexao->prepare($sqlVerificaHorario);
            $stmtVerificaHorario->bindParam(':horario', $horario, PDO::PARAM_STR);
            $stmtVerificaHorario->execute();
            $totalHorarios = $stmtVerificaHorario->fetch(PDO::FETCH_ASSOC)['total'];

            if ($totalHorarios > 0) {
                echo "<p><strong>Erro:</strong> Já existe um horário cadastrado com o mesmo horário e dia.</p>";
            } else {
                // Inserir os dados na tabela horarioss
                $sqlInserir = "INSERT INTO horarioss (horario, dt) VALUES (:horario, :dt)";
                $stmtInserir = $conexao->prepare($sqlInserir);
                $stmtInserir->bindParam(':horario', $horario, PDO::PARAM_STR);
                $stmtInserir->bindParam(':dt', $dt, PDO::PARAM_STR);
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
  
#######alterar
if (isset($_GET['update'])) {

    ##dados recebidos pelo método POST
    $horario = $_GET["horario"];
    $id = $_GET["id"];
    $dt = $_GET["dt"];
    $funcionario = $_GET['funcionario'];
    $tipo = $_GET["tipo"];
    $aluno = $_GET["aluno"];

    ##codigo sql
    $sql = "UPDATE  horarioss SET horario= :horario, dt= :dt, funcionario= :funcionario, tipo= :tipo, aluno= :aluno WHERE id= :id ";

    ##junta o código sql à conexão do banco
    $stmt = $conexao->prepare($sql);

    ##diz o parâmetro e o tipo  do parâmetros
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':horario', $horario, PDO::PARAM_STR);
    $stmt->bindParam(':dt', $dt, PDO::PARAM_STR);
    $stmt->bindParam(':funcionario', $funcionario, PDO::PARAM_STR);
    $stmt->bindParam(':aluno', $aluno, PDO::PARAM_STR);
    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->execute()) {
        // Redirecionamento para listahorarios.php com o valor do parâmetro 'dt'
        header("Location: listahorarios.php?dia=" . $dt);
        exit; // Certifique-se de usar 'exit' após o redirecionamento para evitar execução adicional do código
    }

}   


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `aluno` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o aluno
             $id foi excluido!!!"; 

            echo " <button class='button'><a href='calendario.php'>voltar</a></button>";
        }

}

        
?>
 
</body>

