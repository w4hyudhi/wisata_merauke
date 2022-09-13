<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAPORAN SURAT</title>

<style>

hr.new5 {
  border: 1px solid black;
}

table.tb1{
    border-collapse:separate;
    border-spacing:0 10px;
}

td.header {

text-align: center;
}

    td.pading {
padding: 15px 15px 20px 20px;
text-align: left;
}

.customer {
            padding-left: 350px;
        }



        table th,
        table td{
            text-align: left;
        }
        table.layout{
            width: 100%;
            border-collapse: collapse;
        }
        table.display{
            margin: 1em 0;
        }
        table.display th,
        table.display td{
            border: 1px solid #B3BFAA;
            padding: .5em 1em;
        }
​
        table.display th{ background: #D5E0CC; }
        table.display td{ background: #fff; }
​
        table.responsive-table{
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }
</style>
</head>
<body style="font-family: Times New Roman;  font-size: 12px;">


    <div style="padding: 20px">
    <table width="100%" >
        <tr>
            <td align="left" style="width: 10%;">
                {{-- <img src="{{url('/images/logo_icon.png')}}" alt="Logo" width="150" class="logo"/> --}}
                <img src="{{ public_path('/images/logo.png')}}" alt="Logo" width="100" class="logo"/>
            </td>
            <td align="center" class="header">
                <b>  DINAS KEBUDAYAAN DAN PARIWISATA <br></b>
                <b>KABUPATEN MERAUKE <br></b>
                <i> JALAN YOS SUDARSO NO 14<br>
                    NO TELP / FAKS : 0971 324738</i>

            </td>
            <td align="right" style="width: 10%;">

            </td>
        </tr>
    </table>
    <hr class="new5">
    <br/>

    <table width="100%" >
        <tr>
            <td align="center"  class="header">
                <b><u>LAPORAN UMKN DAERAH WISATA</u></b> <br>
           </td>
        </tr>
    </table>
    <h4 align="right" width="100%">{{$data->tanggal}}</h4>
    <table class="layout display responsive-table" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>UMKM</th>
                <th>Jenis Usaha</th>
                <th>Pemilik</th>
                <th>Alamat Pemilik</th>
                <th>Nomer HP</th>
                <th>Letak Lapak</th>
                <th>Tanggal Daftar</th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $index =>$s)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->jenis }}</td>
            <td>{{ $s->pedagang->nama }}</td>
            <td>{{ $s->pedagang->alamat }}</td>
            <td>{{ $s->pedagang->telp }}</td>
            <td>{{ $s->wisata->nama }}</td>
            <td>{{ date('d-m-Y', strtotime($s->tanggal)) }}</td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <br />

    <br /> <br />

    <br/> <br/>
</div>
</body>
</html>

