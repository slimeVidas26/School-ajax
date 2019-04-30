<?php  //echo $_SERVER['REQUEST_METHOD'].'</br>';
//print_r($_SERVER) ;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">    <title>School</title> -->


    <?php
   
?>

        <?php
    $t = time();
    for($i=0;$i<count($this->css);$i++) {
      echo "<link rel=\"stylesheet\" href=\"/school/css/{$this->css[$i]}?i={$t}\">";
    }
?>
</head>

<body>