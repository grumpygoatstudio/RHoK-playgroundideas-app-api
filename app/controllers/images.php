<?php

namespace Controllers;

use Models\Image;


class Images{
    // create an Image
    public static function create_image($user_id, $design_id, $fileName, $type, $contents){
        $image = Image::create(['user_id'=>$user_id, 
                                'design_id'=>$design_id, 
                                'name'=>$fileName, 
                                'type'=>$type, 
                                'contents'=>$contents]);
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