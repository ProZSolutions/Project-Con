<?php
$title = "Vehicle_Attendance";
$_csheet = 0;
$_cjava = 1;
$_sheet = 0;
$_script = "D";
error_reporting(0); 
require 'MainConfig.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		$dat = $_POST['date'];
		 $dat1 = date("Y-m-d",strtotime(str_replace('/','-',$dat)));
			$no = strtoupper($_POST['vno']);		
			$own = $_POST['name'];				
			$hour = $_POST['daterange'];
			$one = explode(':',$hour);
            $name = $one[0];	
            $surname = $one[1];
            $v_id = $_POST['vehicleid'];

			$result1 = $link->query("select `vwege`,`hour_cost` from vehicle where `vno`='$no' AND `vown`='$own' ");
           while ($row = $result1->fetch_assoc())
			   {
			   $wege = $row['vwege'];
			   $cost = $row['hour_cost'];
			   }	
	
			   $worktime = $name + $surname/60;              
               $pay = round($worktime * $cost); 
                 $amt = $pay+$wege;
				 
			$sql = "INSERT INTO `vehicle_entry` (`Date`,`Vehicle_no`,`hour`,`owner`,`driver_wege`,`Amount`,`Totalamount`,`cashier`,`vehicle_id`)VALUES('$dat1','$no','$hour','$own','$wege','$pay','$amt','$user','$v_id')";
			 if (!mysqli_query($link,$sql))
				 {die('Error: ' . mysqli_error($link));}
		}

?>
<?php require("Template/header.php"); ?>
<!---------body.php---------------->
<?php require("Template/body.php"); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Attenance</h3>
              </div>             
            </div>           
        <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Vehicle Attenance <small>Users</small></h2>
                   <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                  	 
                    <form action="vehicle_attend" class="form-horizontal form-label-left" data-parsley-validate  method="post">
					 <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date</label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                        <input id="date" class="form-control col-md-7 col-xs-12" type="text" name="date">
                        </div>
                     </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vehicle No<span class="required">*</span></label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    <select class="form-control" name="vno" id="mat1">
				    <option>Select Vehicle No</option>
				    <?php $result = $link->query("select vno from vehicle"); while ($row = $result->fetch_assoc()){$id = $row['vno'];echo '<option>'.$id.'</option>'; } ?> </select>					
                    </div>
                    </div>                     
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Owner Name/Transport Name <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                        <input type="text" id="own" name="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						</div>
						
					      <input type="text" id="vid" name="vehicleid" style="display:none" class="comm" >
					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Hour <span class="required">*</span></label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                        <input type="text" name="daterange" id="time" class="cls form-control" readonly>                          
                        </div>
                        </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					  <button type="submit" class="btn btn-success">Submit</button>
                      <button type="submit" class="btn btn-primary">Cancel</button>                         
                      </div>
                      </div>
                      </form>
					  </div>
					  </div>
					  </div>
                  </div>
                </div>
              </div>
            </div>			
		<!-- /page content -->
       <?php require("Template/footer.php"); ?>
	   <!--footer---->
<script>
$(document).ready(function(){
    $("#time").setMask('time').val('hh:mm');    
})​
</script>
<!---date---->
<script>

$(document).ready(function() {
$('#date').daterangepicker({
singleDatePicker: true,
calender_style: "picker_2",
maxDate: new Date
}, function(start, end, label) {
console.log(start.toISOString(), end.toISOString(), label);
        });
      });
</script>
<!---date---->
<!---date time picker--> 
<script type="text/javascript">
$(document).ready(function() {
    $('.cls').daterangepicker({
        startDate: moment(),
        timePicker: true,
        showDropdowns: true,
        format: "HH:mm",
        timePicker12Hour: false,
        timePickerIncrement: 1,
        singleDatePicker: true
    });
    $('input[name="daterange"]').data('daterangepicker').container.find('.calendar-date').hide();
    $('input[name="daterange"]').on('showCalendar.daterangepicker', function (event, data) {
        var $container = data.container;
        $container.find('.calendar-date').remove();
    });
});
</script>
<!---date time picker-->

<script type="text/javascript">
		$(document).ready(function(){
			$("#mat1").change(function()
			{	var id=$(this).val();
				var dataString = 'id='+ id;
				$.ajax({
					type: "POST",
					url: "ajaxvehicleown.php",
					data: dataString,
					cache: false,
					success: function(value){
						var data = value.split(",");
                    
						$("#own").val(data[0]);
                     $("#vid").val(data[1]);
					} 
				});
			});
		});
</script>	

<script type="text/javascript">	
	window.onload=function(){	
	displayDate()
	setInterval(GetClock,1000);	
	}
    function displayDate() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = (day) + "/" +(month)+ "/"  + now.getFullYear();
    document.getElementById("date").value = today;
    }	
</script>

<script type="text/javascript">
$(document).ready(function()
{
$("button").click(function()
{
var id=$(this).val();
var dataString = {id: id};
$.ajax
({
type: "POST",
url: "ajaxvehicle.php",
data: dataString,
cache: false,
success: function(html)
{
$("#log").html(html);
} 
});
});
});
</script>

<script>
var modal = document.getElementById('myModal');
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
$(".p").click(function(){
   modal.style.display = "block"; 
});
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
	}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

	</body>
	</html>
