<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'link', 'guid', 'category', 'creator', 'pubDate', 'contentEncoded', 'image_url', 'first_paragraph', 'credit', 'slug'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'credit','email');
    }

    public function writer()
    {
        return $this->belongsTo(Teacher::class, 'credit','email');
    }
}
