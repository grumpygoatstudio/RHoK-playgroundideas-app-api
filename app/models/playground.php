<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;

class Playground extends Model {  

    protected $table = 'playgrounds';
    protected $fillable = ['user_id', 'name', 'created_at', 'updated_at', 'screenshot', 'model'];

    public function images()
    {
        return $this->hasMany('\Models\Image');
    }
     
    public function uesr()
    {
        return $this->belongsTo('\Models\User');
    }
     
}
 
?>
