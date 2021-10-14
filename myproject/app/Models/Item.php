<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable =['title', 'content','url','image','module','description','author_id','slug','position','status'];

    public function group()
    {
        return $this->belongsToMany(Group::class, 'groups_items','group_id','item_id');
    }
    public function user ()
    {
        return $this->belongsTo(User::class, 'author_id','id');
    }
}
