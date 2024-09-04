<?php
session_start();
if($_SESSION['id'] == NULL){
  echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}

?>
<html>
<head>
<?php
if (isset($_GET['resultado'])){
  $resultado = $_GET['resultado'];
}
else{
   $resultado=0;
}   

if($resultado == 1){
   echo"<script>window.alert('Contato salvo com sucesso!')</script>";
}
elseif($resultado == -1){
   echo"<script>window.alert('Erro ao salvar o contato')</script>";
}
?>

<script language="javascript">
function Valida_Form(){
   var nome = document.getElementById("nome_contato");
   var numero = document.getElementById("numero_contato");

   if(!nome.value){
    window.alert("Informe um nome");
    return;
   }

   else if(!numero.value){
    window.alert("Informe um numero de telefone");
    return;
   }
   document.forms["salvar_contato"].submit();
}
</script>

<style>
body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 10%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: black;
  padding: 8px 16px;
  text-decoration: none;
  font-family: Arial;
}

li a.active {
  background-color: blue;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}

input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=tel], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=button] {
  width: 50%;
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit] {
  width: 50%;
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=button]:hover {
  background-color: gray;
}

input[type=submit]:hover {
  background-color: gray;
}

div {
  border-radius: 5px;
  background-color:white;
  padding: 20px;
}
</style>
</head>
<body>

<?php 
include("menu_lateral.php");
?>


<div style="margin-left:30%;padding:1px 12px;height:10px;">
  <form action="salvar_contato.php" name="salvar_contato" method="post">
  
  <input type="text" id="nome_contato" name="nome_contato" placeholder="Digite o nome do contato">
  <input type="tel" id="numero_contato" name="numero_contato" placeholder="Digite o numero" maxlength="13">
  <select id="sexo" name="genero">
      <option value="M">Masculino</option>
      <option value="F" selected>Feminino</option>
   </select>
  <input type="button" value="Atualizar contato" onclick="javascript:window.location.href='atualizar_contato.php'">
  <input type="submit" value="Salvar" id="Salvar" name="Salvar">
  </form>   
</div>

</body>
</html>
