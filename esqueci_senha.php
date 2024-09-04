<html>
<head>



<link rel="stylesheet" href="style2.css">    
</head>

<?php
if (isset($_GET['resultado'])){
   $resultado = $_GET['resultado'];
}
else{
   $resultado=0;
}   

if($resultado == 1){
   echo"<script>window.alert('Email para recuperar senha enviado com sucesso!')</script>";
}
elseif($resultado == -1){
   echo"<script>window.alert('Email incorreto ou não cadastrado.')</script>";
}
?>



<body>

<div class="containter">
  <div> 
  <h1>Recuperar a Senha</h1>
 <form action="envia_mail.php" method="post">
    <input type="email" id="email_login" name="email_login" placeholder="Digite seu email">
    <br>
    <input type="submit" value="Recuperar Senha" id="Entrar" name="Entrar">
 </form>   
  </div>
</div>    
 
</body>    




</html>
