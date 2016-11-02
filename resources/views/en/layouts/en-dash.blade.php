<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Waselaty Dashboard</title>
    <!-- Bootstrap Styles-->
    {!! HTML::style('en-assets/css/bootstrap.css') !!}
    <!-- FontAwesome Styles-->
    {!! HTML::style('en-assets/css/font-awesome.css') !!}
    <!-- Morris Chart Styles-->
    {!! HTML::style('en-assets/js/morris/morris-0.4.3.min.css') !!}
    <!-- Custom Styles-->
    {!! HTML::style('en-assets/css/custom-styles-ar.css') !!}
    <!-- Google Fonts-->

    <!-- Date and time pickers
    {!! HTML::style('assets/css/timepicker.less') !!}
    {!! HTML::style('assets/css/bootstrap-datepicker3.min.css') !!}
    -->
    {!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans') !!}
    {!! HTML::script('https://use.fontawesome.com/98bba3ab93.js') !!}
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('dash') }}" style="font-size:27px">Waselaty Admin</a>
            </div>

            <ul class="nav navbar-top-links navbar-left">
                
                <li class="dropdown">
                    <a href="{{ url('/logout') }}">
                        <i class="fa fa-sign-out fa-fw"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('ar-dash') }}" >العربية</a>
                </li>                
  
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="{{ URL::to('dash') }}"><i class="fa fa-cube" aria-hidden="true"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> Ads. Wating For Approve<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="{{ URL::to('company-pending') }}"><i class="fa fa-cube" aria-hidden="true"></i> Companies Ads. </a>  
                            </li>
                            <li>
                              <a href="{{ URL::to('person-pending') }}"><i class="fa fa-cube" aria-hidden="true"></i> Persons Ads.</a>
                            </li>
                        </ul>
                    </li>
            @if (Session::get('role') == 'super')                    
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> All Ads.<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="{{ URL::to('company-status') }}"><i class="fa fa-cube" aria-hidden="true"></i> Companies Ads. </a>  
                            </li>
                            <li>
                              <a href="{{ URL::to('person-status') }}"><i class="fa fa-cube" aria-hidden="true"></i> Persons Ads.</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> Main Sections<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="{{ URL::to('mcategory/create') }}"><i class="fa fa-cube" aria-hidden="true"></i> New Main Section </a>  
                            </li>
                            <li>
                              <a href="{{ URL::to('mcategory-edit') }}"><i class="fa fa-cube" aria-hidden="true"></i> Edit and Delete Section</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> Jobs Sections<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="{{ URL::to('categories/create') }}"><i class="fa fa-cube" aria-hidden="true"></i> New Section </a>  
                            </li>
                            <li>
                              <a href="{{ URL::to('category-edit') }}"><i class="fa fa-cube" aria-hidden="true"></i> Delete Section</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> Countries<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="{{ URL::to('countries/create') }}"><i class="fa fa-cube" aria-hidden="true"></i> New Country </a>  
                            </li>
                            <li>
                              <a href="{{ URL::to('country-edit') }}"><i class="fa fa-cube" aria-hidden="true"></i> Delete Country</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> Banners Prices<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="{{ URL::to('prices/create') }}"><i class="fa fa-cube" aria-hidden="true"></i> Insert New Price </a>
                            </li>
                            <li>
                              <a href="{{ URL::to('prices') }}"><i class="fa fa-cube" aria-hidden="true"></i> Prices Edit</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i>Registered Accounts <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="{{ URL::to('company-list') }}"><i class="fa fa-cube" aria-hidden="true"></i> Companies Accounts </a>  
                            </li>
                            <li>
                              <a href="{{ URL::to('person-list') }}"><i class="fa fa-cube" aria-hidden="true"></i> Persons Accounts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> Create/Remove Admin<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="{{ URL::to('new-admin') }}"><i class="fa fa-cube" aria-hidden="true"></i> Create New Admin </a>  
                            </li>
                            <li>
                              <a href="{{ URL::to('admin-list') }}"><i class="fa fa-cube" aria-hidden="true"></i> Remove Admin</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> Website Banners<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="{{ URL::to('sections-banners') }}"><i class="fa fa-cube" aria-hidden="true"></i> Update Sections Banners </a>  
                            </li>
                            <li>
                              <a href="{{ URL::to('jobs-banners') }}"><i class="fa fa-cube" aria-hidden="true"></i> Update Jobs Banners</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> Website Content<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="{{ URL::to('site-content') }}"><i class="fa fa-cube" aria-hidden="true"></i> Update Polices </a>  
                            </li>
                            <li>
                              <a href="{{ URL::to('back-n-social') }}"><i class="fa fa-cube" aria-hidden="true"></i> Slider & Social Media</a>
                            </li>
                        </ul>
                    </li>
            @endif                   
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard 
                        </h1>
                        
                        @if (Session::has('message'))
                        <div id="message" class='alert alert-success'>
                            <p><h1> {!! Session::get('message') !!} </h1></p> 
                         </div>
                         @endif
                        @yield('content')
                    </div>
                </div>
                <!-- /. ROW  -->

				<footer><p>-----------------------------<br>
                All rights reserved, Dashboard by: <a href="http://yisweb.com">YISWEB</a></p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->

 
    {!! HTML::script('en-assets/js/jquery-1.10.2.js') !!}

    <!-- Bootstrap Js -->   
<!--
<script>
    $(function(){
  
        $('#sandbox-container input').datepicker({
           
        });

        $('#timepicker1').timepicker(); 
    });
</script>
-->
    {!! HTML::script('en-assets/js/bootstrap.min.js') !!}

    <!-- Metis Menu Js -->
    {!! HTML::script('en-assets/js/jquery.metisMenu.js') !!}
    <!-- Morris Chart Js -->
    {!! HTML::script('en-assets/js/morris/raphael-2.1.0.min.js') !!}

    {!! HTML::script('en-assets/js/morris/morris.js') !!}
    <!--
    {!! HTML::script('assets/js/bootstrap-datepicker.min.js') !!}
    {!! HTML::script('assets/js/bootstrap-timepicker.js') !!}
    -->
    <!-- Custom Js -->
    {!! HTML::script('en-assets/js/custom-scripts.js') !!}

   




</body>



</html>