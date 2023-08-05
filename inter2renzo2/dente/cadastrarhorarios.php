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
            color: #333333;margin:0;
        }

        form {
        margin-top: 100px;
        margin-left: 590px;
        max-width: 500px;
        padding: 20px;
        padding-right:30px;
        background-color: #ffffff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
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
     font-size:16px;
        border: none;
        width: 150px;
        height: 40px;
        border-radius: 4px;
        cursor: pointer;
    }

    .button-container {
           background-color: transparent;
        color: #ffffff;
    
       
        border: none;
        display: flex;

        flex-direction:row;
        justify-content:space-around;
    }

    .button {
     text-align:center;
     padding-top:10px;
        background-color: #0000ff;
        color: #ffffff;
       width: 150px;
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
        background-color: #333333;transform: scale(1.05);
    }

    .bu:hover {
        background-color: #333333;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);transform: scale(1.05);
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    select{
        width: 103%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        transition: border-color 0.3s ease;
    }
    header {
            background-color: #0000ff;
            color: #ffffff;
            padding: 10px;
            text-align: center;}
</style>

</head>
<body> 

<header>
        <h1>Cadastre seu horário</h1>
    </header>
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
           $sqlVerificaHorario = "SELECT COUNT(*) as total FROM horarios WHERE horario = :horario AND dt = :dt ";
           $stmtVerificaHorario = $conexao->prepare($sqlVerificaHorario);
           $stmtVerificaHorario->bindParam(':horario', $horario, PDO::PARAM_STR);
           $stmtVerificaHorario->bindParam(':dt', $dt, PDO::PARAM_STR);
        
           $stmtVerificaHorario->execute();
           $totalHorarios = $stmtVerificaHorario->fetch(PDO::FETCH_ASSOC)['total'];
   
           if ($totalHorarios > 0) {
               echo "<p><strong>Erro:</strong> Já existe um horário cadastrado com o mesmo horário e data.</p>";
           } else {
               // Inserir os dados na tabela horarios
               $sqlInserir = "INSERT INTO horarios (horario, dt, funcionario) VALUES (:horario, :dt, :funcionario)";
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
<select id="horario" name="horario">
    <option value="08:00-as-08:30">08:00-as-08:30</option>
    <option value="09:00">09:00</option>
    <option value="10:00">10:00</option>
    <!-- Add more time options as needed -->
</select>

        <label for="dt">Data</label>
        <input type="date" id="dt" name="dt">

        <label for="dt">Funcionario</label>
        <input type="text" id="funcionario" placeholder="Digite seu nome" name="funcionario">

        <div class="button-container">
        <input type="submit" class="bu"  name="cadastrar" value="Cadastrar">
        <a href="calendariof.php" class="button">Voltar</a> </div>
       
    </form>



   
</body>
</html>
