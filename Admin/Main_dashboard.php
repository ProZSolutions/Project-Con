<?php
error_reporting(0);
$title  ="Home";
$_csheet= 1;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
error_reporting(0);
require 'MainConfig.php'; 
   if($role == 'user') {	
      header("Location:dashboard");
    }
		?>

<!--Payment Details-Bar-->
                  <?php  $ab=date('d-m-Y');					
                    $cd=date('Y-m-d',strtotime("-6 day"));
				$psp4= "SELECT sum(amount) FROM `payment` WHERE date='$cd'";
				$dgp4=mysqli_query($link,$psp4);
				while($dk1=mysqli_fetch_assoc($dgp4))
					{
					$cd=$dk1['sum(amount)'];
					}
					
			    $ads=date('Y-m-d',strtotime("-5 day"));
				$pspk= "SELECT sum(amount) FROM `payment` WHERE date='$ads'";
				$dgpk=mysqli_query($link,$pspk);
				while($dkk=mysqli_fetch_assoc($dgpk))
					{
					$bdg=$dkk['sum(amount)'];
					}
              
               $gfd=date('Y-m-d',strtotime("-4 day"));
				$ttt= "SELECT sum(amount) FROM `payment` WHERE date='$gfd'";
				$sss=mysqli_query($link,$ttt);
				while($uuu=mysqli_fetch_assoc($sss))
					{
					$hjd=$uuu['sum(amount)'];
					}

                  $thi=date('Y-m-d',strtotime("-3 day"));  
				$bov= "SELECT sum(amount) FROM `payment` WHERE date='$thi'";
				$bov1=mysqli_query($link,$bov);
				while($van=mysqli_fetch_assoc($bov1))
					{
					$esh=$van['sum(amount)'];
					}
					
					
					$vpq=date('Y-m-d',strtotime("-2 day"));
				
				$gdf= "SELECT sum(amount) FROM `payment` WHERE date='$vpq' ";
				$vgd=mysqli_query($link,$gdf);
				while($jhg=mysqli_fetch_assoc($vgd))
					{
					$qwe=$jhg['sum(amount)'];
					}
					$mnq=date('Y-m-d',strtotime("-1 day"));
					$hi= "SELECT sum(amount) FROM `payment` WHERE date='$mnq'";
				$end=mysqli_query($link,$hi);
				while($vhg=mysqli_fetch_assoc($end))
					{
					$gal=$vhg['sum(amount)'];
					}
		
								
					$gk=date('Y-m-d');					
				$sgh= "SELECT sum(amount) FROM `payment` WHERE date='$gk'";
				$lkj=mysqli_query($link,$sgh);
				while($poi=mysqli_fetch_assoc($lkj))
					{
					$hgf = $poi['sum(amount)'];}?>
					<!--/Bar Chart-Payment-->
					

<!--Bar Chart Details-->
<?php
                   
				 $kksm1=date('Y-m-d',strtotime("-6 day"));
				$psp= "SELECT count(id) FROM `material_in` WHERE date='$kksm1'";
				$dgp=mysqli_query($link,$psp);
				while($dk=mysqli_fetch_assoc($dgp))
					{
					$spk=$dk['count(id)'];
					}
					
				$kksa1=date('Y-m-d',strtotime("-5 day"));
				$psp1= "SELECT count(id) FROM `material_in` WHERE date='$kksa1'";
				$dgp1=mysqli_query($link,$psp1);
				while($dk1=mysqli_fetch_assoc($dgp1))
					{
					$spk1=$dk1['count(id)'];
					}
              
               $kksv1=date('Y-m-d',strtotime("-4 day"));
				$mmm= "SELECT count(id) FROM `material_in` WHERE date='$kksv1'";
				$nnn=mysqli_query($link,$mmm);
				while($ooo=mysqli_fetch_assoc($nnn))
					{
					$msv=$ooo['count(id)'];
					}

                  $kksq1=date('Y-m-d',strtotime("-3 day")); 
				$aaa= "SELECT count(id) FROM `material_in` WHERE date='$kksq1'";
				$bbb=mysqli_query($link,$aaa);
				while($ccc=mysqli_fetch_assoc($bbb))
					{
					$sac=$ccc['count(id)'];
					}
					
					
				$kks1=date('Y-m-d',strtotime("-2 day"));
				$ddd= "SELECT count(id) FROM `material_in` WHERE date='$kks1' ";
				$eee=mysqli_query($link,$ddd);
				while($fff=mysqli_fetch_assoc($eee))
					{
					$ssj=$fff['count(id)'];
					}
					
				$kks6=date('Y-m-d',strtotime("-1 day"));
				$ggg= "SELECT count(id) FROM `material_in` WHERE date='$kks6'";
				$hhh=mysqli_query($link,$ggg);
				while($iii=mysqli_fetch_assoc($hhh))
					{
					$vas=$iii['count(id)'];}
		
								
                   
					$tc12=date('Y-m-d');					
				$jjj= "SELECT count(id) FROM `material_in` WHERE date='$tc12'";
				$kkk=mysqli_query($link,$jjj);
				while($lll=mysqli_fetch_assoc($kkk))
					{
					$ssv = $lll['count(id)'];}
