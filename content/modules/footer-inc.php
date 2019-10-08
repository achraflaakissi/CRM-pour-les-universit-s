
       
 

<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="plugins/ckeditor/ckeditor.js"></script>
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script> <!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.js"></script>

<script src="plugins/datatables/dataTables.bootstrap.js"></script>

<script src="dist/js/scripts.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>


<script>
   
     CKEDITOR.replace( 'editor1' );
</script>
<script>

    //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
//Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker(); 
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div>


<script>
     function activerdatatables()
     {
           var datatableinst = $('#example4').DataTable({
		    
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "searchable": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
				"bPaginate": false,
				"bLengthChange": false,
				"bFilter": true,
				"bInfo": true,
				'bSortable': false,
				"bAutoWidth": false
            });
          $('#example4 thead th').each(function(){
                var title = $('#example1 tfoot th').eq($(this).index()).text();
				if(title!="")
				{
					$(this).html('<input style="width:100%;" type="text" placeholder="'+title+'"/>');
				}
            });
            datatableinst.columns().every(function(){
                var datatabbleColumn=this;
                $(this.header()).find("input[type=text]").on('keyup change',function(){
                    datatabbleColumn.search(this.value).draw();
                });
            });
     }
     
     function activerdatatables()
     {
           var datatableinst = $('#example5').DataTable({
		    
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "searchable": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
				"bPaginate": false,
				"bLengthChange": false,
				"bFilter": true,
				"bInfo": true,
				'bSortable': false,
				"bAutoWidth": false
            });
          $('#example5 thead th').each(function(){
                var title = $('#example5 tfoot th').eq($(this).index()).text();
				if(title!="")
				{
					$(this).html('<input style="width:100%;" type="text" placeholder="'+title+'"/>');
				}
            });
            datatableinst.columns().every(function(){
                var datatabbleColumn=this;
                $(this.header()).find("input[type=text]").on('keyup change',function(){
                    datatabbleColumn.search(this.value).draw();
                });
            });
     }
     
      $('.modfpaiment').click(function()
     {
         var id = $(this).closest('tr').attr('id');
         var montant=$(this).closest('tr').find('td:nth-child(5)').html("<select><option></option><option>500 DHS</option><option>1000 DHS</option></select>");
         var recunumero = $(this).closest('tr').find('td:nth-child(8)').text('');
         var test = $(this).closest('tr').find('td:nth-child(6)').text();
         $(this).closest('tr').find('td:nth-child(9)').html("<form enctype='multipart/form-data' method='post' ><input type='file' id='fichier'"+id+" name='fichier'"+id+" /></form>");

         $(this).closest('tr').find('td:nth-child(10)').html("<button  class='btn btn-sm btn-primary validpaiment'>Valider</button>");
         /*$.ajax({
             type:"POST",
             data:"mdfpayement=true&id_contact="+id+"&montant="+montant+"&recunumero="+recunumero+"&test="+test,
             success:function(data){
                 if(data) {
                     location.reload();
                 }
             }
         })*/
     })

    



    $('#example5').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": false,
          "autoWidth": false
     });


     $('#example2').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": false,
          "autoWidth": false
     });
     function activerdatatables()
     {
           var datatableinst = $('#example1').DataTable({
		    
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "searchable": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
				"bPaginate": false,
				"bLengthChange": false,
				"bFilter": true,
				"bInfo": true,
				'bSortable': false,
				"bAutoWidth": false
            });
          $('#example1 thead th').each(function(){
                var title = $('#example1 tfoot th').eq($(this).index()).text();
				if(title!="")
				{
					$(this).html('<input style="width:100%;" type="text" placeholder="'+title+'"/>');
				}
            });
            datatableinst.columns().every(function(){
                var datatabbleColumn=this;
                $(this.header()).find("input[type=text]").on('keyup change',function(){
                    datatabbleColumn.search(this.value).draw();
                });
            });
     }
     function activerdatatablesforme()
     {
      var datatableinst = $('#example3').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "searchable": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
          $('#example3 tfoot th').each(function(){
                var title = $('#example3 tfoot th').eq($(this).index()).text();
                $(this).html('<input style="width:100%;" type="text" placeholder="Chercher '+title+'"/>');
            });
            datatableinst.columns().every(function(){
                var datatabbleColumn=this;
                $(this.footer()).find("input").on('keyup change',function(){
                    datatabbleColumn.search(this.value).draw();
                });
            });
     }
     $(function () {
          //Initialize Select2 Elements
          $(".select2").select2();
     });
     
    $("#file").change(function()
    {
        if($(this).val()!="") {
            if ($(this)[0].files[0].size > 2701842) {
                alert("La taille du fichier ne peut pas depasser 2.5 Mo");
                $(this).val(null);
            }
            var fileExtension = ['jpeg', 'jpg', 'png', 'pdf'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("Merci de choisir un fichier avec les extentions : " + fileExtension.join(', '));
                $(this).val(null);
            }

        }

    });
    
 
    
</script>


</body>
</html>