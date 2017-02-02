<?php
 
namespace Models;
use \Illuminate\Database\Eloquent\Model;

class Image extends Model {  

    protected $table = 'assets';
    protected $fillable = ['design_id', 'name', 'content'];
    
    public function playground()
    {
        return $this->belongsTo('\Models\Playground');
    }
}
 
?>
