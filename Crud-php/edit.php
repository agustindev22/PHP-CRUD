<?php
 include("db.php");

 if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id=$id";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $title = $row ['title'];
        $descripcion = $row['descripcion'];
    
    };
 }
 
  if(isset($_POST['guardar'])){
    $id=$_GET['id'];
    $title=$_POST['title'];
    $descripcion=$_POST['descripcion'];

   $query= " UPDATE task set title ='$title', descripcion='$descripcion'  WHERE id =$id";
   mysqli_query($conn, $query);

   $_SESSION['message'] = 'La tarea fue actualizada Correctamente';
   $_SESSION['message_type'] ='info';
   header("location:index.php");
  }


?>


<?php include("header.php")?>
  
<section class="container p-4">
  
      <div class="row">
        <div class="col-md-4 mx-auto">
            <article class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'];?>"  method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title ;?>" class="form-control" placeholder="Cabiar Titulo">
                        <br/>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Cambiar descripcion" ><?php echo $descripcion;?></textarea>
                        <br/>
                    </div>
                    <button type="submit" class="btn btn-success" name="guardar">Guardar👌</button>
                </form>
            </article>
        </div>
      </div>

</section>

<?php include("footer.php")?>