?>
<!---Load details-->
<?php
$psc= "SELECT sum(Amount) FROM `payment` WHERE `Designation`='Labour'";
$dgc=mysqli_query($link,$psc);
while($dc=mysqli_fetch_assoc($dgc))
					{
					$sc=$dc['sum(Amount)'];}

				$psq= "SELECT sum(amount) FROM `payment` WHERE `Design_ty`='Dealer'";
				$dgq=mysqli_query($link,$psq);
				while($dq=mysqli_fetch_assoc($dgq))
					{
					$sq=$dq['sum(amount)'];}
					$psqs= "SELECT sum(amount) FROM `payment` WHERE `Design_ty`='Driver'";
				$dgqs=mysqli_query($link,$psqs);
				while($dqs=mysqli_fetch_assoc($dgqs))
					{
					$sqs=$dqs['sum(amount)'];}
					$psqv= "SELECT sum(amount) FROM `payment` WHERE `Design_ty`='Employee'";
				$dgqv=mysqli_query($link,$psqv);
				while($dqv=mysqli_fetch_assoc($dgqv))
					{
					$sqv=$dqv['sum(amount)'];}


?>

		<!----Load Details-Pie-->
<?php $rq= "select count(*) from `material_in` where `Material_name`='Cement'"; 
$dg=mysqli_query($link,$rq);
					while($d=mysqli_fetch_assoc($dg))
					{
$sss=$d['count(*)'];
					}
$rq1= "select count(*) from `material_in` where `Material_name`='BRICKS QUARTERS'"; 
$dg1=mysqli_query($link,$rq1);
					while($d1=mysqli_fetch_assoc($dg1))
					{
$sp=$d1['count(*)'];
					}
$rq2= "select count(*) from `material_in` where `Material_name`='10mm rod'"; 
$dg2=mysqli_query($link,$rq1);
					while($d2=mysqli_fetch_assoc($dg2))
					{
$sp1=$d2['count(*)'];
					}
$ps= "select count(*) from `material_in` where `Material_name`='sand'"; 
$ps1=mysqli_query($link,$ps);
					while($dd=mysqli_fetch_assoc($ps1))
					{
$sp2=$dd['count(*)'];
					}
$rt= "select count(*) from `material_in` where `Material_name`='soil'"; 
$rs=mysqli_query($link,$rt);
while($ds=mysqli_fetch_assoc($rs))
					{
$po=$ds['count(*)'];
					}
$rp= "select count(*) from `material_in` where `Material_name`='stone'"; 
$rp1=mysqli_query($link,$rp);
					while($dg=mysqli_fetch_assoc($rp1))
					{
$po1=$dg['count(*)'];
					}
					
?>
<!--/Pie Chart-Load-->
				
 
 <!--header.php-->
