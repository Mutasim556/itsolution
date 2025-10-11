<?php

namespace App\Models\Admin;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Query\Builder;

class WorkPayment extends Model
{
    protected $guarded = [];
     protected $appends = ['admin_name'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }
    public function getAdminNameAttribute()
    {
        return $this->admin ? $this->admin->name : null;
    }
}
