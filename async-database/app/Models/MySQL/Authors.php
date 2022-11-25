<?php

namespace App\Models\MySQL;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;
    use HasUuids;

    protected $connection = 'mysql';
    protected $fillable = ['name','email','bio'];
}
