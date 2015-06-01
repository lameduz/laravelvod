<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bankaccount extends Model {



    protected $fillable = ['bic','iban'];

    public function organisation()
    {
        return $this->belongsTo('App\Organisation');
    }
}