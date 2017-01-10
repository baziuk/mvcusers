<?php
require_once 'controllers/controller.php';

$conroller = new controller();
$func = $_REQUEST["func"];
if(!$func){
    $conroller->showUser();
}
 elseif ($func == "del") {
    $conroller->deleteUser();
    header("Location: http://mvc.com/");
exit;
 }
 elseif( $func == "new")
     $conroller->newUser();
 elseif($func == "add"){
    $conroller->addUser();

 }
 elseif ($func == "edit")
    $conroller->editUser();

elseif($func == "update"){
 
         $conroller->updateUser();
}
?>

