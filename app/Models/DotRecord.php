<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DotRecord extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'source_id'];
    //protected $table = 'dot_records';

    public function source()
    {
        return $this->belongsTo(DotRecordSource::class);
    }

    public function properties()
    {
        return $this->hasMany(DotRecordProperty::class);
    }

}
