<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
      'name','number','active','image','category','descri'
    ];
    //
    // public $rules = [
    //   'name'      => 'required|min:2|max:100',
    //   'number'    => 'required|min:1|max:99999|numeric',
    //   'category'  => 'required',
    //   'descri'    => 'min:3|max:1000',
    // ];
}
