<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

    protected $fillable = ['name','mime','path'];

    public function organisation()
    {
        return $this->belongsTo('App\Organisation');
    }

    public function isArchived()
    {
        if($this->archived == 1) return true;
        return false;

    }

}
