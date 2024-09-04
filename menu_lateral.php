<?php
if (isset($_REQUEST["modo"])){
    $modo=$_REQUEST["modo"];
} else {
    $modo=0;
}
?>
<link rel="stylesheet" href="style3.css">   
<ul>
  <li><a href="inicial.php?modo=<?php echo $modo;  ?>">Pagina Inicial</a></li>
  <li><a href="bot.php?modo=<?php echo $modo;  ?>">Mensagens</a></li>
  <li><a href="perfil.php?modo=<?php echo $modo;  ?>">Perfil</a></li>
  <li><a href="contatos.php?modo=<?php echo $modo;  ?>">Contatos</a></li>
</ul>

<div class="topnav">
  <a href="index.php">Sair</a>
</div>