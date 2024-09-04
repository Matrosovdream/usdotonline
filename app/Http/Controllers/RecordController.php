<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DotRecord;

class RecordController extends Controller
{
    
    public function single(Request $request, $name) {
        
        $record = DotRecord::where('name', $name)->first();

        $record->properties = $record->getProperties();
        $record->addressLink = $this->getAddressLink($record);
        
        if( isset($_GET['debug']) ) {
            dd($record->properties);
        }
        
        return view('user.record', [
            'record' => $record,
            'tabs' => $this->getTabs(),
            'currentTab' => $request->input('tab', 'general')
        ]);
        
    }

    public function index() {

        $recordCount = DotRecord::whereNotNull('created_at')->count();

        $records = DotRecord::whereNotNull('created_at')
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);

        return view('user.records', [
            'recordCount' => $recordCount,
            'records' => $records
        ]);

    }

    public function getAddressLink($record) {

        $address = $record->properties()->where('property_name', 'phy_street')->first();
        $city = $record->properties()->where('property_name', 'phy_city')->first();
        $zip = $record->properties()->where('property_name', 'phy_zip')->first();

        if ($address && $city && $zip) {
            return 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address->property_value . ', ' . $city->property_value . ' ' . $zip->property_value);
        }

        return null; // Return null or an appropriate fallback if any part of the address is missing

    }

    public function createReview(Request $request, $name) {

        //dd($request->all());

        $record = DotRecord::where('name', $name)->first();

        $record->reviews()->create([
            'name' => $request->input('name'),
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
            'approved' => 1 // Approved by default
        ]);

        return redirect()->route('record.single', ['name' => $name, 'tab' => 'reviews']);

    }

    private function getTabs() {

        return [
            'general' => ['slug' => 'general', 'name' => 'General', 'active' => true],
            'reviews' => ['slug' => 'reviews', 'name' => 'Reviews'],
        ];

    }

}
