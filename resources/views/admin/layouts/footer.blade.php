


<!--<footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  © 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted &amp; Made with <i class="icon-heart5 pink"></i></span></p>
    </footer>-->

    <!-- BEGIN VENDOR JS-->
    <script src="{{ $panel_assets }}js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ $panel_assets }}vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ $panel_assets }}js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!--<script src="{{ $panel_assets }}js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>-->
    <!-- Sweetalert -->
    {!! Html::script('cus/alert/sweetalert.min.js') !!}

    <!-- Checkbox -->
    {!! Html::script('cus/checkbox/js/jquery.vswitch.min.js') !!}
    <!-- END PAGE LEVEL JS-->
    @if(isset($act))
    @if($act == 'datatable')
    <!-- Datatable  -->
     <script src="{{ $panel_assets }}datatables/jquery.dataTables.min.js" type="text/javascript"></script>
     <script src="{{ $panel_assets }}datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

     <script src="{{ $panel_assets }}datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}datatables/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}datatables/dataTables.buttons.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
   
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ $panel_assets }}datatables/datatable-advanced.min.js" type="text/javascript"></script>
    @endif
    @endif
    <!-- Start custom Script -->
    <script type="text/javascript">
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var copy   = "{{ trans('admin.copy') }}";
    var excel  = "{{ trans('admin.excel') }}";
    var pdf    = "{{ trans('admin.pdf') }}";
    var lang   = "{{ url($panel_assets . 'datatables/'. trans('admin.lang')) }}";
    var delMsg = "{{ trans('admin.delMsg') }}";
    var pickSome = "{{ trans('admin.pickSome') }}";
    var token  = "{{ csrf_token() }}";
    var load = "<i class='fa fa-spinner fa-spin' style='color:#FFF'>";
    var slugUrl = "";
    method = new Array();
    @foreach(linkRef() as $key => $value)
        method['{{ $key }}'] = '{{ $value }}';
    @endforeach

    links_array = new Array();
    links_array['get_module'] = "{{ route('admin.get.module') }}";
    links_array['get_menu_content'] = "{{ route('admin.menu.content.ajax') }}";
    </script>
    <script src="{{ $panel_assets }}js/script.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}js/inputs.js" type="text/javascript"></script>
    <script src="{{ $panel_assets }}js/modules.js" type="text/javascript"></script>

   @if(isset($act) && in_array($act, ['create', 'edit']))
        <script src="{{url('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
        <script type="text/javascript">
            var domain = "{{ url('filemanager') }}";
         $('#lfm').filemanager('image', {prefix: domain});
        </script>
        <script type="text/javascript">
            document.getElementById("copyButton").addEventListener("click", function() {
                copyToClipboard($(".copyTarget"));
            });
            $('.copyTarget').on('change', function(){
                $('.target-button-area').fadeIn();
                $(this).fadeIn();
            });
        </script>
    @endif

    <!-- End custom Script -->
     @yield('script')
     @include($pLayout.'alert')
  </body>
</html>
