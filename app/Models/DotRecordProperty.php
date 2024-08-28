<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DotRecordProperty extends Model
{
    use HasFactory;
    //protected $table = 'dot_record_properties';
    protected $fillable = ['property_name', 'property_value', 'record_id'];

    public function record()
    {
        return $this->belongsTo(DotRecord::class);
    }

    



}
