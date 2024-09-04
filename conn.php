<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'bot_zap';
$conn = mysqli_connect($servidor,$usuario,$senha,$banco);

if(!$conn){

    echo "erro";

} else{

    #echo " deu bom ";
}

?>