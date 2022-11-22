<?php

namespace App\Models\SQLLite;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;
    use HasUuids;

    protected $connection = 'sqlite';
    protected $fillable = ['name', 'email', 'bio', 'total_books'];
}
