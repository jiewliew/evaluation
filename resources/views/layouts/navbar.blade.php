
    <html>

    
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li>
                        <a href="admission.php"><i class="menu-icon fa fa-laptop"></i>รับสมัครนักเรียน </a>
                    </li> -->
                    <!--li class="menu-title">UI elements</li-->
                    <!-- /.menu-title -->
                    <li class="menu-item-has-children   {{ request()->is('register') ? 'active' : '' }}">
                        <a href="{{route('register')}}"  aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-table"></i>ลงทะเบียนนักเรียน</a>
                        
                    </li>
                    <li class="menu-item-has-children  {{ request()->is('listregister') ? 'active' : '' }} ">
                        <a href="{{route('listregister')}}"  aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-table"></i>ข้อมูลผู้สมัคร</a>
                        
                    </li>

                   
                    <li class="menu-item-has-children {{ request()->is('student') ? 'active' : '' }} ">
                        <a href="{{route('student')}}"  aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-table"></i>ข้อมูลนักเรียน</a>
                     
                    </li>
                    <li class="menu-item-has-children   {{ request()->is('teacher') ? 'active' : '' }}">
                        <a href="{{route('teacher')}}" 
                            > <i class="menu-icon fa fa-id-card-o"></i>ข้อมูลบุคลากร</a>
                     
                    </li>



                    <li class="menu-title">ประเมินนักเรียน</li><!-- /.menu-title -->


                    <li class="menu-item-has-children {{ request()->is('studentme') ? 'active' : '' }} ">
                        <a href="{{route('studentme')}}"  aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-table"></i>นักเรียนที่ดูแล</a>
                     
                    </li>
    
                    <li class="menu-item-has-children {{ request()->is('insurance') ? 'active' : '' }} ">
                        <a href="{{route('insurance')}}"  aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-table"></i>ประเมิน</a>
                     
                    </li>

                    <li class="menu-item-has-children {{ request()->is('datainsurance') ? 'active' : '' }} ">
                        <a href="{{route('datainsurance')}}"  aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-table"></i>ข้อมูลการประเมิน</a>
                     
                    </li>

                    <li class="menu-title">ตั้งค่า</li><!-- /.menu-title -->


                 
    
                    <li class="menu-item-has-children  dropdown ">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-id-card-o"></i>ข้อมูลแบบประเมิน</a>
                        <ul class="sub-menu children dropdown-menu {{ request()->is('dataquestion') ? 'show' : '' }}">
                            <li class="{{ request()->is('dataquestion') ? 'active' : '' }}"><i class="menu-icon fa fa-th "></i><a href="{{route('dataquestion')}}">หัวข้อแบบประเมิน</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{route('datatype')}}">ประเภทพัฒนาการ</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{route('dataassessment')}}">ข้อมูลคำถาม</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children {{ request()->is('news') ? 'active' : '' }} ">
                        <a href="{{route('news')}}"  aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-table"></i>ข่าวสาร</a>
                     
                    </li>
                    <li>
                        <a href="{{route('logout')}}"> <i class="menu-icon fa fa-id-badge"></i>ออกจากระบบ </a>
                    </li>
                    <!-- <li>
                        <a href="addnews.php"> <i class="menu-icon ti-email"></i>ข่าว</a>
                    </li>
                    <li>
                        <a href="chart.php"> <i class="menu-icon fa fa-line-chart"></i>กราฟ</a>
                    </li>
                    <li>
                        <a href="widgets.html"> <i class="menu-icon fa fa-street-view"></i>แผนที่</a>
                    </li> -->

                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>

        </header><!-- /header -->

      </div>
        <!-- /#header -->
        <!-- Content -->

                <!-- /.orders -->
                <!-- To Do and Live Chat -->
 </html>
    <!-- Scripts -->

    <!--Local Stuff-->
