<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id_orderitems';
    public $timestamps = false;
    protected $table = 'orderitems';
}
