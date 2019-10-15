		<footer class="footer">
            <!-- <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div> -->
        </footer>
    </div>
</div>

</body>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<!-- <script src="<?php echo base_url(); ?>assets/js/bootstrap-checkbox-radio.js"></script> -->

	<!--  Charts Plugin -->
	<script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/googleapis.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>

	<script type="text/javascript">			
		$(document).ready( function () {
		    $('#myTable').DataTable();
		} );
	</script>

    <script type="text/javascript">
        $(document).on("click", "#updateLocation_button", function () {
             var location_id = $(this).attr("data-id");
             var location_name = $(this).attr("data-name");
             var address = $(this).attr("data-myvalue");
             var contact_no = $(this).attr("data-trigger");
             var logo = $(this).attr("data-bb");
             var cv_start = $(this).attr("data-did");
             var year = $(this).attr("data-aa");
             $("#location_id").val(location_id);
             $("#location_name").val(location_name);
             $("#address").val(address);
             $("#contact_no").val(contact_no);
             $("#logo").val(logo);
             $("#cv_start").val(cv_start);
             $("#year").val(year);
        });

        $(document).on("click", "#updateCancel_button", function () {
             var cv_id = $(this).attr("data-id");
             var loc_id = $(this).attr("data-name");
             $("#cv_id").val(cv_id);
             $("#loc_id").val(loc_id);
        });

        $(document).on("click", "#updateSupp_button", function () {
             var supplier_id = $(this).attr("data-id");
             var supplier_name = $(this).attr("data-name");
             $("#supplier_id").val(supplier_id);
             $("#supplier_name").val(supplier_name);
        });

        $(document).on("click", "#updateBank_button", function () {
             var bank_id = $(this).attr("data-id");
             var bank_name = $(this).attr("data-name");
             $("#bank_id").val(bank_id);
             $("#bank_name").val(bank_name);
        });
        
        function confirmationDelete(anchor){
            var conf = confirm('Are you sure you want to delete this record?');
            if(conf)
            window.location=anchor.attr("href");
        }
    </script>

    <script type="text/javascript">
        function imageUpdate() {
            var image = $('select#image option:selected').attr('mytag')
            //alert(image);
            //var image = $("select#image").val();
            var path = "<?php echo base_url(); ?>uploads/";
            var src = $("img.imageNews").attr({
                src: path + image,
                title: "Image",
                alt: "Image"
            });
        }

        function onchangeLocation(){
            //var loc= 'http://localhost/cvf_bcd/';
            var loc= document.getElementById('base_url').value;
            var location = document.getElementById('location').value;
            $.ajax({
                success: function(){
                    window.location=loc+'index.php/masterfile/report_list/'+location;       
                }
            }); 
        }
    </script>

    <script>
        $(document).ready(function(){
            $('#date1').change( function(){
                 $('#date2').val($(this).val());
            });
        });

        $(document).ready(function(){
            $('#orig_amnt').keyup( function(){
                 $('#dupamnt').val($(this).val());
            });
        });

        $(document).ready(function(){
            $('#payment').keyup( function(){
                 $('#dupay').val($(this).val());
            });
        });

        $(document).ready(function(){
            $('#payment').keyup( function(){
                 $('#dupay2').val($(this).val());
            });
        });

        $(document).ready(function(){
            $('#payment').blur( function(){
                var payment = document.getElementById("payment").value;
                var bal_due = document.getElementById("bal_due").value;
                if(parseFloat(bal_due) < parseFloat(payment)){
                    document.getElementById("error").innerHTML  ='Payment cannot be higher than the Balance Due.';
                }else {
                    $('#error').hide();
                }
            });
        });

        function isNumberKey(txt, evt){
           var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode == 46) {
                //Check if the text already contains the . character
                if (txt.value.indexOf('.') === -1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if (charCode > 31
                     && (charCode < 48 || charCode > 57))
                    return false;
            }
            return true;
        }
    </script>


	<!-- <script src="<?php echo base_url(); ?>assets/js/data-table/bootstrap-table.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/data-table/tableExport.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/data-table/data-table-active.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/data-table/bootstrap-editable.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/data-table/bootstrap-table-export.js"></script> -->

	<!-- <script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script> -->

</html>
