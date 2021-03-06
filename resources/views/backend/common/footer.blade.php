<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <b>Version</b> 2.4.0 -->
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="{{ url('costa') }}">L2Hotzone</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
</body>
<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('js/jquery-ui.min.js') }}"></script>
<script src="{{ url('js/bootstrap4.1.min.js') }}"></script>
<script src="{{ url('js/adminlte.min.js') }}"></script>
<script src="{{ url('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ url('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('js/fastclick.js') }}"></script>

 <!-- datatable js here -->
  <script type="text/javascript" src="{{url('js/datatable/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/datatable/dataTables.bootstrap4.min.js')}}"></script>
  <script type="text/javascript" src="{{url('css/datatable/Responsive/js/dataTables.responsi')}}ve.min.js"></script>
    <script type="text/javascript" src="{{url('css/datatable/Responsive/js/responsive.bootstra')}}p4.min.js"></script>
    <script type="text/javascript" src="{{url('css/datatable/Buttons/js/dataTables.buttons')}}.min.js"></script>
    <script type="text/javascript" src="{{url('css/datatable/Buttons/js/buttons.bootstrap4')}}.min.js"></script>
    <script type="text/javascript" src="{{url('css/datatable/JSZip/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{url('css/datatable/pdfmake/build/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{url('css/datatable/pdfmake/build/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{url('css/datatable/Buttons/js/buttons.html5.min.js')}}"></script>

    <script type="text/javascript" src="{{url('css/datatable/Buttons/js/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{url('css/datatable/Buttons/js/buttons.colVis.min.js')}}"></script>
 <!-- ends here -->


<script>
  $(function () {
     $('#example2').DataTable({
      responsive: true,
    });
   /* $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' 
    });*/
    //  $('#example2').DataTable({
    //   'paging'      : true,
    //   'lengthChange': true,
    //   'searching'   : true,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : true
    // });
  });
  var error = {
        server:true
       
    };
  $(document).on('change','#addselection', function(){
       
        var selecte = $(this).find(":selected");
        
        if(selecte.hasClass("alread_selected")){
             $(this).css('color','red');
             var date = new Date(selecte.attr('data-tilldate'));
             $('.whenalread').show().text(date.toLocaleString());
             error.server = false;
        
        }
        else
        {
           error.server = true;
        }
        //$('.addlocation').show().attr('src',selecte.attr("data-image"));

     

    }).on('change','#exampleFormControlSelect1',function(e){
        
        // if()/
        if($('#addselection :selected').is(':first-child')){
            
            $(this).find(':first-child').prop('selected',true);
            alert('select server first!');
            
        }

    })
    .on('submit','form', function(e){
    
      
        if((!error.server  &&  $('select[name="server_id"]').val() != null ))
        {
            alert(error.server);
             e.preventDefault();
              alert("fill complete form!");
         }
    });

</script>
</body>
</html>