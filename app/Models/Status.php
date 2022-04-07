<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const TODO = 0;
    const INPROGRESS = 1;
    const DONE = 2;
}
