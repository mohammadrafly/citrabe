<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    public $incrementing = false;
    
    protected $table = 'z_usergroup';

    protected $primaryKey = 'usergroupid';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usergroupid',
        'usergroupname',
    ];

    protected $appends = ['btn_actions'];

    public function getBtnActionsAttribute()
    {
        return '<div class="btn-group"><a class="btn btn-secondary" href="'. route('group.edit', ['group' => $this->usergroupid]). '"><i data-feather="box" ></i> Edit</a><a class="btn btn-danger delete" data-url="'. url('group/'. $this->usergroupid). '/delete"><i data-feather="trash" ></i> Delete</button>';
    }

}
