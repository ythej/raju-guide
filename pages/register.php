
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RajuGuide - Explore It Our Way</title>
</head>

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
    
   <script src="./javascripts/jquery.validate.js" type="text/javascript">
        </script>
        <script src="./javascripts/jquery.validation.functions.js" type="text/javascript">
        </script>
        
    <script type="text/javascript">
	 jQuery(function(){
	 jQuery("#password1").validate({
                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",
                    message: "Please enter a valid Password"
                });
                jQuery("#password2").validate({
                    expression: "if ((VAL == jQuery('#password1').val()) && VAL) return true; else return false;",
                    message: "Confirm password field doesn't match the password field",
					
                });
	 })
	 </script>
   
  
 
    <script type="text/javascript">
        function ShowpImagePreview(input) {
			
			
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#ImgPrv').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>

<body>
<?php
           require_once('regnavbar.php');


            /*navbar-top-links*/
		
          
			?>
            
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Please Enter Your Regsiteration Details
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                        
                        <?php
										if(isset($_POST['submit']))
										{
										$name=$_POST['name'];
										$dob=$_POST['datepicker'];
										$gen=$_POST['gender'];
										
										$email=$_POST['email'];
										$phone=$_POST['phone'];
										
										
										$city=$_POST['city'];
										$pwd=$_POST['password'];
										
									
										
									    require_once('inc.php');
										
										echo "insert into `user` values('','$name','$gen',,'$email''$pwd','$city','$dob','$phone','')";
				mysql_query("insert into `user` values('','$name','$gen','$email','$pwd','$city','$dob','$phone','')") or die("query error");
				
		}
		
											
										
										
								
										
										?>
                        
                        <form name="register" method="post" enctype="multipart/form-data">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="10">
                       	<tr>
                        	<td>
                        		<strong>Full name:</strong>
                            </td>
                        	<td>
                            	<input type="text" name="name" class="form-control" placeholder="Enter Your Full Name"  required pattern="[a-zA-Z\s]+"/>
                            </td>
                        </tr>
                        <tr>
<td><link rel="stylesheet" href="../themes/base/jquery.ui.all.css">
<strong>Date Of Birth:</strong></td>
<td><p><input type="date" name="datepicker" class="form-control" required></p></td>
</tr>
<tr><td><strong>City:</strong></td><td><select name="city" size="1" class="form-control">
  <option value="surat">Surat</option>
  <option value="mumbai">Mumbai</option>
  <option value="ahmedabad">Ahmedabad</option>
</select></td></tr>
<tr>
<td><strong>Gender:</strong></td>
<td><input name="gender" type="radio" value="m">Male&nbsp;&nbsp;<input name="gender" type="radio" value="f" >Female</td>
</tr>
<tr>
<td><strong>Phone no:</strong></td>
<td><input name="phone" class="form-control" type="text" placeholder="Enter 10 digit Mobile No"  required pattern="[789][0-9]{9}"/></td>
</tr>
<tr>
<td><strong>Email:</strong></td>
<td><div class="form-group input-group"><span class="input-group-addon">@</span><input name="email" class="form-control" type="email" placeholder="Enter Your Email Address"  required /></div></td>
</tr>
<tr><td><strong>Password:</strong></td><td><input name="password" id="password1" oninvalid="setCustomValidity('Your Password Must be 8 to 10 alphanumeric character and must contain atleast one capital letter and special Character')" onchange="try{setCustomValidity('')}catch(e){}" class="form-control" type="password" placeholder="Enter Password" size="16" required pattern="(?=^.{5,12}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"/></td></tr>
<tr><td><strong>Retype Password:</strong></td><td><input name="rePassword" id="password2" type="password" class="form-control" placeholder="Retype Password" size="16" required pattern="(?=^.{5,12}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"/></td></tr>
<tr>
<td colspan="2"><strong>Profile Picture : </strong><input name="dp"  id="dp" type="file" value="Profile Picture" onchange="ShowpImagePreview(this);"></br><img src="" ID="ImgPrv" Height="150px" Width="240px"   /></td>
</tr>
<tr>
                                <td colspan="2">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button> </form>
                                </td>
                                </tr>

                        </table>
                        </div>
                    </div>
                 </div>
               </div>
                        
                      
            
            
</body>
<link rel="stylesheet" href="./themes/base/jquery.ui.all.css">
   <script src="jquery-1.9.0.js"></script>
	<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.datepicker.js"></script>
	
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>

</html>