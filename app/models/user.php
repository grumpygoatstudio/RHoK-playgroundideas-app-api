<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;

class User extends Model {  

    protected $table = 'users';     
    protected $fillable = ['user_id', 'name', 'created_at', 'updated_at'];

    public function playgrounds()
    {
        return $this->hasMany('\Models\Playground');
    }
}

?>
