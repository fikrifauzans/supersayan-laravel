<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Customers;
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


    protected $appends = [
        'customer_name'
    ];




    public function TransactionDetails()
    {
        return $this->hasMany(TransactionDetails::class, 'transaction_id', 'id');
    }


    public function Customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function getCustomerNameAttribute()
    {
        if ($this->customer_id != null) {
            return Customers::find($this->customer_id)->name;
        };
    }
}
