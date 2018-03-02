<?php
 require_once("config.php");
 require_once("function.php");
 require_once("process-todo.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>

      <div class="container">
        <div class="page-header text-center">
          <h1>To Do List</h1>
        </div>     
        </div>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
           <?php  
             if (isset($_SESSION['msg'])) {
             	echo "<div class='alert alert-success'>".$_SESSION['msg']."</div>";
             	unset($_SESSION['msg']);

             	 }
           ?>
            <table class="table table-hover">
              <tr>
                

                <th>Task Name</th>
                <th>Task Day</th>
                <th>Task Action</th>
                <th>Task Status</th>                
                <th colspan="2">Modify</th>
              </tr>
                 <?php while ($returnDisplay = mysqli_fetch_assoc($runQueryDisplay) ) {?>
              <tr>
                <td><?php echo $returnDisplay['TaskName']; ?></td>
                <td><?php echo $returnDisplay['TaskDay']; ?></td>
                <td><?php echo $returnDisplay['TaskAction']; ?></td>
                <td><?php echo $returnDisplay['TaskStatus']; ?></td>
                <td><a href='index-1.php?edit=<?php echo $returnDisplay["TaskId"] ?>'><span class="fa fa-pencil-square-o"></span></a></td>
                <td><a href="index-1.php?del=<?php echo $returnDisplay['TaskId'] ?>"><span class="fa fa-trash"></span></a></td>
              </tr> 
              <?php } ?>         
            </table>
          </div>
        </div>
        <div class="row">
         <div class="col-sm-8 col-sm-offset-2">
            <form action="index-1.php" method="post" class="form">
              <input type="hidden" name="TaskId" value="<?php echo $TaskId; ?>">
             <div class="form-group">
               <label for="TaskName">Task Name</label>
               <input type="text" name="TaskName" value="<?php echo $TaskName; ?>" id="TasktName" class="form-control">
             </div>
             <div class="form-group">
               <label for="TaskDay">Task Day</label>
               <input type="text" name="TaskDay" value="<?php echo $TaskDay; ?>" id="TaskDay" class="form-control">
             </div>
             <div class="form-group">
               <label for="TaskAction">Task Action</label>
               <input type="text" name="TaskAction" value="<?php echo $TaskAction; ?>" id="TaskAction" class="form-control">
             </div>
            <div class="form-group">
              <label>Task Status</label><br>
				<label>  Done
					<input type="radio" name="TaskStatus" value="Done">
					
				</label><br><br>
				<label> Undone
					<input type="radio" name="TaskStatus" value="Undone">
					
				</label><br><br>
            </div>
            <?php if( $buttonDisplay == false ){?>
               <input type="submit" name="add" value="Add" class="btn btn-success">
            <?php } else{?>
             <input type="submit" name="update" value="Update" class="btn btn-success">
            <?php }?>
           </form>
         </div>
        </div>
      </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>