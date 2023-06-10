<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $fillable = ['user_role_id', 'firstname', 'lastname', 'email', 'password', 'date_of_birth', 'phone'];
    public $timestamps = false;

    public function getFullName()
    {
        return $this->firstname." ".$this->lastname;
    }
}
