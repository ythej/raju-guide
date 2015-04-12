<?php
ob_start();
session_start();
$id1=$_SESSION["id"];
if(isset($_SESSION["id"])==null)
{
	
	header("Location:./login.php");
	
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RajuGuide - Explore It Our Way</title>

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
	 ?>
      <div id="page-wrapper" style="background-image:url(bg.jpg)">
          <div class="row" >
                <div class="col-lg-12">
                    <h1 class="page-header">Complete Holiday Planner</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
            <!-- /.row -->
            <div class="row">
            
            
            <div class="col-lg-12" style=" background-image:url(tbg.png)"></br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            My Trips
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>city</th>
                                            <th>No Of days</th>
                                            <th>Budget</th>
                                            <th>Cancel</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
									require_once("inc.php");
									$res=mysql_query("select * from pplan where uid='$id1'") or die('query error');
								
									while($r=mysql_fetch_row($res))
									{
										echo "<tr class='odd gradeX'>";
										echo "<td>$r[2]</td>
                                            <td>$r[3]</td>

                                            <td>$r[7]</td>
                                            <td>$r[8]</td>";
											echo "</tr>";
								
									}
									?>
             						</tbody>
                                    </table>
             </br></br>
             
          </div>
              
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
