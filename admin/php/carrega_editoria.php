<?php

include '../conections/conexao.php';

echo $editoria = $_POST['editoria'];

$sql = "SELECT * FROM sub_editoriais WHERE editoria_id = $editoria";
$qr = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($qr) > 0){
   while($ln = mysql_fetch_assoc($qr)){
      echo '<option value="'.$ln['sub_editoriais_id'].'">'.$ln['sub_editora']."</option>";
   }
}else{
    
     echo '<option value="">Sem dados</option>';
}
