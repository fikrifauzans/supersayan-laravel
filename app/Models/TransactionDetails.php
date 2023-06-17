<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Products;
use App\Models\Transactions;
/*
|--------------------------------------------------------------------------|
| Supersayan Initator                                                      |
|--------------------------------------------------------------------------|
| This page gererated by Fikri Fauzan in Supersayan initator function.     |
| if you have question, you can contact me as administrator by email in    |
| fikrifauzans.goku@gmail.com - @Supersayan Basecode Architecture          |
|                                                                          |
| generate in 2023-06-17T19:18                                             |
|--------------------------------------------------------------------------|
*/

class TransactionDetails extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var transaction_id integer 
     * @var product_id integer 
     * @var price double 
     * @var qty integer 
     * @var last_stock integer 
     * @var discount_in_percent double 
     * @var discount_in_rupiah double 
     * @var amount double 
     * @var total double 
     */
    protected $table =  'transaction_details';
    protected $fillable = [
        'transaction_id',
        'product_id',
        'price',
        'qty',
        'last_stock',
        'discount_in_percent',
        'discount_in_rupiah',
        'amount',
        'total',

    ];


    protected $hidden = [];

    public $searchable = [
        'transaction_id',
        'product_id',
        'price',
        'qty',
        'last_stock',
        'discount_in_percent',
        'discount_in_rupiah',
        'amount',
        'total',

    ];

    protected $appends = [
        'transaction_code',
        'product_name'
    ];


    public function Product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    public function Transaction()
    {
        return $this->belongsTo(Transactions::class, 'transaction_id', 'id');
    }

    public function getTransactionCodeAttribute()
    {
        if ($this->transaction_id != null) {
            return Transactions::find($this->transaction_id)->code;
        };
    }
    public function getProductNameAttribute()
    {
        if ($this->product_id != null) {
            return Products::find($this->product_id)->name;
        };
    }
}
