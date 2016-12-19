<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>لوحة تحكم وسيلتي</title>
    <!-- Bootstrap Styles-->
    <?php echo HTML::style('assets/css/bootstrap.css'); ?>

    <!-- FontAwesome Styles-->
    <?php echo HTML::style('assets/css/font-awesome.css'); ?>

    <!-- Morris Chart Styles-->
    <?php echo HTML::style('assets/js/morris/morris-0.4.3.min.css'); ?>

    <!-- Custom Styles-->
    <?php echo HTML::style('assets/css/custom-styles-ar.css'); ?>

    <!-- Google Fonts-->

    <!-- Date and time pickers
    <?php echo HTML::style('assets/css/timepicker.less'); ?>

    <?php echo HTML::style('assets/css/bootstrap-datepicker3.min.css'); ?>

    -->
    <?php echo HTML::style('http://fonts.googleapis.com/css?family=Open+Sans'); ?>

    <?php echo HTML::script('https://use.fontawesome.com/98bba3ab93.js'); ?>

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
                <a class="navbar-brand" href="<?php echo e(url('dash')); ?>" style="font-size:27px">Waselaty Admin</a>
            </div>

            <ul class="nav navbar-top-links navbar-left">
                
                <li class="dropdown">
                    <a href="<?php echo e(url('/logout')); ?>">
                        <i class="fa fa-sign-out fa-fw"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(URL::to('en-dash')); ?>" >English</a>
                </li>     
                
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="<?php echo e(URL::to('dash')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> لوحة التحكم</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> إعلانات في انتظار الموافقة<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="<?php echo e(URL::to('company-pending')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> إعلانات الشركات </a>  
                            </li>
                            <li>
                              <a href="<?php echo e(URL::to('person-pending')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> إعلانات الأفراد</a>
                            </li>
                        </ul>
                    </li>
            <?php if(Session::get('role') == 'super'): ?>                    
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> كل الإعلانات<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="<?php echo e(URL::to('company-status')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> إعلانات الشركات </a>  
                            </li>
                            <li>
                              <a href="<?php echo e(URL::to('person-status')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> إعلانات الأفراد</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> الأقسام الرئيسية<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="<?php echo e(URL::to('mcategory/create')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> إضافة قسم </a>  
                            </li>
                            <li>
                              <a href="<?php echo e(URL::to('mcategory-edit')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> تعديل وحذف قسم</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> تصنيف الوظائف<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="<?php echo e(URL::to('categories/create')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> إضافة تصنيف </a>  
                            </li>
                            <li>
                              <a href="<?php echo e(URL::to('category-edit')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> حذف تصنيف</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> البلاد<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="<?php echo e(URL::to('countries/create')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> إضافة بلد </a>  
                            </li>
                            <li>
                              <a href="<?php echo e(URL::to('country-edit')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> حذف بلد</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> أسعار الإعلانات<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="<?php echo e(URL::to('prices/create')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> تحديد سعر جديد </a>  
                            </li>
                            <li>
                              <a href="<?php echo e(URL::to('prices')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> تعديل أسعار</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i>الحسابات المسجلة في الموقع<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="<?php echo e(URL::to('company-list')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> حسابات الشركات </a>  
                            </li>
                            <li>
                              <a href="<?php echo e(URL::to('person-list')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> حسابات الأفراد</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> إضافة وحذف أدمن<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="<?php echo e(URL::to('new-admin')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> إضافة أدمن جديد </a>  
                            </li>
                            <li>
                              <a href="<?php echo e(URL::to('admin-list')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> حذف أدمن</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> البنرات الإعلانية<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="<?php echo e(URL::to('sections-banners')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> تحديث بنرات الأقسام الرئيسية </a>  
                            </li>
                            <li>
                              <a href="<?php echo e(URL::to('jobs-banners')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> تحديث بنرات الوظائف</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube" aria-hidden="true"></i> محتويات الموقع<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                             <a href="<?php echo e(URL::to('site-content')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> تحديث السياسات </a>  
                            </li>
                            <li>
                              <a href="<?php echo e(URL::to('back-n-social')); ?>"><i class="fa fa-cube" aria-hidden="true"></i> السلايدر مواقع التواصل</a>
                            </li>
                        </ul>
                    </li>
            <?php endif; ?>                    
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            لوحة التحكم 
                        </h1>
                        
                        <?php if(Session::has('message')): ?>
                        <div id="message" class='alert alert-success'>
                            <p><h1> <?php echo Session::get('message'); ?> </h1></p> 
                         </div>
                         <?php endif; ?>
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
                <!-- /. ROW  -->

				<footer></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->

 
    <?php echo HTML::script('assets/js/jquery-1.10.2.js'); ?>


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
    <?php echo HTML::script('assets/js/bootstrap.min.js'); ?>


    <!-- Metis Menu Js -->
    <?php echo HTML::script('assets/js/jquery.metisMenu.js'); ?>

    <!-- Morris Chart Js -->
    <?php echo HTML::script('assets/js/morris/raphael-2.1.0.min.js'); ?>


    <?php echo HTML::script('assets/js/morris/morris.js'); ?>

    <!--
    <?php echo HTML::script('assets/js/bootstrap-datepicker.min.js'); ?>

    <?php echo HTML::script('assets/js/bootstrap-timepicker.js'); ?>

    -->
    <!-- Custom Js -->
    <?php echo HTML::script('assets/js/custom-scripts.js'); ?>


   




</body>



</html>