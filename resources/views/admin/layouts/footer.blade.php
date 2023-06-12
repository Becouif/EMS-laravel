
<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('template/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('template/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('template/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('template/js/datatables-simple-demo.js')}}"></script>
    </body>

            <!-- jqueryui link  -->
            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat:"yy-mm-dd"
    }).val();
    
  } );
  </script>
    <script>
  $( function() {
    $( "#datepicker1" ).datepicker({
      dateFormat:"yy-mm-dd"
    }).val();
    
  } );
  </script>



     <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTable -->
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });

function confirmDelete(){
  return alert('do you want to delete?');
}
</script>

<!-- script for dropdowns  -->
<script type="text/javascript">

$(document).ready(function(){
  $("#mail").on("change",function(){
    if(this.value=="1"){
      $("#departmentInput").show();
    } else {
      $("#departmentInput").hide();
    }

    if(this.value=="2"){
      $("#userInput").show();
    } else {
      $("#userInput").hide()
    }
  })
})



</script>



    <!-- start of style CSS  -->
    <style>
    /* Additional custom styling for breadcrumbs */
    .custom-breadcrumb .breadcrumb-item a {
      color: #6c757d;
      text-decoration: none;
    }

    .custom-breadcrumb .breadcrumb-item a:hover {
      color: #333;
      text-decoration: underline;
    }

    .custom-breadcrumb .breadcrumb-item.active {
      color: #333;
    }
  </style>
</html>