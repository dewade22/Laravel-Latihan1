<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasesLine extends Model
{
    protected $table = 'PurchasesLine';
    protected $primaryKey = 'PurchaseLineID';
    protected $guarded = ['PurchaseLineID'];
    const CREATED_AT = 'CreatedTime';
    const UPDATED_AT = 'LastModifiedTime';
}
