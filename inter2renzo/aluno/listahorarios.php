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

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }

        th {
            background-color: #0000ff;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
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
    <div class="container">
   
        <?php
        require_once('../conexao.php');
        $aluno = 'aluno';
        
        $dataCompleta = $_GET['dia']; // Recebe o valor da data completa do parâmetro 'dia' na URL

        // Consulta SQL com filtro da data completa
        $retorno = $conexao->prepare('SELECT * FROM horarioss WHERE dt = ?');
        $retorno->bindParam(1, $dataCompleta, PDO::PARAM_STR);
        $retorno->execute();
        ?>

        <table> 
            <thead>
                <tr>
                    <th>Horario</th>
                    <th>Data</th>
                    <th>Funcionario</th>
                    
                    <th colspan="2">Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($retorno->fetchAll() as $value) { ?>
                    <tr>
                        
                        <td><?php echo $value['horario']; ?></td>
                        <td><?php echo $value['dt']; ?></td>
                        <td><?php echo $value['funcionario']; ?></td>

                        <td>
                        <?php if (empty($value['aluno'])) { ?>
            <!-- Formulário (será exibido somente se a variável $aluno estiver vazia) -->
            <form method="GET" action="marcar.php">
                <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                <button name="alterar" type="submit" class="button">Marcar</button>
            </form>
        
            <?php } ?>
                        </td>
                    </tr>
                <?php } ?> 
            </tbody>
        </table> 
    
        <div class="button-container">
            <a href="calendario.php" class="button">Voltar</a>
        </div>
    </div>
</body>
</html>