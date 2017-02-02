<?php

namespace Controllers;

use Models\User;
use Models\Playground;
use Models\Image;

class Users{
    public static function create_user($user_id, $name) {
        $user = User::create(['user_id'=>$user_id,'name'=>$name]);
        return $user;
    }
    
    public static function get_playgrounds($user_id){
        $playgrounds = Playground::where('user_id', $user_id)->get();
        return $playgrounds;
    }

    // public static function question_count($user_id){
    //     $count = Question::where('user_id',$user_id)->count();
    //     return $count;
    // }
}

?>
