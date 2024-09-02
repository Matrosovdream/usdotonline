<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DotRecord;

class FrontPage extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $records = DotRecord::where('name', $request->search)->paginate(5);
        } else {
            $records = [];
        }

        foreach ($records as $record) {
            $record->properties = $record->properties()->get()->pluck('property_value', 'property_name');
        }

        return view('welcome', [
            'records' => $records
        ]);
    }

}
