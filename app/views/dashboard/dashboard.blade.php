@extends('layout.layout')

@section('content')

<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    Page content goes here
    <!-- page end-->
  </section>
</section>
@stop

@section('footerJS')
<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/respond.min.js" ></script>

<!--common script for all pages-->
<script src="js/common-scripts.js"></script>
@stop
