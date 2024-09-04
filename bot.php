
<?php
session_start();
if($_SESSION['id'] == NULL){
  echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}

?>
<html>
<head>
<?php

require_once('conn.php');

#print_r($_REQUEST);

?>

<?php
if (isset($_GET['resultado'])){
   $resultado = $_GET['resultado'];
}
else{
   $resultado=0;
}   

if($resultado == 1){
   echo"<script>window.alert('Mensagem salva com sucesso!')</script>";
}
elseif($resultado == -1){
   echo"<script>window.alert('Erro ao salvar mensagem.')</script>";
}
elseif($resultado == -2){
  echo"<script>window.alert('Erro ao conectar com o banco. Tente novamente mais tarde.')</script>";
}
elseif($resultado == -3){
  echo"<script>window.alert('Valores inválidos. Digite os valores corretamente.')</script>";
}
?>

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

textarea{

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

input[type=button]:hover {
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
  <form action="autenticar_bot.php" name="autenticar_bot" method="post">
  Segure a tecla CTRL para selecionar mais de um contato.
  <br>
<select name="contato[]" id="contato" Size="5" multiple="multiple">
    <?php
    $busca_email = "SELECT telefone_contato,id_contato FROM contato WHERE id_login =".$_SESSION['id'];
    $resultado_busca = mysqli_query($conn, $busca_email);

    if(mysqli_num_rows($resultado_busca) > 0){

      while($row = mysqli_fetch_assoc($resultado_busca)){

        $telefone = $row["telefone_contato"];
        $id_contato = $row["id_contato"];
        echo "<option value= '".$id_contato."'> ".$telefone."</option>";
      }
 }

    
    ?>
</select>
<br>

  <textarea id="mensagem" name="mensagem" rows="4" cols="50" placeholder="Digite sua mensagem">
  </textarea> 
  <br>
  <input type="button" value="Enviar" onclick="javascript:document.forms['autenticar_bot'].submit();">
  </form>   
</div>

</body>
</html>