<?php require("Template/header.php"); ?>
<!--body.php-->
<style>
.do{
    display: inline-block;
}
.click{
	margin-left: 760px;
}
</style>
</head>
<?php require("Template/body.php"); ?>


	
       <!-- page content -->
        <div class="right_col" role="main">

           <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-calculator"></i> Total payments</span>
		<?php  
				$date=date("W");
                $prev=$date-1;
				$ps= "SELECT sum(amount) FROM `payment` WHERE week(Date)=$prev";
				$dg=mysqli_query($link,$ps);
				while($d=mysqli_fetch_assoc($dg))
					{
					$s=$d['sum(amount)'];
					
					
					?>
              <div class="count"><?php  echo number_format($s);}?></div>
			  
              <span class="count_bottom"><i class="green"><i class="fa fa-calendar-check-o"></i></i> From last Week</span>
			  
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-calculator"></i> Total Payments</span>
			<?php	$date=date("W");
                $current=$date;
				echo $current;
				$ps1= "SELECT sum(amount) FROM `payment` WHERE week(Date)=$current";
				$dg1=mysqli_query($link,$ps1);
				while($d1=mysqli_fetch_assoc($dg1))
					{
					$sb=$d1['sum(amount)'];
					?>					 
              <div class="count"><?php  echo number_format($sb);}?></div>
			 
             <span class="count_bottom"><i class="yellow"><i class="fa fa-calendar-plus-o"></i></i> Current Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-truck"></i> Total Loads</span>
			<?php  
				 $date1=date("W");
                 $prev=$date1-1;
				$ps= "SELECT count(id) FROM `material_in` WHERE week(Date)=$prev";
				$dg=mysqli_query($link,$ps);
				while($d=mysqli_fetch_assoc($dg))
					{
					$s=$d['count(id)'];?>
              <div class="count"><?php echo $s;}?></div>
             
              <span class="count_bottom"><i class="green"><i class="fa fa-calendar-check-o"></i></i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-truck"></i> Total Loads</span>
			<?php  
				 $date1=date("W");
                 $current=$date1;
				$ps= "SELECT count(id) FROM `material_in` WHERE week(Date)=$current" and `delete` == 0;
				$dg=mysqli_query($link,$ps);
				while($d=mysqli_fetch_assoc($dg))
					{
					$sk=$d['count(id)'];?>
              <div class="count"><?php echo $sk;}?></div>
			<!--   <div class="count" id="weekload1"></div> -->
              <span class="count_bottom"><i class="yellow"><i class="fa fa-calendar-plus-o"></i></i> Current Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-database"></i> Total Stocks</span>
              <?php	$rq= "select count(stockname) from stocklist"; $dg=mysqli_query($link,$rq);
					while($d=mysqli_fetch_assoc($dg))
					{
					$s=$d['count(stockname)'];}?>
              <div class="count" id="stock"></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-calendar-check-o"></i></i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Employee</span>
			  
			  <?php	$rq= "select count(*) from `contact` where `Designation`='Employee'"; $dg=mysqli_query($link,$rq);
					while($d=mysqli_fetch_assoc($dg))
					{
					$s=$d['count(*)'];?>
              <div class="count"><?php echo $s;}?></div>
           <!-- <div class="count" id="emp"></div> -->
              <span class="count_bottom"><i class="yellow"><i class="fa fa-calendar-plus-o"></i></i> </span>
            </div>
          </div>
          <!-- /top tiles -->
            <div class="row">
              
			 

              <!-- Bar chart -->
			   <div class="col-md-8 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar Graph <small>Load Details</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="mybarChart"></canvas>
                  </div>
                </div>
              </div>
           <!-- /Bar chart -->

		   <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Material Details</h2>
             
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_pie" style="height:350px;"></div>

                  </div>
                </div>
              </div>
			  <!-- Bar chart -->
			   <div class="col-md-8 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar Graph <small>Payment Details</small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="mybarChart1"></canvas>
                  </div>
                </div>
              </div>
           <!-- /Bar chart -->


              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Payment Details</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_pie2" style="height:350px;"></div>

                  </div>
                </div>
              </div>
			   

              
			  <!-- pie chart -->
             <!---- <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Total Members</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content2">
                    <div id="graph_donut" style="width:100%; height:300px;"></div>
                  </div>
                </div>
              </div>--->
              <!-- /Pie chart -->
			   <!-- bar charts group -->
              <!---<div class="col-md-8 col-sm-4 col-xs-12">
               <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar Chart Group <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content2">
                    <div id="graphx" style="width:100%; height:300px;"></div>
                  </div>
                </div>
              </div>----->
              <!-- /bar charts group --> 


         
       
		</div>
		</div>
        <!-- /page content -->
		<!-- footer content -->
   <?php require("Template/footer.php"); ?>

