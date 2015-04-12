<?php session_start();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Plan a trip</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

     <?php
	 include("bar.php");
	 require_once 'inc.php';
	 
	 $id = $_GET['id'];
	 ?>
      <div id="page-wrapper">
          <div class="row">
                <div class="col-lg-12">
                
                    <h1 class="page-header"> <?php if ($id) echo "My "; else echo "Search ";?>Plans</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php 
							if($id)
							echo "Edit/View Plans";
							
							else echo "Filters";
							
							
							?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                            
                           
                            
            <?php 
			if(isset($_POST['plan']))
			{
				$city = $_POST['city'];
				
				$gender = $_POST['gender'];
				$date = $_POST['dt'];
				//echo '<br>'.$city.' '.$gender.' '.$date.'<br>';
				$check_plan = mysql_query("select id,name,gender,nod,budget,pdate,last_date from plan where city='$city' and (gender='$gender' or gender='x') and last_date >= $date and status=0");
			
			echo ' <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
											<th>Gender</th>
											<th>People</th>
                                            <th>Plan Date</th>
                                            <th>Last Date of Reg.</th>
                                            <th>Check</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>';
				while($get_plan = mysql_fetch_array($check_plan))
				{
						echo "		<tr class='gradeA'>
                                            <td>$get_plan[name]</td><td>";
											
											if($get_plan['gender']=='m')
											echo "Male";
											
											elseif ($get_plan['gender']=='f')
											echo "Female";
											
											else echo "Both Males and Female";
                                            
                                            echo "</td><td>$get_plan[nod]</td>
											<td class='center'>$get_plan[pdate]</td>
											<td class='center'>$get_plan[last_date]</td>
											<td class='center'><a href='makeplan.php?id=$get_plan[id]'><i class='fa fa-edit fa-fw'></i></a></td>
                                        </tr>
                                      ";  
				}
				
				echo "</tbody>
                                </table>";
			}
			
			else {
			if($id)
			{
				
				echo ' <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Plan Date</th>
                                            <th>Last Date</th>
                                            <th>Status</th>
                                            <th>Check</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>';
				$query = mysql_query("select id,name,pdate,last_date,status from plan where oid=$id");
			
						while($data = mysql_fetch_array($query))
							{
                  				echo "		<tr class='gradeA'>
                                            <td>$data[name]</td>
                                            <td>$data[pdate]</td>
                                            <td>$data[last_date]</td>
											<td class='center'>";
                                            if ($data['status']==0) 
											echo "Pending";
											
											elseif ($data['status']==1)
											echo "Confirmed";
											
											else echo "Cancelled";
                                            echo "</td><td class='center'><a href='makeplan.php?pid=$data[id]'><i class='fa fa-wrench fa-fw'</i></a></td>
                                        </tr>
                                      ";  
                            }
							
							echo "</tbody>
                                </table>";
			}
			
			
			else {
				
				echo '<form name="check" method="post" action="plan.php" >
											<div class="form-group"> <label>Select City</label>
                                            <select name="city" class="form-control">';
											$city = mysql_query("select name,id from city");
											while($city_data = mysql_fetch_array($city)) 
											{
											echo '<option value='.$city_data['name'].'>'.$city_data['name'].'</option>';
											}
                                            echo '</select></div>';
											
											
					
					echo ' <div class="form-group"> <label>Select Date : </label> <input name="dt" type="date"> </div> ';
					  echo ' <div class="form-group"><label>Gender </label><select name="gender" class="form-control">';
											
											echo '<option value="m">Male</option>';
											echo '<option value="f">Female</option>';
											echo '<option value="x">Mixed</option>';
                                            echo '</select></div> 
											<div class="form-group"><button type="submit" name="plan" class="btn btn-default">Submit Button</button>
											 <button type="reset" class="btn btn-default">Reset Button</button> </div>
											
											</form>';						
				}
			
				
			}
                              ?>        
                           
                                    
                            </div>
                            <!-- /.table-responsive -->
                       
                        
                        </div>
                        <!-- /.panel-body -->
                        
                         
                    </div>
                    <!-- /.panel -->
                    
                    <div class="form-group"><a href="makeplan.php" class="btn btn-primary btn-lg btn-block">Make Your Plan </a></div>   
                </div>
                <!-- /.col-lg-12 -->
                
               
              
          </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    
    

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
