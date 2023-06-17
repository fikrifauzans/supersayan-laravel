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
| generate in 2023-06-17T15:45                                             |
|--------------------------------------------------------------------------|
*/
class TransactionDetails extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var transaction_id integer 
* @var barang_id integer 
* @var price double 
* @var qty integer 
* @var discount_in_percent double 
* @var discount_in_rupiah double 
* @var amount double 
* @var total double 
*/
    protected $table =  'transaction_details';
    protected $fillable = [
'transaction_id',  
'barang_id',  
'price',  
'qty',  
'discount_in_percent',  
'discount_in_rupiah',  
'amount',  
'total',  

    ];


    protected $hidden = [];

    public $searchable = [
'transaction_id',  
'barang_id',  
'price',  
'qty',  
'discount_in_percent',  
'discount_in_rupiah',  
'amount',  
'total',  

    ];
}

            