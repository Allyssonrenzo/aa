<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opções</title>
</head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<style>

:root{
    --cortextoprincipal: #161F30 ;
    --cortextosecundario: white;
    --corprincipal: white;
    --corsecundaria: #3B60ED;
    --corterciaria: #3E95F7;
}

body{
    background-color: var(--corprincipal);
    font-family: Arial, Helvetica, sans-serif;
    height: 637px;
    color: var(--cortextoprincipal);

}

.container{
    margin: auto;
    height: 637px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 55px;
    box-shadow: 0px 0px 5px var(--corterciaria), 0px, 0px, 25px var(--corterciaria);
}



.imagens{
    height: 500px;
    width: 500px;
    border-radius: 25px;
    background-image: linear-gradient(var(--corterciaria) ,var(--corsecundaria));
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    box-shadow: 0px 10px 35px var(--corsecundaria);
    transition: width 0.5s, height 0.5s;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
    padding: 10px 0px;
}

.imagens:hover{
    width: 530px;
    height: 530px;
    box-shadow: 0px 10px 75px var(--corsecundaria);
}


img{
    width: 70%;
    height: 80%;
    object-fit: contain;
    transition: width 0.5s, height 0.5s;
}

.imgpsicologo{
    width: 73%;
    height: 100%;
    object-fit: contain;
    transition: width 0.5s, height 0.5s;
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


<body>

<div class="header">
<?php include 'header.php'?>
</div>

<div class="container">
<a href="./aluno-dente/calendario.php">
    <div class="imagens"> 
      Consulta com
      <img src="dentista.png" alt="Foto dentista"> 
      Dentista
    </div>
</a>       

<a href="./aluno/calendario.php">
    <div class="imagens"> 
        Consulta com
        <img class="imgpsicologo" src="psicologo2.1.png" alt="Foto Pscicólogo"> 
        Psicólogo
    </div>
</a>    

</div>

</body>
</html>