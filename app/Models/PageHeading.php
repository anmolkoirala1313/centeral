<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageHeading extends Model
{
    use HasFactory;

    protected $table    = 'page_headings';
    protected $fillable = ['id','type','title','subtitle','description','status','created_by','updated_by'];

}
