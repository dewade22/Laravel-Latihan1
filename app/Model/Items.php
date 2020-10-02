<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'Items';
    protected $primaryKey = 'ItemNo';
    protected $guarded = 'ItemNo';
    const CREATED_AT = 'CreatedTime';
    const UPDATED_AT = 'LastModifiedTime';
}
