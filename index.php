<?php
    //identifier les fichiers qui ont le même nom
    function triImg(){
        // 
    }


    // creer dossier 
    
    
    //deplacer les images 
    
    
    
    $image_dir = '/Applications/MAMP/htdocs/rangement-image/';

 // code n1

    // class Image {
     
    //     public function nameSubdir($name) {
     
    //         $name = substr($name, 0, -8); 
     
    //         return $name; 
    //     }
     
    //     public function createSubdir($image_dir, $subdir_list) {
     
    //         $subdirs = array_unique($subdir_list);
     
    //         foreach($subdirs as $subdir) {
     
    //             if(!is_dir($image_dir . $subdir)) {
     
    //                 mkdir($image_dir . $subdir, 0755); 
     
    //             } 
    //         } 
     
    //         return $subdirs; 
    //     }
     
    //     public function moveImage($image_dir, $image_list, $subdir_list) {
     
    //         foreach($image_list as $image) {
     
    //             $serie_name = $this->nameSubdir($image);
     
    //             if(in_array($serie_name, $subdir_list)) {
     
    //                 $subdir = $serie_name . '/';
     
    //                 if(is_dir($image_dir . $subdir)) {
     
    //                     rename($image_dir . $image, $image_dir . $subdir . $image); 
    //                 } 
    //             } 
    //         } 
    //     }
     
    //     public function parseDir($image_dir) {
     
    //         if($handle = opendir($image_dir)) {
     
    //             while(false !== ($file = readdir($handle))) {
     
    //                 if($file != "." AND $file != "..") {
     
    //                     if(is_file($image_dir . $file)) {
     
    //                         $images[] = $file; 
     
    //                         $serie_name = $this->nameSubdir($file); 
     
    //                         $subdir[] = $serie_name; 
    //                     } 
     
    //                     elseif(is_dir($image_dir . $file)) {
     
    //                         $subdir[] = $file; 
    //                     } 
    //                 }
    //             } 
     
    //             closedir($handle); 
    //         } 
     
    //         if(!isset($images)) {
     
    //             $images = null;  
    //         }        
     
    //         $files_data = array('image_list' => $images, 'subdir_list' => $subdir); 
     
    //         return $files_data; 
    //     } 
    // }
     
    //code n2

    class Image
{
    public function getImages()
    {
        if($handle = opendir('images'))
        {
            while(false !== ($entry = readdir($handle)))
            {
                if(($entry != '.') and ($entry != '..') and ($entry != '.DS_Store'))
                {
                    $images[] = $entry;             
                }
            }
        }
    closedir($handle);
    return $images;
    }
}




$image = new Image();
$images = $image->getImages($image_dir);

// if(!is_dir($photos))
// {
//     mkdir($photos);
// }
foreach($images as $key => $name)
{
    var_dump($name);
    $explode = explode('-',$name);
    
    if($explode[0] == 'fleur')
    {
        // verifie si le dossier existe (dir c'est dossier)
        //si pas de dossier
        if(!is_dir("images/" . $explode[0]))
        {
            //mkdir va creer le dossier 
            mkdir("images/" . $explode[0]);
            rename("images/" . $name, "images/" . $explode[0] . "/" . $name );
        }
        else
        {
            //sinon deplacer sans creer de dossier
            rename("images/" . $name, "images/" . $explode[0] . "/" . $name );
        }
    }
    elseif($explode[0] == 'peinture')
    {
        if(!is_dir("images/" . $explode[0]))
        {
            mkdir("images/" . $explode[0]);
            rename("images/" . $name, "images/" . $explode[0] . "/" . $name );
        }
        else
        {
            rename("images/" . $name, "images/" . $explode[0] . "/" . $name );
        }
    }
    elseif($explode[0] == 'voyage')
    {
        
        if(!is_dir("images/" . $explode[0]))
        {
            mkdir("images/" . $explode[0]);
            rename("images/" . $name, "images/" . $explode[0] . "/" . $name );
        }
        else
        {
            rename("images/" . $name, "images/" . $explode[0] . "/" . $name );
        }
    }
}

?>


<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Essai de rangement en vain</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        
<h1> Rangement d'images </h1>



    <?php
    // $image = new Image();
    // $images_fleur = $image -> getImages($fleur);
    // $images_peinture = $image -> getImages($peinture);
    // $images_voyage = $image -> getImages($voyage);


    // echo '<h2>Liste des photos des fleurs</h2><ul>' ;

    // foreach($images_fleur as $id => $fleur)
    // {
    //     echo '<li>' .$fleur. '</li>';
    // }
    // ?>
     </ul>

    <?php
    //     echo '<h2>Liste des photos de peintures </h2><ul>' ;

    // foreach($images_peinture as $id => $peinture)
    // {
    //     echo '<li>' .$peinture. '</li>';
    // }
    // ?>
    </ul>

    <?php
    //     echo '<h2>Liste des photos de voyages </h2><ul>' ;

    // foreach($images_voyages as $id => $voyages)
    // {
    //     echo '<li>' .$voyages. '</li>';
    // }
    ?>
    </ul>
    
</body>
</html>