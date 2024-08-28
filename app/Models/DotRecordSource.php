<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DotRecordSource extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
    //protected $table = 'dot_record_sources';

    public function records()
    {
        return $this->hasMany(DotRecord::class);
    }


}
