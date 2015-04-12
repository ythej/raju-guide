<?php session_start(); ?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>See Plans</title>

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
	 include("inc.php");
	 ?>
      <div id="page-wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Plans</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
           <?php 
		   
		   if(isset($_POST['makeplan']))
		   {
			   $name = $_POST['pname'];
			   $destination = $_POST['dest'];
			   $src = $_POST['source'];
			   
			   $mini = $_POST['mini'];
			   $maxi = $_POST['maxi'];
			   $date = $_POST['date'];
			   $ldate = $_POST['ldate'];
			   $day = $_POST['days'];
			   $hotel = $_POST['hotel'];
			   $gen1 = $_POST['gen1'];
			   $gen2 = $_POST['gen2'];
			   $desc = $_POST['desc'];
			   $commute = $_POST['comm'];
			 
			   $insert_query = mysql_query("insert into plan values(NULL,'$name',$_SESSION[id],'$src','$dest',$mini,$maxi,$date,$ldate,$day,4000,'$commute',curdate(),$hotel,0,$desc)");
			  
			  $pid_query = mysql_query("select id from plan where name=$name and date=$date");
			  
			  $pid_fetch = mysql_fetch_array($pid_query);
			  $pid = $pid_fetch['id']; 
			  
              echo "<meta http-equiv=Refresh content='0;url=attr.php?id=".$pid."&nod=".$day.">";
              
              
		   }
		   
		   
		   if($_GET['pid'])
		  {
			   $pid = $_GET['pid'];
		  }
		   
		   
		   if(isset($_POST['comment']))
		   {
			   $com = $_POST['cm'];
			   mysql_query("insert into member values(NULL,$_SESSION[id],$pid,'$com',NOW())") or die(mysql_error());
		   }
           if(!$pid)
		   {
			  echo '
			  <div class="col-lg-6">
                                    <form name="mkplan" method="post" action="makeplan.php">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="pname" placeholder="Enter the a name for you trip...">
                                        </div>
										<div class="form-group">
                                            <label>Destination City</label>
                                            <select name="dest" class="form-control">
                                                <option selected="selected">Select the destination city</option>
                                                <option>Goa</option>
                                                <option>Kashmir</option>
                                                <option>Agra</option>
                                                <option>Rameshwaram</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Source City</label>
                                            <select name="source" class="form-control">
                                                <option selected="selected">Select the start city</option>
                                                <option>Surat</option>
                                                <option>Mumbai</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Trip starts from...</label>
                                            <input class="form-control" type="date" name="date" placeholder="Enter the date from which trip starts...">
                                        </div>
                                        <div class="form-group">
                                            <label>Number of days of trip</label>
                                            <input class="form-control" type="number" min="1" name="days" placeholder="Enter the date from which trip starts...">
                                        </div>
										
										<div class="form-group">
                                            <label>Number of People : </label>
                                            <input class="form-control" type="number" min="1" name="mini" placeholder="Min no of people req...">
											<input class="form-control" type="number" min="2" name="maxi" placeholder="Max no of people allowed...">
                                        </div>
										
										
                                        <div class="form-group">
                                            <label>Hotel we gotta stay at...</label>
                                        <select name="hotel" class="form-control">
										
										';
                                          $hotel = mysql_query("select id,name,cost from accomodation");
										  
										 
										  while($hotdata = mysql_fetch_array($hotel))
										 {  
										 echo '<option value="'.$hotdata['id'].'">'.$hotdata['name'].'( Rs.'.$hotdata['cost'].')</option> ';
										 }
                                                
                                         echo ' </select>
										</div>
                                        <div class="form-group">
                                            <label>People who can join...</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="gen1" value="m">Men
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="gen2" value="f">Women
                                                </label>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Travel By...</label>
                                            <select name="comm" class="form-control">
                                                <option value="Flight">Flights</option>
                                                <option value="Train">Train</option>
                                            </select>
                                        </div>
										 <div class="form-group">
                                            <label>Final Date for Approval</label>
                                            <input class="form-control" type="date" name="ldate" placeholder="Enter the date from which trip starts...">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="desc" class="form-control" rows="3"></textarea>
                                        </div>
                                        <button type="submit" name="makeplan" class="btn btn-default">Choose Attractions &rarr;</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
			  '; 
			   
		   }
		   
		   
		   
		   else {
			   
			  $plan_query = mysql_query("select * from plan where id=$pid");
			  $plan_attr = mysql_query("select day,attraction from planner where pid=$pid"); 
			
			$plan = mysql_fetch_array($plan_query);
			echo '<div align="right"><a href="book.php?pid=$pid&mid=$_SESSION[id]" class="btn btn-danger">Book</a></div>';
			echo " <table class='table table-striped table-bordered table-hover'>
                                   
                                        <tr>
                                            <th>Name</th>
											<td>$plan[name]</td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
											<td>$plan[city]</td>
                                        </tr>
										<tr>
                                            <th>No Of People </th>
											<td>".$plan['min']."-".$plan['max']." people </td>
                                        </tr>
										<tr>
                                            <th>Date</th>
											<td>$plan[pdate]</td>
                                        </tr>
										<tr>
                                            <th>No. of Days</th>
											<td>$plan[nod]</td>
                                        </tr>
										<tr>
                                            <th>People who can join</th>";
											if($plan['gender']=='m')
											echo '<td>Male</td>';
											
											elseif($plan['gender']=='f')
											echo '<td>Female</td>';
											
											else echo '<td>Both Male and Female</td>';
											
                                        echo'</tr>
										<tr>
                                            <th>Last Date To register</th>
											<td>'.$plan["last_date"].'</td>
                                        </tr>
										
										<tr>
                                            <th>Hotel : </th>';
											$acco_name = mysql_query("select name,cost from accomodation where id=$plan[hid]");
										$hotel= mysql_fetch_array($acco_name);
											
											echo '<td>'.$hotel["name"].' (Rs. '.$hotel["cost"].')</td>
                                        </tr>';
										
										
										
										while($attributes = mysql_fetch_array($plan_attr))
										{
											$list = $attributes['attraction'];
											echo "<tr>
											<td>Day $attributes[day]</td><td>";
											
										$name_of_attr = mysql_query("select name from attraction where id in ($list)");
											while($names_att=mysql_fetch_array($name_of_attr))
												 echo $names_att['name']."<br>";
												 
											
											echo"</td>
											</tr>";
										}
										
										echo '<tr>
                                            <th>Description </th>
											<td>'.$plan["desc"].'</td>
                                        </tr></table>';
								
								
								
										
						echo '<div class="panel-heading">
                            Add Your Comment
                        </div>
						<div class="form-group">
                                           <form name="com" method="post" action="makeplan.php" >
                                           <textarea name="cm"class="form-control" rows="3" placeholder="Add a Comment"></textarea>
                                        <button name="comment" type="submit" class="btn btn-default">Comment</button>
										</form></div>';
										
									
										echo '<div class="panel-heading">
                             Comments
                        </div>';
						$com_query = mysql_query("select mid,comment,date from member where pid=$pid order by date desc");
						while($comment=mysql_fetch_array($com_query))
						{
						echo '<div class="form-group">
						';
						$name_que = mysql_query("select name from user where id=$comment[mid]");
						$name = mysql_fetch_array($name_que);
						
                        echo '<div class="panel panel-primary">
                        <div class="panel-heading">
                           '.$name["name"].'
                        </div>
                        <div class="panel-body">
                            <p>'.$comment["comment"].'.</p>
                        </div>
                        <div class="panel-footer">
                            '.$comment["date"].'
                        </div>
                    </div>';				
						}
		   }
              ?>
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
