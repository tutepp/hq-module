<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
    protected $table = 'groups_items';

    protected $fillable =['id','group_id','item_id'];

}
