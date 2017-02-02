<?php

namespace Controllers;

use Models\Image;


class Images{
    // create an Image
    public static function create_image($user_id, $design_id, $fileName){
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
        $image = Image::create(['user_id'=>$user_id, 
                                'design_id'=>$design_id, 
                                'name'=>$fileName, 
                                'type'=>$imageProperties['mime'], 
                                'content'=>$imgData]);
        return $image;
    }

    // delete a single image
    public static function delete_image($user_id, $design_id, $name, $content){
        return false;
    }

    // get a single image
    public static function get_image($user_id, $design_id, $name, $content){
        return false;
    }   
    
    // get all images for a design
    public static function get_playground_images($user_id, $design_id, $name, $content){
        return false;
    }

}

?>