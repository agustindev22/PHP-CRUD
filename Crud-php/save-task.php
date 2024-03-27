<?php
include("db.php");

   if (isset ($_POST['save-task'])){
        $title=$_POST['title'];
        $descripcion=$_POST['descripcion'];
      
        $query = "INSERT INTO task(title, descripcion) VALUES ('$title', '$descripcion')";
        $result = mysqli_query($conn, $query);
         if(!$result){
            die("error query");
         }
    $_SESSION['message']='Tu tarea fue guardada';
    $_SESSION['message_type'] = 'success';
       header("location:index.php");
    }
?>