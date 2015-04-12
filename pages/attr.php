<?php
ob_start();
session_start();
include 'inc.php';
$id1=$_SESSION["id"];
if(isset($_SESSION["id"])==NULL)
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

    <title>select Attractions</title>

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

      <div id="page-wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            
           <?php
		   
		   if(!$_SESSION['nod'])
		      $i=0;
			  
			  if(isset($_POST['Add']))
			  {
				  $cn = $_POST['count'];
				  $list = "";
				  
				  for($k=1;$k<$cn;$k++)
				  {
					  if($_POST[$k])
					  {
						  if($list=="")
						  $list= $_POST[$k];
						  
					  else $list.=",".$_POST[$k];
				  		}
				  }
				  
				  mysql_query("insert into paid values(NULL,$_SESSION[pid],$i,$list)");
			  }
			else $i++;  
		   if($_GET['pid'])
		   $_SESSION['pid']=$_GET['pid'];
		   
		   if($_GET['nod'])
		   $_SESSION['nod'] = $_GET['nod'];
		   
		   
		   
		   
		   if($i<=$_SESSION['nod'])
		   {
			   $count=1;
			   echo "<form name='attr' method='post' action='attr.php'>";
			   
			   $attr_query = mysql_query("select id,name from attractions");
			   while($getattr = mysql_fetch_array($attr_query))
			   {
				   echo "<input type='checkbox' name='$count' value=".$getattr['id']."> ".$getattr['name'];
				   $count++;
			   }
			   echo "<input type='hidden' name='count' value='$count'>
			   <input type='submit' name='Add' value='Submit'>";
			   echo "</form>";
		   }
		   
		   else  echo "<meta http-equiv=Refresh content='0;url=makeplan.php?pid=".$pid.">";
		   
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
