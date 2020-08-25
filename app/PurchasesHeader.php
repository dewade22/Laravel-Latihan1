<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasesHeader extends Model
{
    protected $table = 'PurchasesHeader';
    protected $primaryKey = 'PurchaseHeaderID';
    protected $guarded = ['PurchaseHeaderID'];
    const CREATED_AT = 'CreatedTime';
    const UPDATED_AT = 'LastModifiedTime';
}
?>