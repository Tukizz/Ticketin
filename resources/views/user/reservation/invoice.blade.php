<html>
<head>
<meta charset="UTF-8">    
        <title>Report</title>
</head>
    <style>
        table{
            border-collapse: collapse;
        }
        td,th{
            border: 2px solid;
            border-color: #0f9eed;
        }

        th{
            font-family: calibri;
        }
        td{
            font-family: TimesNewRoman;
        }
        
    </style>
    
<body>
    <table>
    <tr>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>Kelas</th>
        <th>Perihal</th>
        <th>Kritik</th>
        <th>Saran</th>
        
        </tr>
        
        @foreach ($sekolah as $saran)
        <tr>
                    <td>{{$saran->tgl}}</td>
                    <td>{{$saran->nama}}</td>
                    <td>{{$saran->nis}}</td>
                    <td>{{$saran->kelas}}</td>
                    <td>{{$saran->perihal}}</td>
                    <td>{{$saran->kritik}}</td>
                    <td>{{$saran->saran}}</td>
        
        </tr>
        @endforeach
        
    </table>
    
    </body>
    
</html>