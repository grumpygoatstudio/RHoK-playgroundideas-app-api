<?php
 
namespace Models;
use \Illuminate\Database\Eloquent\Model;

class Image extends Model {  

    protected $table = 'images';
    protected $fillable = ['design_id', 'name', 'type', 'url'];
    
    public function playground()
    {
        return $this->belongsTo('\Models\Playground');
    }
}
 
?>
