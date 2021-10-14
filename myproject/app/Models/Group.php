<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table = 'groups';

    protected $fillable =['title', 'content','url','image','module','description','parent_id' ];

    public function item()
    {
        return $this->belongsToMany(Item::class, 'groups_items','item_id','group_id');
    }

    public function child()
    {
     return $this->hasMany(Group::class,'parent_id','id');
    }
}
