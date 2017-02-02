<?php

namespace Controllers;

use Models\Playground;
use Models\User;
use Models\Image;

class Playgrounds {
    public static function create_playground($user_id, $design_id) {
        $user = Playground::create(['user_id'=>$user_id,'design_id'=>$design_id, 'screenshot'=>"", 'model'=>""]);
        return $user;
    }

    public static function get_images($design_id, $user_id){
        $playgrounds = Playground::where(['user_id'=>$user_id, 'design_id'=>$design_id])->get();
        return $playgrounds;
    }
}
