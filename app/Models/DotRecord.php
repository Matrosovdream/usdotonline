<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DotRecord extends Model
{
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

    public function reviews()
    {
        return $this->hasMany(DotRecordReview::class);
    }

    public function getRating()
    {
        $rating = $this->reviews()->avg('rating');
        return round($rating, 1);
    }

    public function getReviewCount()
    {
        return $this->reviews()->count();
    }
    public function getProperties()
    {
        return $this->properties()->get()->pluck('property_value', 'property_name');
    }
    
}
