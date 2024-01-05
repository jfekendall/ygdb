
<body>
    <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
        <aside id="side-overlay">
            <div id="side-overlay-scroll">
                <div class="side-header side-content">
                    <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-times"></i>
                    </button>
                    <span>
                        <img class="img-avatar img-avatar32" src="<?php echo $profile['profile_pic']; ?>" alt="">
                        <span class="font-w600 push-10-l"><?php echo $username ?></span>
                    </span>
                </div>
            </div>
        </aside>
        <nav id="sidebar">
            <div id="sidebar-scroll">
                <div class="sidebar-content">
                    <div class="side-header side-content bg-white-op">
                        <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times"></i>
                        </button>
                        <a class="h5 text-white" href="<?php echo base_url(); ?>">
                            <span class="h4 font-w600"><span class="text-primary">Y</span><span class="sidebar-mini-hide">GDB</span></span>
                        </a>
                    </div>
                    <div class="side-content side-content-full">
                        <ul class="nav-main">
                            <li>
                                <a href="<?php echo base_url(); ?>"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Your Profile</span></a>
                            </li>
                            <li class="nav-main-heading"><span class="sidebar-mini-hide">Your Stuff</span></li>
                            <li id='manage-collections-dropdown'>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                                    <i class="si si-badge"></i>
                                    <span class="sidebar-mini-hide">Manage Collections</span></a>
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url(); ?>collection/add"><i class='fa fa-plus'></i> Add New</a>
                                    </li>
                                    <?php foreach ($yourSystems AS $system) { ?>
                                        <li><a href="<?php echo base_url(); ?>collection/manage/<?php echo $system['system_name']; ?>"><?php echo $system['system_name']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>>
        </nav>
        <header id="header-navbar" class="content-mini content-mini-full">
            <ul class="nav-header pull-right">
                <li>
                    <div class="btn-group">
                        <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                            <img src="<?php echo $profile['profile_pic'] ?>" alt="Avatar">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-header">Profile</li>
                            <li>
                                <a tabindex="-1" href="javascript:void(0)">
                                    <i class="si si-settings pull-right"></i>Settings
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Actions</li>
                            <li>
                                <a tabindex="-1" href="/logoff">
                                    <i class="si si-logout pull-right"></i>Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="nav-header pull-left">
                <li class="hidden-md hidden-lg">
                    <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                        <i class="fa fa-navicon"></i>
                    </button>
                </li>
                <li class="hidden-xs hidden-sm">
                    <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                        <i class="fa fa-ellipsis-v"></i>
                    </button>
                </li>
                <li class="visible-xs">
                    <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </li>
                <!--<li class="js-header-search header-search">
                    <form class="form-horizontal" action="base_pages_search.html" method="post">
                        <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                            <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search..">
                            <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                        </div>
                    </form>
                </li>-->
            </ul>
        </header>