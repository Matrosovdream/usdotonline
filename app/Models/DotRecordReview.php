<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DotRecord;

class DotRecordReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'name',
        'review',
        'rating',
        'approved'
    ];

    public function record() {
        return $this->belongsTo(DotRecord::class);
    }

    public function approve() {
        $this->approved = true;
        $this->save();
    }

    public function disapprove() {
        $this->approved = false;
        $this->save();
    }


    public function getRating() {
        return $this->rating;
    }

}
