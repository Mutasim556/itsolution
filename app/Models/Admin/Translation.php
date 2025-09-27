<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'translationable_type',
        'translationable_id',
        'locale',
        'key',
        'value',
    ];
     public function language()
    {
        return $this->belongsTo(Language::class, 'locale', 'lang');
    }

    protected $appends = ['LangName'];

    public function getLangNameAttribute()
    {
        return $this->language?->name; // column name in Language table
    }


    public function translationable()
    {
        return $this->morphTo();
    }
}