<script>
    $(document).ready(function () {
	  setInterval(function () {		
	  $.getJSON('JSON/empdata.json', function(data) {	  
	  //var myItems = data;	  
      //console.log(myItems);
      var obj = data;
	  a = obj['count(No)'];	  
	  $('#emp').html(a);
	  console.log(a);
	  });
	  },1000);
      });
		
    $(document).ready(function () {
	  setInterval(function () {		
	  $.getJSON('JSON/prev_week_load.json', function(data) {	  
	  //var myItems = data;	  
      //console.log(myItems);
      var obj = data;
	  a1 = obj['count(id)'];	  
	  $('#weekload').html(a1);
	  console.log(a1);
	  });
	  },1000);
      });
		
    $(document).ready(function () {
	  setInterval(function () {		
	  $.getJSON('JSON/cur_week_load.json', function(data) {	  
	  //var myItems = data;	  
      //console.log(myItems);
      var obj = data;
	  a1 = obj['count(id)'];	  
	  $('#weekload1').html(a1);
	  console.log(a1);
	  });
	  },1000);
      });
    $(document).ready(function () {
	  setInterval(function () {		
	  $.getJSON('JSON/stock.json', function(data) {	  
	  //var myItems = data;	  
      //console.log(myItems);
      var obj = data;
	  a1 = obj['count(stno)'];	  
	  $('#stock').html(a1);
	  console.log(a1);
	  });
	  },1000);
      });
		
	  $(document).ready(function () {
	  setInterval(function () {		
	  $.getJSON('JSON/prev_week_pay.json', function(data) {	  
	  //var myItems = data;	  
      //console.log(myItems);
      var obj = data;
	  a1 = obj['COALESCE(Round(sum(Totalamount)),0)'];	  
	  $('#prevpay').html(a1);
	  console.log(a1);
	  });
	  },1000);
      });
    $(document).ready(function () {
	  setInterval(function () {		
	  $.getJSON('JSON/cur_week_pay.json', function(data) {	  
	  //var myItems = data;	  
      //console.log(myItems);
      var obj = data;
	  a1 = obj['COALESCE(Round(sum(Totalamount)),0)'];	  
	  $('#curpay').html(a1);
	  console.log(a1);
	  });
	  },1000);
      });
		
