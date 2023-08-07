<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Form</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            color: #3e95f7;
            margin: 0;
            padding: 0;
         
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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
        form {
        margin-top: 70px;
        margin-left: 600px;
        max-width: 500px;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
        border-radius: 5px;
    }
        
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }
        input[type="text"],
        .select {
            width: 96%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        .select:focus {
            border-color: #3b60ed;
            outline: none;
        }
        input[type="submit"] {
            background-color: #3b60ed;
            color: #fff;
            padding: 10px 20px;
            border: none;font-size:16px;
            border-radius: 4px;
            cursor: pointer;
            width: 180px;
        height: 40px;
            transition: background-color 0.3s ease;   margin-left:50px;
        }
        input[type="submit"]:hover {
            background-color: #3e95f7;transform: scale(1.05);
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        .select{width:100%;}
        
        header {
            background-color: #3b60ed;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }.button:hover {
        background-color: #3e95f7;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        color: white;  transform: scale(1.05);
    }
        .ulti{
display:flex;
flex-direction:row;
    }
    </style>
</head>
<body> 
<header>
        <h1>Marque seu horario</h1>
    </header>
    <?php
        require_once('../conexao.php');

        $id = $_GET['id'];

        ##sql para selecionar apenas um aluno
        $sql = "SELECT * FROM horarios where id= :id";
        
        # junta o sql à conexão do banco
        $retorno = $conexao->prepare($sql);

        ##diz o parâmetro e o tipo do parâmetro
        $retorno->bindParam(':id', $id, PDO::PARAM_INT);

        #executa a estrutura no banco
        $retorno->execute();

        #transforma o retorno em array
        $array_retorno = $retorno->fetch();
        
        ##armazena o retorno em variáveis
        $horario = $array_retorno['horario'];
        $dt = $array_retorno['dt'];
        $funcionario = $array_retorno['funcionario'];
        $tipo = $array_retorno['tipo'];
        $aluno = $array_retorno['aluno'];
        $id = $array_retorno['id'];
    ?>
    <form method="GET" action="crud2.php">
        <label for="horario">Horario</label>
        <input type="text" name="horario" id="horario" value="<?php echo $horario ?>" readonly>
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <label for="dt">Data</label>
        <input type="text" name="dt" id="dt" value="<?php echo $dt ?>" readonly>

        <label for="funcionario">Funcionário</label>
        <input type="text" name="funcionario" id="funcionario" value="<?php echo $funcionario ?>" readonly>

        <label for="tipo">Consulta Online ou Presencial?</label>
        <select name="tipo" class="select" id="tipo">
            <option value="Presencial" <?php if ($tipo === 'Presencial') echo 'selected'; ?>>Presencial</option>
            <option value="Online" <?php if ($tipo === 'Online') echo 'selected'; ?>>Online</option>
        </select>

        <label for="aluno">Nome do Aluno</label>
        <input type="text" placeholder="Digite seu nome" name="aluno" id="aluno" value="<?php echo $aluno ?>">

        <div class="ulti"> <input type="submit"  name="update" value="Marcar">
    <div class="button"><a href="calendariof.php" >Voltar</a></div>
        </div>
    </form>
</body>
</html>
