<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemLedgerEntry extends Model
{
    protected $table = 'ItemLedgerEntry';
    protected $primaryKey = 'ItemLedgerEntryID';
    protected $guarded = 'ItemLedgerEntryID';
    const CREATED_AT = 'CreatedTime';
    const UPDATED_AT ='LastModifiedTime';
}
