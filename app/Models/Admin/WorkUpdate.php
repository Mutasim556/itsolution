<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Query\Builder;

class WorkUpdate extends Model
{
    protected $guarded = [];
    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }
    public function getUpdatesDetailsAttribute($value)
    {
        if (count($this->translations) > 0) {
            foreach ($this->translations as $translation) {
                if ($translation['key'] == 'updates_details') {
                    return $translation['value'];
                }
            }
        }

        return $value;
    }
    public function getUpdatesNoteAttribute($value)
    {
        if (count($this->translations) > 0) {
            foreach ($this->translations as $translation) {
                if ($translation['key'] == 'updates_note') {
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
     public function work(){
        return $this->belongsTo(Work::class,'work_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function payment()
    {
        return $this->belongsTo(WorkPayment::class, 'payment_id', 'id');
    }
}
