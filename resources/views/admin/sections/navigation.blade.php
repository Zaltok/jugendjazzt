<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ auth()->user()->avatar }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3>Jugend Jazzt 2017</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.anmeldungenuebersicht') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            Anmeldungen
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Einstellungen</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.veranstaltungen') }}">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                         Veranstaltungen
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                           Users
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.teilnehmer') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                           Teilnehmer
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->
    </div>
</div>
