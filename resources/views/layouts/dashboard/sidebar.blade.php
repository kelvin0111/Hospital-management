<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="active">
                    <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>

                <li>
                    <a href="{{ route('Patient-appointment') }}"><i class="fa fa-calendar"></i>
                        <span>Appointments</span></a>
                </li>

                <li>
                    <a href="{{ route('Patient-Reports') }}"><i class="fa fa-flag-o"></i> <span>Reports</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('Patient-invoices') }}">Invoices</a></li>
                    </ul>
                </li>

                <li>
                    {{-- <a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a> --}}
                </li>

            </ul>
        </div>
    </div>
</div>
