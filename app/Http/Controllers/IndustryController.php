<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function industriData() {
        $data['allData'] = Industry::all();
        return view('industry.industry-data', $data);
    }

    public function industriDataAdv() {
        $data['allData'] = Industry::all();
        return view('advisor.industry-view.industry-data', $data);
    }

    public function addIndustri() {
        $data['industry'] = Industry::all();

        return view('industry.industry-add', $data );
    }

    public function addIndustriAdv() {
        $data['industry'] = Industry::all();
        return view('advisor.industry-view.industry-add', $data );
    }

    public function editIndustri($id) {

        $editData['industries']= Industry::find($id);
        return view('industry.industry-edit', compact('editData'));

    }

    public function editIndustriAdv($id) {

        $editData['industries']= Industry::find($id);
        return view('advisor.industry-view.industry-edit', compact('editData'));

    }

    public function storeIndustri(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:industries',
            'address' => 'required',

        ]);

        $data = new Industry();
        $data->name = $request->name;
        $data->address = $request->address;
        $data->save();
        $notification = array(
            'message' => 'Data industri berhasil ditambahkan',
            'alert-type' => 'success'
        );
        
        return redirect()->route('industri.data')->with($notification);


    }

    public function storeIndustriAdv(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:industries',
            'address' => 'required',

        ]);

        $data = new Industry();
        $data->name = $request->name;
        $data->address = $request->address;
        $data->save();
        $notification = array(
            'message' => 'Data industri berhasil ditambahkan',
            'alert-type' => 'success'
        );
        
        return redirect()->route('advisor.industri.data')->with($notification);

    }

    public function updateIndustri(Request $request, $id) {

        $data = Industry::find($id);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->save();
        $notification = array(
            'message' => 'Data industri berhasil diupdate',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
    }

    public function updateIndustriAdv(Request $request, $id) {

        $data = Industry::find($id);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->save();
        $notification = array(
            'message' => 'Data industri berhasil diupdate',
            'alert-type' => 'success'
        );

        return redirect()->route('advisor.industri.data')->with($notification);
        
    }

    public function deleteIndustri($id) {
        $industri = Industry::find($id);
        $industri->delete();
        return redirect()->back();
    }
}
