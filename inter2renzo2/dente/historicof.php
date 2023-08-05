<!DOCTYPE html>
<html lang="en">
<head>
<style>
    
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
        color: #333333;
    }

    .container {
        max-width: 1200px;
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

    .button-container form {
        display: inline-block;
        margin-right: 10px;
    }

    .button {
        display: inline-block;
        background-color: #0000ff;
        color: #ffffff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        border: none; 
        cursor: pointer; 
        margin-bottom: 5px; 
    }

    .button:hover {
        background-color: #333333;transform: scale(1.05);
    }

    .button-container td form {
        margin: 0; 
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
        $sql = 'SELECT * FROM (
                  SELECT horario, dt, tipo, aluno, funcionario, id FROM horarioss
                  UNION ALL
                  SELECT horario, dt, tipo, aluno, funcionario, id FROM horarios
                ) AS todasAsTabelas
                ORDER BY dt DESC';
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date('Y-m-d');
        ?>

        <table>
            <thead>
                <tr>
                    <th>Horario</th>
                    <th>Data</th>
                    <th>Consulta oline ou presencial?</th>
                    <th>Nome do aluno</th>
                    <th>Nome do funcionario</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($value = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $value['horario']; ?></td>
                        <td><?php echo $value['dt']; ?></td>
                        <td><?php echo $value['tipo']; ?></td>
                        <td><?php echo $value['aluno']; ?></td>
                        <td><?php echo $value['funcionario']; ?></td>
                        <td>
                            <?php if ($value['dt'] >= $dataAtual) { ?>

                                
                                <form method="GET" action="crud2.php">
                                <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                                <button name="remarcar" type="submit" class="button">Remarcar</button>
                                </form>
                                
                               
                                <form method="GET" action="crud2.php">
                                <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                                <button name="excluir" type="submit" class="button">Cancelar</button>
                                </form>
                            <?php } ?>

                            <form method="GET" action="avaliado.php">
                                <input name="aluno" type="hidden" value="<?php echo $value['aluno']; ?>" />
                                <input name="dt" type="hidden" value="<?php echo $value['dt']; ?>" />
                                <input name="horario" type="hidden" value="<?php echo $value['horario']; ?>" />
                                <input name="tipo" type="hidden" value="<?php echo $value['tipo']; ?>" />
                                <input name="funcionario" type="hidden" value="<?php echo $value['funcionario']; ?>" />
                                <button name="excluir2" type="submit" class="button">Ver avaliação</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="button-container">
            <a href="index.php" class="button">Voltar</a>
        </div>
        
    </div>
</body>
</html>