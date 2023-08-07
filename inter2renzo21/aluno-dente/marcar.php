<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
         body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            color: #3e95f7;
            margin:0;
        }
    form {
        margin-top: 70px;
        margin-left: 590px;
        max-width: 500px;
        padding: 20px;
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
        width: 96%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        transition: border-color 0.3s ease;
    }

    .select{
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        transition: border-color 0.3s ease;

    }

    input[type="text"]:focus {
        border-color: #3b60ed;
        outline: none;
    }
    input[type="date"] {
        width: 96%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        transition: border-color 0.3s ease;
    }

    input[type="date"]:focus {
        border-color: #3b60ed;
        outline: none;
    }

    input[type="submit"] {
        background-color: #3b60ed;
        color: #ffffff;
        width: 180px;
        height: 40px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        border:none;
        cursor:pointer;
        margin-left:50px;
        font-size:16px;
    }

    .button-container {
        margin: 20px;
        text-align: center;
    }

    .button {
        background-color: #3b60ed;
        color: #ffffff;
        width: 180px;
        height: 40px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        border:none;
        cursor:pointer;
        margin-left:40px;
        text-align:center;
        align-items:center;display:flex;justify-content:center;
    }

    .button:hover {
        background-color: #3e95f7;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        color: white;  transform: scale(1.05);
    }
    input[type="submit"]:hover{
        background-color: #3e95f7;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        color: white;  transform: scale(1.05);
    } 

    a {
        text-decoration: none;
        color: inherit;
    }header {
            background-color: #3b60ed;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }

        .ulti{
display:flex;
flex-direction:row;
    }
    </style>
<body>
<header>
        <h1>Marque seu horario</h1>
    </header>
<?php
    require_once('../conexao.php');

   $id = $_GET['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM horarios where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $horario = $array_retorno['horario'];
   $dt = $array_retorno['dt'];
   $funcionario = $array_retorno['funcionario'];
   $tipo = $array_retorno['tipo'];
   $aluno = $array_retorno['aluno'];
   $id = $array_retorno['id'];
   


?>

  <form method="GET" action="crud.php">
  <label for="">Horarios</label>
        <input type="text" name="horario" id="" value=<?php echo $horario?> readonly >
        <input type="hidden" name="id" id="" value=<?php echo $id ?> >
  <label for="">Data</label>     
        <input type="date" name="dt" id="" value=<?php echo $dt?> readonly>
   <label for="">Funcionario</label>     
        <input type="text" name="funcionario" id="" value=<?php echo $funcionario?> readonly>
  <label for="">Consulta oline ou presencial?</label>                                              
  <select name="tipo" class="select">
  <option value="Presencial">Presencial</option>
  <option value="Online">Online</option></select>
  <label for="">Nome do Aluno</label>                          
        <input type="text"  placeholder="Digite seu nome" name="aluno" id="" value=<?php echo $aluno ?> >
        
        <div class="ulti"> <input type="submit"  name="update" value="Marcar">
    <div class="button"><a href="calendario.php" >Voltar</a></div>
        </div>
  </form>
</body>
</html>