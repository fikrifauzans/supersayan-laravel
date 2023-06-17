<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/*
|--------------------------------------------------------------------------|
| Supersayan Initator                                                      |
|--------------------------------------------------------------------------|
| This page gererated by Fikri Fauzan in Supersayan initator function.     |
| if you have question, you can contact me as administrator by email in    |
| fikrifauzans.goku@gmail.com - @Supersayan Basecode Architecture          |
|                                                                          |
| generate in 2023-06-17T14:43                                             |
|--------------------------------------------------------------------------|
*/
class Transactions extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var code string 
* @var date dateTime 
* @var customer_id integer 
* @var subtotal double 
* @var discount double 
* @var ongkir double 
* @var total double 
*/
    protected $table =  'transactions';
    protected $fillable = [
'code',  
'date',  
'customer_id',  
'subtotal',  
'discount',  
'ongkir',  
'total',  

    ];


    protected $hidden = [];

    public $searchable = [
'code',  
'date',  
'customer_id',  
'subtotal',  
'discount',  
'ongkir',  
'total',  

    ];
}

            