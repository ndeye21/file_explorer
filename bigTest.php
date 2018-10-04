<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <title>Make File (Create, Rename, Move, Delete, Copy) Using PHP</title>   
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
  <style>
    td div {
        display: inline-block;
    }
  
  </style>
  </head>
  <body>
    <p><br/><br/></p>
    <div class="container">
      <?php
        $base1 = 'C:/wamp64/www/';  
        $page = isset($_GET['p'])? $_GET['p'] : '' ;
        if($page == 'add'){        
          if(isset($_POST["title"])){
            $filename = $_POST["title"];
            $txt = $_POST["txt"];
            $myfile = fopen($base1. '/'.$filename, 'w');
            if(fwrite($myfile, $txt)){
              echo "<script>location.href='bigTest.php'</script>";
            }
          }
        ?>
          <form method="post">
            <div class="form-group">
              <input type="text" name="title" class="form-control" placeholder="exp: filename.txt" />
            </div>
             <div class="form-group">
              <textarea name="txt" class="form-control" placeholder="exp: text or article"></textarea>
            </div>
            <input type="submit" value="Create" class="btn btn-primary" />
            <input type="button" value="Back" onclick="location.href='bigTest.php'" class="btn btn-warning" />
          </form>

        <?php
        }else if($page == 'edit'){
          if(isset($_POST["title"])){
            $filename = $_POST["title"];
            $txt = $_POST["txt"];
            $myfile = fopen($base1. '/'.$filename, 'w');
            if(fwrite($myfile, $txt)){
              echo "<script>location.href='bigTest.php'</script>";
            }
          }
        ?>

          <form method="post">
            <div class="form-group">
              <input type="text" name="title" class="form-control" value="<?php echo $_GET['edit']; ?>" />
            </div>
             <div class="form-group">
              <textarea rows="15" cols="40" name="txt" class="form-control"><?php if(readfile($base1.'/'.$_GET['edit'])){echo readfile($base1.'/'.$_GET['edit']); }?></textarea>
            </div>
            <input type="submit" value="Update" class="btn btn-primary" />
            <input type="button" value="Back" onclick="location.href='bigTest.php'" class="btn btn-warning" />
          </form>

        <?php
        }else if($page == 'rename'){
            if(isset($_POST["filename2"])){
            $filename1 = $_POST["filename1"];
            $filename2 = $_POST["filename2"];           
            if(rename($filename1, $filename2)){
              echo "<script>location.href='bigTest.php'</script>";
            }
          }
        ?>
          <form method="post">
            <div class="form-group">
              <input type="text" name="filename1" class="form-control" value="C:/wamp64/www/<?php  echo $_GET['rename']; ?>" />
            </div>
             <div class="form-group">
              <input type="text" name="filename2" class="form-control" value="C:/wamp64/www/yourname.txt" />
            </div>
            <input type="submit" value="Rename/Move" class="btn btn-primary" />
            <input type="button" value="Back" onclick="location.href='bigTest.php'" class="btn btn-warning" />
          </form>
        <?php
        }else if($page == 'copy'){        
             if(isset($_POST["filename2"])){
            $filename1 = $_POST["filename1"];
            $filename2 = $_POST["filename2"];           
            if(copy($filename1, $filename2)){
              echo "<script>location.href='bigTest.php'</script>";
            }
          }
        ?>
          <form method="post">
            <div class="form-group">
              <input type="text" name="filename1" class="form-control" value="C:/wamp64/www/<?php  echo $_GET['copy']; ?>" />
            </div>
             <div class="form-group">
              <input type="text" name="filename2" class="form-control" value="C:/wamp64/www/yourname.txt" />
            </div>
            <input type="submit" value="Copy" class="btn btn-primary" />
            <input type="button" value="Back" onclick="location.href='bigTest.php'" class="btn btn-warning" />
          </form>
        <?php
        }else{
      ?>
      <p><a href="?p=add" class="btn btn-primary">New File</a></p>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th width="40">No</th>
            <th>Name File</th>
            <th width="320">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(isset($_GET['delete'])){
            if(unlink($base1.'/'.$_GET['delete'])){
              echo "<script>location.href='bigTest.php'</script>";
            }
          }         
          if(is_dir($base1)){
            if($dr = opendir($base1)){
              $no = 1;
              while($th = readdir($dr)){
                if($th != '.' && $th != '..'){
            ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $th ?></td>
            <td>
           <div>
              <a href="?edit=<?php echo $th ?>&p=edit" title="editer"><img src="images/edit.png" alt="del" width="50" height="50"> </a>
              </div>
              <div>
              <a href="?rename=<?php echo $th ?>&p=rename" title="renommer/deplacer"><img src="images/rename.png" alt="del" width="50" height="50"></a>
              </div>
              <div>
              <a href="?copy=<?php echo $th ?>&p=copy" title="copier"><img src="images/copy.png" alt="del" width="50" height="50"></a>
              </div>
              <div>
              <a href="?delete=<?php echo $th ?>" title="supprimer" ><img src="images/delete.png" alt="del" width="50" height="50"></a>
              </div>
            </td>
          </tr>
          <?php
                }
              }
            }
          }
          ?>
        </tbody>
      </table>     
      <p><!-New Tap-></p>
        
      <?php
        }
      ?>
      <p><!-End New Tap-></p>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="JS/bootstrap.min.js"></script>
  </body>
</html>﻿