</script>
    <!-- morris.js -->
    <script>
      $(document).ready(function() {
           Morris.Donut({
          element: 'graph_donut',
          data: [
            {label: 'Labour', value: 25},
           
            {label: 'Dealer', value: 25},
            {label: 'Vehicle', value: 10}
          ],
          colors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          formatter: function (y) {
            return y + "";
          },
          resize: true
        });
		
       
        $MENU_TOGGLE.on('click', function() {
          $(window).resize();
        });
		 Morris.Bar({
          element: 'graphx',
          data: [
            {x:"<?php echo date('D', strtotime('-5 day'));?>", y: 2, z: 3, a: 4, p:6},
            {x: "<?php echo date('D', strtotime('-3 day'));?>", y: 3, z: 5, a: 6, p:7},
            {x: "<?php echo date('D', strtotime('-3 day'));?>", y: 4, z: 3, a: 2, p:8},
            {x: "<?php echo date('D', strtotime('-2 day'));?>", y: 2, z: 4, a: 5, p:4},
		   {x: "<?php echo date('D', strtotime('-1 day'));?>", y: 2, z: 4, a: 5, p:4},
			{x:"<?php echo date("D");?>", y: 2, z: 4, a: 5, p:4}
          ],
          xkey: 'x',
          ykeys: ['y', 'a','p'],
          barColors: ['#9B59B6', '#59B66C', '#B6596C','#3c321E'],
          hideHover: 'auto',
          labels: ['Y', 'Z', 'A','P'],
          resize: true
        }).on('click', function (i, row) {
            console.log(i, row);
        });
		
      });
    </script>
    <!-- /morris.js -->
	<!-- Chart.js -->
    <script>
      Chart.defaults.global.legend = {
        enabled: false
      };

      // Bar chart
      var ctx = document.getElementById("mybarChart");
      var mybarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels:["<?php echo date('D', strtotime('-6 day'));?>", "<?php echo date('D', strtotime(' -5 day'));?>", "<?php echo date('D', strtotime(' -4 day'));?>", "<?php echo date('D', strtotime(' -3 day'));?>", "<?php echo date('D', strtotime(' -2 day'));?>", "<?php echo date('D', strtotime('-1 day'));?>","<?php echo date("D");?>"],
          datasets: [{
            label: 'Total Loads',
            backgroundColor: "#26B99A",
            data: ["<?php echo $spk;?>","<?php echo $spk1;?>","<?php echo $msv;?>","<?php echo $sac;?>","<?php echo $ssj;?>","<?php echo $vas;?>","<?php echo $ssv;?>"]
          } 
          ]
        },

        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
	  // Bar chart
	  window.onload=function()
	  {
      var ctx = document.getElementById("mybarChart1");
      var mybarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels:["<?php echo date('D', strtotime('-6 day'));?>", "<?php echo date('D', strtotime(' -5 day'));?>", "<?php echo date('D', strtotime(' -4 day'));?>", "<?php echo date('D', strtotime(' -3 day'));?>", "<?php echo date('D', strtotime(' -2 day'));?>", "<?php echo date('D', strtotime('-1 day'));?>","<?php echo date("D");?>"],
          datasets: [{
            label: 'Total Payments',
            backgroundColor: "#26B99A",
            data: ["<?php echo $cd;?>","<?php echo $bdg;?>","<?php echo $hjd;?>","<?php echo $esh;?>","<?php echo $qwe;?>","<?php echo $gal;?>","<?php echo $hgf;?>"]
          } 
          ]
        },

        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
	  }
     
    </script>
	
    <!-- /Chart.js -->

	<script>
      var theme = {
          color: [
              '#26B99A','#7a195e','#F00E0E',  '#D8D831','#34495E','#9B59B6','#8abb6f',
			  '#759c6a', '#bfd3b7','#BDC3C7', '#3498DB'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };

      var echartPieCollapse = echarts.init(document.getElementById('echart_pie2'), theme);      
      echartPieCollapse.setOption({
        tooltip: {
          trigger: 'item',
          formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
          x: 'center',
          y: 'bottom',
          data: [ 'Labour', 'Driver', 'Dealer']
        },
        toolbox: {
          show: true,
          feature: {
            magicType: {
              show: true,
              type: ['pie', 'funnel']
            },
            restore: {
              show: true,
              title: "Restore"
            },
            saveAsImage: {
              show: true,
              title: "Save Image"
            }
          }
        },
        calculable: true,
        series: [{
          name: 'Total Payment',
          type: 'pie',
          radius: [25, 90],
          center: ['50%', 170],
          roseType: 'area',
          x: '50%',
          max: 40,
          sort: 'ascending',
          data: [{
			  
            value:<?php echo $sc;?>,
            name: 'Labour'
            }, {
            value: 2000,
            name: 'Driver'
          }, {
            value:<?php echo $sq;?> ,
            name: 'Dealer'
          }]
        }]
      });

     
      var echartPie = echarts.init(document.getElementById('echart_pie'), theme);
      echartPie.setOption({
        tooltip: {
          trigger: 'item',
          formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
          x: 'center',
          y: 'bottom',
          data: ['Cement', 'Stone', 'Sand', 'Bricks','rod','Soil']
        },
        toolbox: {
          show: true,
          feature: {
            magicType: {
              show: true,
              type: ['pie', 'funnel'],
              option: {
                funnel: {
                  x: '25%',
                  width: '50%',
                  funnelAlign: 'left',
                  max: 1548
                }
              }
            },
            restore: {
              show: true,
              title: "Restore"
            },
            saveAsImage: {
              show: true,
              title: "Save Image"
            }
          }
        },
        calculable: true,
        series: [{
          name: 'Total Loads',
          type: 'pie',
          radius: '55%',
          center: ['50%', '48%'],
          data: [{
            value: <?php echo $sss;?>,
            name: 'Cement'
          }, {
            value: <?php echo $po1;?>,
            name: 'Stone'
          }, {
            value: <?php echo $sp2;?>,
            name: 'Sand'
          }, {
            value: <?php echo $sp;?>,
            name: 'Bricks'
          
          }, {
            value: <?php echo $sp1;?>,
            name: 'rod'},
			{
            value: <?php echo $po;?>,
            name: 'Soil'}]
        }]
      });

      var dataStyle = {
        normal: {
          label: {
            show: false
          },
          labelLine: {
            show: false
          }
        }
      };

      var placeHolderStyle = {
        normal: {
          color: 'rgba(0,0,0,0)',
          label: {
            show: false
          },
          labelLine: {
            show: false
          }
        },
        emphasis: {
          color: 'rgba(0,0,0,0)'
        }
      };

    </script>

	</body>
	</html>
  
