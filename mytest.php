<?php
/**
 * show folders and files
 */
function show_folders() {
    $folder = "";
    if(isset($_GET['folder'])) {
        $folder = "C:/wamp64/www/visualstudio/" . $_GET['folder'] . "/";
    }
    else {
        $folder = "C:/wamp64/www/visualstudio/";
    }
    test($folder); 
    // create_folder("zozo");
    // delete_folder("zozo");
    rename_folder("js" , "JS");

                
}
function test($folder_path) {
    echo '<ul>';
    if($dossier = opendir($folder_path)) {
        while(false !== $fichier = readdir($dossier)) {
            if($fichier != '.' && $fichier != "..") {
                if(is_dir($folder_path . '' . $fichier)) {
                    if(isset($_GET['folder'])) {
                        ?>
                        <a href="index.php?folder=<?= $_GET['folder']  . '/' . $fichier ?>" class="folder_style">
                            <img src="images/icone_dossier.png" alt="" width="30" height="30">
                            <p style="font-size: 14px;"><?= $fichier ?></p>
                        </a>
                        <?php
                    }
                    else {
                        ?>
                        <a href="index.php?folder=<?= $fichier ?>">
                            <img src="images/icone_dossier.png" alt="" width="30" height="30">
                            <p style="font-size: 14px;"><?= $fichier ?></p>
                        </a>
                        <?php
                    }
                }
                else {
                    ?>

                        <img src="images/logof.png" alt="" width="40" height="40">
                        <p style="font-size: 14px;"><?= $fichier ?></p>
                    
                    <?php  
                    //echo '<li>"' . $fichier . '"</li>';
                }
            }
        }
        closedir($dossier);
    }
    echo '</ul>';
}
/**
 * create new folder
 * @param string folder name
 */
function create_folder($folderName) {
   
    if(!file_exists($folderName)) {
        mkdir($folderName, 0777, true);
    }
  
}

function delete_folder($folderName) {
   
    if(is_dir($folderName)) {
        rmdir($folderName);
    }
  
}

function rename_folder($oldName , $newName) {
   
    if(is_dir($oldName)) {
        rename ($oldName,$newName );
    }
  
}

?>