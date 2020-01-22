@extends('layouts.default')
@section('content')


<div align="center" class="container">
    <ul class="nav navbar-nav navbar-left">
        <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                Option
                <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-left">
                <li>
                    <a href="{{ url('/manualApprove') }}">Manual</a>
                    <a href="{{ url('/otomatisApprove') }}">Otomatis</a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-left">
        <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                Status
                <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-left">
                <li>
                    <a href="{{ url('/manualApprove') }}">Approve</a>
                    <a href="{{ url('/manualReject') }}">Reject</a>
                </li>
            </ul>
        </li>
    </ul>
    <form action="/manualReject" method="GET" align="right">
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
    <div id="chartManual"></div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
            Highcharts.chart('chartManual', {
                chart: {
                type: 'column' 
            },
            title: {
                text: 'Grafik Deposit Manual Status Reject'
            },
            xAxis: {
                categories: {!! json_encode($category) !!}, 
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'jumlah deposit manual'
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


