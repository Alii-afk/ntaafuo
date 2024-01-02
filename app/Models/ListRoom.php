<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'imageData1',
        'imageData2',
        'imageData3',
        'rent',
        'terms',
        'city',
        'town',
        'referal',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
