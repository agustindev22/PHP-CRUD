<?php  include("db.php")?>

<?php  include("header.php")?>
 <section class="container p-4">
    
    <div class="row">
         
           <?php if(isset($_SESSION['message'])){?>
             
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
             <?= $_SESSION['message']?>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>

            <?php  session_unset(); }?>
            
          <div class="col-md-4">
             <div class="card card-body">
                <form action="save-task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Titulo" autofocus >
                        <br/>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion"  rows="2" class="form-control" placeholder="Descripcion" ></textarea>
                        <br/>
                    </div>
                    <input type="submit" value="Enviar👌" class="btn btn-success btn-block" name="save-task">
                </form>
             </div>
                   
          </div>

          <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripciones</th>
                            <th>Fecha de Creacion</th>
                            <th> Acciones</th>
                        </tr>
                    </thead>
                     <tbody>
                         <?php
                         $query= "SELECT * FROM task";
                         $result_tasks = mysqli_query($conn, $query);
                         while($row = mysqli_fetch_array($result_tasks)){ ?>
                               <tr>
                                <td><?php  echo $row['title'];?></td>
                                <td><?php  echo $row['descripcion'];?></td>
                                <td><?php  echo $row['created-at'];?></td>

                                  <td>
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $row['id']?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger" href="delete-task.php?id=<?php echo $row['id']?>"><i class="fa fa-close"></i></a>
                                  </td>
                                                                  
                               </tr>
                         <?php }; ?>
                     </tbody>
                </table>
          </div>

     </div>

 </section>

<?php  include("footer.php")?>