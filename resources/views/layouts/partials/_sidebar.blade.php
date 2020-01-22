 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3> 
        <ul class="nav side-menu">
            <!-- Grafik Pertumbuhan -->
            <li><a><i class="fa fa-bar-chart-o"></i> Monitoring Loket <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('/pendaftarLoket') }}">Loket Baru</a></li>
                    <li><a href="{{ url('/byDeposit') }}">Status loket</a></li>
                    <li><a href="{{ url('/manualApprove') }}">Grafik Deposit</a></li>

                </ul>
            </li>
            {{-- <li><a><i class="fa fa-bar-chart-o"></i>Deposit Manual<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('/manualApprove') }}">Approve</a></li>
                    <li><a href="{{ url('/manualReject') }}">Reject</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Deposit Otomatis <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('/otomatisApprove') }}">Approve</a></li>
                    <li><a href="{{ url('/otomatisReject') }}">Reject</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>
<!-- /sidebar menu -->