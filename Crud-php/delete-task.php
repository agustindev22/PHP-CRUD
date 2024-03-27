<?php 
 include("db.php");

 if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query="DELETE FROM task WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("Error no hay ningun resultado!!");
    }
    $_SESSION['message'] = 'Tu tarea fue eliminada correctamente👍';
    $_SESSION['message_type'] = 'danger';
    header("location:index.php");
 }

?>