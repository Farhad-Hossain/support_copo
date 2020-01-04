<div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                            <i class="ace-icon fa fa-signal"></i>
                        </button>

                        <button class="btn btn-info">
                            <i class="ace-icon fa fa-pencil"></i>
                        </button>

                        <button class="btn btn-warning">
                            <i class="ace-icon fa fa-users"></i>
                        </button>

                        <button class="btn btn-danger">
                            <i class="ace-icon fa fa-cogs"></i>
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->

                <ul class="nav nav-list">
                    <li class="active">
                        <a href="{{ route('backend.dashboard') }}">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                                Enqueries
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="{{ route('backend.todays_enquery') }}">
                                        Today
                                </a>
                            </li>
                        </ul>
                        <ul class="submenu">
                            <li class="">
                                <a href="{{ route('backend.archieved_enqueries') }}">
                                        Archieved
                                </a>
                            </li>
                        </ul>
                        <ul class="submenu">
                            <li class="">
                                <a href="{{ route('backend.trashed_enqueries') }}">
                                        Trashes
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text">Boards</span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="{{ route('backend.board_list') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    List
                                </a>
                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="{{ route('backend.add_board') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text">EIIN</span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="{{route('backend.eiin_list')}}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    EIIN List
                                </a>

                                <b class="arrow"></b>
                            </li>

                            
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text">Services</span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="{{ route('backend.services') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Service List
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="{{ route('backend.add_service') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Service
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="{{ route('backend.upcoming') }}">
                            <i class="menu-icon fa fa-picture-o"></i>
                            <span class="menu-text"> Others </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul><!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>