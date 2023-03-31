<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        table.static {
            position: relative;
            border:1px solid black;
        }
    </style>


    <title>Export Logbook</title>
</head>
<body>
    <div class="form-group">
        <p align="center"> <b> Logbook Kegiatan Praktik Kerja Lapangan </b> </p>
        <p align="center">
                @foreach($internships as $key => $internship)
                <table align="center">
                    <tr>
                        <td width="25%">Nama : {{ Auth::user()->name }}&emsp;</td>
                        <td>Industri : {{ $internship->industries->name }}&emsp;<br></td>
                        <td>Advisor : {{ $internship->advisors->name }}  <br></td>
                    </tr>
                    <tr>
                        <td width="25%">NIS : {{ Auth::user()->nis }}&emsp;</td>
                        <td>Alamat : {{ $internship->industries->address }}&emsp;</td>
                        <td>Jurusan : {{ Auth::user()->departement->name }}</td>
                    </tr>
                </table>
                @endforeach
        </p>
        
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">

        </table>
    </div>
    
</body>
</html>