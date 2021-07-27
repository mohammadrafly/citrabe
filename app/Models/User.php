<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Balping\HashSlug\HasHashSlug;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasHashSlug;


    protected $table = 'z_user';

    protected $primaryKey = 'userid';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid',
        'usergroupid',
        'username',
        'userpassword',
        'aktif',
        'ref_userid',
        'RevisionNumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'userpassword',
    ];

    public $incrementing = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        #'email_verified_at' => 'datetime',
    ];

    // attributes to append to JSON response
    protected $appends = ['aktif_label', 'btn_actions'];

    public function scopeActive($query)
    {
        return $query->where('aktif', '1');
    }

    public function getAktifLabelAttribute()
    {
        if ( $this->aktif == '1') {
            return '<span class="badge badge-success text-white font-weight-bold ">Active</span>';
        }else{
            return '<span class="badge badge-danger text-white font-weight-bold ">Non Active</span>';
        }

    }


    public function getBtnActionsAttribute()
    {
        return '<div class="btn-group"><a class="btn btn-secondary" href="'. route('users.edit', ['user' => $this->userid]). '"><i data-feather="box" ></i> Edit</a><a class="btn btn-danger delete" data-url="'. url('users/'. $this->userid). '/delete"><i data-feather="trash" ></i> Delete</button>';
    }

    

}
