
<html>
<head>
<?php
session_start();
require_once('conn.php');

if($_SESSION['id'] == NULL){
  echo "<meta http-equiv='refresh' content='0;url=index.php'>";
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
  width: 12%;
  background-color: rgb(191, 241, 243);
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
  background-color: #22767973;
  color: white;
}

p {
  font-family: Arial;
  color: black;
  font-size: 30px;
}

.btn input[type="checkbox"]{
  position: absolute;
  width: 80px;
  height: 40px;
  bottom: 8px;
  left: 16px;
  appearance: none;
  outline: none;
  border-radius: 45px;
  box-shadow: inset 0 2px 2px #22767973, inset 0 -2px 2px #22767973;
  transition: 0.5s;
  cursor: pointer;
}

.btn input:checked[type="checkbox"]{
  background: #22767973;
  box-shadow: inset 0 2px 2px #22767973, inset 0 -2px 2px #22767973;
}

.btn input[type="checkbox"]::before{
  content: "";
  position: absolute;
  width: 36px;
  height: 36px;
  border-radius: 45%;
  left: 0px;
  background: linear-gradient(to bottom, #eaeaea, #f9f9f9);
  transition: 0.5s;
  box-shadow: inset 0 2px 2px #fff, inset 0 -2px -2px #fff;
}

.btn input:checked[type="checkbox"]::before{
  background: linear-gradient(to bottom, rgb(191, 241, 243), rgb(191, 241, 243));
  box-shadow: inset 0 2px 2px #22767973, inset 0 -2px 2px #22767973;
  transform: translateX(40px);

}
.dark-mode{
  background: #22767973;
  --color: white;

}  


</style>
</head>
<body>

<?php 
include("menu_lateral.php");

$busca_usuario = "SELECT  nome_usuario, sexo FROM login WHERE id=".$_SESSION['id'];
$resultado_busca = mysqli_query($conn, $busca_usuario);
$total_clientes = mysqli_num_rows($resultado_busca);

if($total_clientes == 1){
    $row = mysqli_fetch_assoc($resultado_busca);
    $nome_usuario = $row["nome_usuario"];
    $sexo =  $row["sexo"];
    
}

?>


<div class="btn">
  <input type="checkbox" id="darkModeButton">

<script src="modo.js"></script>

<div style="margin-left:10%;padding:1px 12px;height:10px;text-align:center;color: var(--color);">
  <?php if($sexo == 'M'){
    echo "<p>Olá, seja bem-vindo $nome_usuario</p>";
  }else{
    echo "<p>Olá, seja bem-vinda $nome_usuario</p>";
  }?>

</div>

</body>
</html>
