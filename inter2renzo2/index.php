<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Página</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .button {
            display: inline-block;
            background-color: #0000ff;
            color: #ffffff;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin: 10px;
        }

        .button:hover {
            background-color: #333333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo à Minha Página</h1>
        <p>Escolha uma opção:</p>
        <a href="historico.php" class="button">Histórico</a>
        <a href="escolha-servico.php" class="button">Agendar Horário</a>
    </div>
</body>
</html>