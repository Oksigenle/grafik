@extends('layouts.default')
@section('content')


<div align="center"  class="container">
    <form action="/pendaftarLoket"  method="GET" align="right">
        <select name="year">
            <option value="0" selected> Pilih Tahun</option>
            <?php 
                $year = date('Y');
                $min = $year - 10; 
                $max = $year;
                for( $i=$max; $i>=$min; $i-- ) {
                    echo '<option value='.$i.'>'.$i.'</option>';
                }
            ?>
        </select>
        <input type="submit" class="btn btn-info" value="CEK">
    </form>
    <div id="chartPertumbuhan"></div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
            Highcharts.chart('chartPertumbuhan', {
                chart: {
                type: 'column'
            },
            title: {
                text: 'PENDAFTAR LOKET'
            },
            xAxis: {
                categories: {!! json_encode($category) !!}, 
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'jumlah pendaftar loket'
                }
            },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
                },
                series: {!! json_encode($series) !!}
            });

        </script>
@endsection

