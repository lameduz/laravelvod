<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model {

    protected $table = 'process';

    protected $fillable = ['name','status'];

    public function organisation()
    {
        return $this->belongsTo('App\Organisation');
    }
}