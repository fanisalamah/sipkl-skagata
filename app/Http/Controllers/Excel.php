<?php

namespace App\Http\Controllers;

use App\Imports\AdvisorImport;
use App\Imports\UserImport;
use App\Imports\IndustryImport;
use App\Imports\StudentImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class Excel extends Controller
{
    public function download_local(Request $request) {

        if(Storage::disk('local')->exists("excel/$request->file")) {
            $path = Storage::disk('local')->path("excel/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
            return redirect('/404');
        }

    }

    public function upload_local_advisor(Request $request) {
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('AdvisorData', $namafile);

        FacadesExcel::import(new AdvisorImport, \public_path('/AdvisorData/'.$namafile));

        $notification = array(
            'message' => 'Data berhasil diimport',
            'alert-type' => 'info'
        );
        return \redirect()->back()->with($notification);
    }

    public function upload_local_student(Request $request) {
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('StudentData', $namafile);

        FacadesExcel::import(new StudentImport, \public_path('/StudentData/'.$namafile));

        $notification = array(
            'message' => 'Data berhasil diimport',
            'alert-type' => 'info'
        );
        return \redirect()->back()->with($notification);
    }

    public function upload_local_industry(Request $request) {
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('IndustriData', $namafile);

        FacadesExcel::import(new IndustryImport, \public_path('/IndustriData/'.$namafile));

        $notification = array(
            'message' => 'Data berhasil diimport',
            'alert-type' => 'info'
        );

        return \redirect()->back()->with($notification);
    }
}
