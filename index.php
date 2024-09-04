<html>
<head>



<link rel="stylesheet" href="style2.css">    
</head>

<?php
session_start();
session_unset();
if (isset($_GET['resultado'])){
   $resultado = $_GET['resultado'];
}
else{
   $resultado=0;
}   

if($resultado == 1){
   echo"<script>window.alert('Cadastro feito com sucesso!')</script>";
}
elseif($resultado == -1){
   echo"<script>window.alert('Email ou senha incorretos')</script>";
}
?>



<body>

<div class="containter">
  <div> 
  <h1>BotZap</h1>
 <form action="autenticar.php" method="post">
    <input type="email" id="email_login" name="email_login" placeholder="Digite seu email">
    <br>
    <input type="password" id="senha_login" name="senha_login" placeholder="Digite sua senha"><br>

    <input type="submit" value="Entrar" id="Entrar" name="Entrar">
    <input type="button" value="Crie uma conta" onclick="javascript:window.location.href='login.php'">
    <input type="button" value="Esqueci a senha" name="Entrar" onclick="javascript:window.location.href='esqueci_senha.php'">
 </form>   
  </div>
</div>    
 
</body>    




</html>
