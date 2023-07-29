<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário de Horários Para o Dentista</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7; /* Fundo ligeiramente acinzentado */
        }

        header {
            text-align: center;
            background-color: #0000ff; /* Azul para o cabeçalho */
            padding: 10px 0;
           
        }

        header h1 {
            color: #ffffff; /* Texto branco */
            margin: 0;
        }

        .container {
            max-width: 1000px; /* Aumentar a largura do calendário */
            margin:  auto;
            padding: 20px;
            background-color: #ffffff; /* Fundo branco para o calendário */
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        .calendario {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px; /* Espaçamento entre os dias */
            border-collapse: collapse; /* Remover bordas entre células */
            margin-bottom: 20px; /* Espaçamento inferior */
            
            overflow: hidden; /* Para esconder qualquer conteúdo que ultrapasse o calendário */
        }

        .mes {
            grid-column: 1 / -1;
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            color: #0000ff; /* Azul */
            font-size: 24px; /* Tamanho da fonte maior */
        }

        .dia-semana {
            text-align: center;
            font-weight: bold;
            color: #0000ff; /* Azul */
            padding: 10px 0; /* Espaçamento vertical */
            background-color: #e6e6e6; /* Fundo acinzentado para os dias da semana */
        }

        .dia {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px; /* Altura maior */
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            cursor: pointer;
            font-size: 18px; /* Tamanho da fonte maior */
            color: #0000ff; /* Azul */
            transition: background-color 0.3s ease;
            position: relative; /* Para posicionamento dos eventos */
        }

        .dia::before {
            content: ''; /* Criação do ponto indicador de evento */
            display: block;
            width: 8px;
            height: 8px;
            background-color: #0000ff; /* Azul */
            border-radius: 50%;
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0; /* Inicialmente invisível */
        }

        .dia.evento {
            position: relative; /* Para posicionamento dos eventos */
        }

        .dia.evento::before {
            opacity: 1; /* Torna o ponto indicador visível para dias com eventos */
        }

        .dia:hover {
            background-color: #e0e0e0; /* Tom mais claro ao passar o mouse */
        }

        .dia.evento:hover::before {
            opacity: 1; /* Torna o ponto indicador visível ao passar o mouse */
        }

        .button-container {
            margin: 20px;
            text-align: center;
        }

        .button {
            display: inline-block;
            background-color: #0000ff; /* Azul */
            color: #ffffff; /* Texto branco */
            padding: 12px 24px; /* Espaçamento interno */
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #333333; /* Tom mais escuro ao passar o mouse */
        }

        a {
            color: #0000ff; /* Azul para os links */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #666666; /* Tom mais escuro ao passar o mouse */
        }
        
    </style>
</head>
<body>
    <header>
        <h1>Calendário de Horários Para o Psicologo</h1>
    </header>
    <div class="container">
         <?php
         // Verificar se um mês e ano foram passados nos parâmetros da URL
         if (isset($_GET['mes']) && isset($_GET['ano'])) {
             // Obter o mês e o ano a partir dos parâmetros da URL
             $mesAtual = intval($_GET['mes']);
             $anoAtual = intval($_GET['ano']);
         } else {
             // Se não foram passados, usar o mês e o ano atuais
             $dataAtual = new DateTime();
             $mesAtual = intval($dataAtual->format('n'));
             $anoAtual = intval($dataAtual->format('Y'));
         }
 
         // Criar objetos DateTime para o primeiro e o último dia do mês atual
         $primeiroDiaMes = new DateTime("$anoAtual-$mesAtual-01");
         $ultimoDiaMes = new DateTime("$anoAtual-$mesAtual-" . $primeiroDiaMes->format('t'));
 
         // Obter o nome do mês
         $nomeMes = $primeiroDiaMes->format('F');
 
         // Definir o link para o mês anterior
         $mesAnterior = $mesAtual - 1;
         $anoAnterior = $anoAtual;
         if ($mesAnterior == 0) {
             $mesAnterior = 12;
             $anoAnterior--;
         }
         $linkMesAnterior = $_SERVER['PHP_SELF'] . '?mes=' . $mesAnterior . '&ano=' . $anoAnterior;
 
         // Definir o link para o mês seguinte
         $mesSeguinte = $mesAtual + 1;
         $anoSeguinte = $anoAtual;
         if ($mesSeguinte == 13) {
             $mesSeguinte = 1;
             $anoSeguinte++;
         }
         $linkMesSeguinte = $_SERVER['PHP_SELF'] . '?mes=' . $mesSeguinte . '&ano=' . $anoSeguinte;
        
         $agenda = array(
            1 => 'listahorarios.php',
            2 => 'listahorarios.php',
            3 => 'listahorarios.php',
            4 => 'listahorarios.php',
            5 => 'listahorarios.php',
            6 => 'listahorarios.php',
            7 => 'listahorarios.php',
            8 => 'listahorarios.php',
            9 => 'listahorarios.php',
            10 => 'listahorarios.php',
            11 => 'listahorarios.php',
            12 => 'listahorarios.php',
            13 => 'listahorarios.php',
            14 => 'listahorarios.php',
            15 => 'listahorarios.php',
            16 => 'listahorarios.php',
            17 => 'listahorarios.php',
            18 => 'listahorarios.php',
            19 => 'listahorarios.php',
            20 => 'listahorarios.php',
            21 => 'listahorarios.php',
            22 => 'listahorarios.php',
            23 => 'listahorarios.php',
            24 => 'listahorarios.php',
            25 => 'listahorarios.php',
            26 => 'listahorarios.php',
            27 => 'listahorarios.php',
            28 => 'listahorarios.php',
            29 => 'listahorarios.php',
            30 => 'listahorarios.php',
            31 => 'listahorarios.php',
         );
         ?>
 
         <h1>Calendário de Horarios Para o Pisicologo</h1>
         <div class="calendario">
             <div class="mes">
                 <a href="<?php echo $linkMesAnterior; ?>"><<</a>
                 <?php echo $nomeMes . ' ' . $anoAtual; ?>
                 <a href="<?php echo $linkMesSeguinte; ?>">>></a>
             </div>
 
             <?php
             // Exibir os dias da semana no calendário
             $diasSemana = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
             foreach ($diasSemana as $diaSemana) {
                 echo '<div class="dia-semana">' . $diaSemana . '</div>';
             }
 
             // Calcular quantas células vazias antes do primeiro dia do mês
             $diasVaziosAntes = $primeiroDiaMes->format('w');
 
             // Preencher células vazias antes do primeiro dia do mês
             for ($i = 0; $i < $diasVaziosAntes; $i++) {
                 echo '<div class="dia"></div>';
             }
 
             // Preencher os dias do mês com os links para as respectivas páginas
$dataAtual = clone $primeiroDiaMes;
while ($dataAtual <= $ultimoDiaMes) {
    $dia = intval($dataAtual->format('d'));
    // Verificar se o dia está definido no array de agenda
    if (isset($agenda[$dia])) {
        // Obter a URL da página do dia específico
        $paginaDiaEspecifico = $agenda[$dia];
        // Obter a data completa no formato 'Y-m-d'
        $dataCompleta = $dataAtual->format('Y-m-d');
        // Exibir o link para a página do dia com o atributo data-date contendo a data completa
        echo '<a class="dia" href="' . $paginaDiaEspecifico . '?dia=' . $dataCompleta . '" data-date="' . $dataCompleta . '">' . $dia . '</a>';
    } else {
        // Exibir célula vazia para os dias não definidos na agenda
        echo '<div class="dia"></div>';
    }
    $dataAtual->modify('+1 day');
}
             
             ?>
    </div>
</body>
</html>
