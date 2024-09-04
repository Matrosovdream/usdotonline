<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DotRecord;

class FrontPageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $records = DotRecord::where('name', $request->search)->paginate(5);
        } else {
            $records = [];
        }

        foreach ($records as $record) {
            $record = $this->prepareProperties($record);
        }

        return view('user.welcome', [
            'is_search' => $request->search ? true : false,
            'records' => $records
        ]);
    }

    private function prepareProperties( $record ) {
        
        $record->properties = $record->properties()->get()->pluck('property_value', 'property_name');
        return $record;

    }

}
