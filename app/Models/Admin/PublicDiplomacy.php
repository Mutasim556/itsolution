<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Query\Builder;

class PublicDiplomacy extends Model
{
    public function country()
    {
        return $this->belongsTo(CountryRepresentation::class, 'country_id', 'id');
    }
    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }
    public function getTitleAttribute($value)
    {
        if (count($this->translations) > 0) {
            foreach ($this->translations as $translation) {
                if ($translation['key'] == 'title') {
                    return $translation['value'];
                }
            }
        }

        return $value;
    }


    public function getNameAttribute($value)
    {
        if (count($this->translations) > 0) {
            foreach ($this->translations as $translation) {
                if ($translation['key'] == 'name') {
                    return $translation['value'];
                }
            }
        }

        return $value;
    }

    protected static function booted()
    {
        static::addGlobalScope('translate', function (Builder $builder) {
            $builder->with(['translations' => function ($query) {
                return $query->where([['locale', app()->getLocale()]]);
            }]);
        });
    }
}
