<html>
<head>
<link rel="stylesheet" href="style.css">    
</head>

<?php
if (isset($_GET['resultado'])){
   $resultado = $_GET['resultado'];
 }
 else{
    $resultado=0;}

if($resultado == -1){
   echo"<script>window.alert('Email já cadastrado')</script>";
}
?>

<script language="javascript">
function Valida_Form(){
   var fname = document.getElementById("fname");
   var email = document.getElementById("email");
   var senha = document.getElementById("senha");
   var confirmar_senha = document.getElementById("confirma_senha");
   

   if(!fname.value){
      window.alert("Informe um nome");
      document.getElementById("fname").focus();
      return;
   }

   else if ((email.value.search("@")==-1) || (email.value.search(" ")!=-1)){
      window.alert("Email inválido");
      return;
   }

   else if (senha.value.length < 8) {
      window.alert("A senha precisa ter pelo menos oito caracteres.");
      return;
   }

   else if(senha.value != confirmar_senha.value){
      window.alert("As senhas não são iguais");
      return;
   }
   document.forms["cadastro"].submit();
}

</script>   

<body>



<div class="containter">
 <div>
 <h1>Faça o seu cadastro</h1>
 <form action="cadastro.php" name="cadastro" method="post">
    <input type="text" id="fname" name="nome_usuario" placeholder="Digite seu nome" maxlength="75">
    <input type="email" id="email" name="email_usuario" placeholder="Digite seu email">
    <input type="password" id="senha" name="senha_usuario" placeholder="Digite sua senha">
    <input type="password" id="confirma_senha" name="confirmar_senha_usuario" placeholder="Confirme sua senha">
    <select id="sexo" name="genero">
      <option value="M">Masculino</option>
      <option value="F" selected>Feminino</option>
   </select>
    <input type="button" value="Criar" onclick="javascript:Valida_Form()">
 </form>   
 </div>
</div>    

</body>    

</html>