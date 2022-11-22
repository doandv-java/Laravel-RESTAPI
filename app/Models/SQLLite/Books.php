<?php

namespace App\Models\SQLLite;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    use HasUuids;

    protected $connection = 'sqlite';
}
