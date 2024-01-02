<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'firstName',
        'lastName',
        'profilePicture',
        'tagOne',
        'tagTwo',
        'tagThree',
        'telephoneNo',
        'dateOfBirth',
        'gender',
        'sexualOrientation',
        'city',
        'town',
        'socialOne',
        'socialTwo',
        'referal',
        'brandAmbassador',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
