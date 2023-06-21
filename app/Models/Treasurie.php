<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasurie extends Model
{
    use HasFactory;
    protected $table = "treasuries";
    protected $fillable = [
        "name",
        "is_master",
        "last_exchange",
        "last_collect",
        "com_code",
        "active",
        "date",
        "added_by",
        "updated_by",
        "created_at",
        "updated_at",
    ];
}
