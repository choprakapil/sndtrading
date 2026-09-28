<?php
// @extract($_REQUEST);
require('checksession.php'); 
require('../inc/function.php');

if(isset($_POST['Deactivate']) && isset($_POST['bb']))
{
    $bb = $_POST['bb'];
		foreach($bb as $act)
		{
			mysqli_query($conn,"update tbl_career set status='0' where id='$act'");
		}
}

		
if(isset($_POST['Activate']) && isset($_POST['bb']))
{
     $bb = $_POST['bb'];
		foreach($bb as $act)
		{
			mysqli_query($conn,"update tbl_career set status='1' where id='$act'");
		}
}
		

if(isset($_POST['Delete']) && isset($_POST['bb']))
{
      $bb = $_POST['bb'];
		foreach($bb as $act)
		{
			mysqli_query($conn,"delete from tbl_job_applications where id='$act'");
		}
}
		
		$mqry="select * from tbl_job_applications ";
		$mqry.=" order by date asc";

?>
<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade in page-sidebar-fixed page-header-fixed">
	
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- end #header -->	
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Career Management</a></li>
				<li class="breadcrumb-item active">Manage Career</li>
			</ol>

			<h1 class="page-header">Manage Career</h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-10 -->
				<div class="col-lg-12">
					<!-- begin panel -->
					<div class="panel panel-inverse">
						<!-- begin panel-heading -->
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Manage Career</h4>
						</div>
						<!-- end panel-heading -->
                       <form name="myform" method="post" action=""> 
						<!-- begin alert -->
						<div class="alert alert-secondary fade show">
							<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">&times;</span>
							</button>
							<div class="btn-group btn-group-justified">
                              <input type="Submit" name="Delete" class="btn btn-danger btn-flat" value="Delete" onClick="if(confirm('Are You Sure Want To Delete This Record')){ return true;} else { return false; }">
                            </div>
						</div>
						<!-- end alert -->
						<!-- begin panel-body -->
						<div class="panel-body">
							<table id="data-table-responsive" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="1%">S.No.</th>
										<th class="text-nowrap">Applying For</th>
										<th class="text-nowrap">Name</th>
										<th class="text-nowrap">Email</th>
										<th width="1%">Mobile</th>
										<th class="text-nowrap">About</th>
										<th class="text-nowrap">Location</th>
										<th width="6%">Date</th>
										<th width="1%">View</th>
										<th width="1%">Delete</th>
                                        <th width="1%">
											<input type="checkbox" id="select_all">
                                        </th>
									</tr>
								</thead>
								<tbody>
                                <?php $count=1; $fetch=mysqli_query($conn,$mqry);
			                          while($web=mysqli_fetch_array($fetch)) { 
			                    ?>
									<tr class="odd gradeX">
										<td width="1%" class="f-s-600 text-inverse"><?php echo $count;?></td>
										<td style="font-weight:800;" ><?php echo $web['applying_for'];?></td>
										<td style="font-weight:800;" ><?php echo $web['name'];?></td>
										<td style="font-weight:800;" ><?php echo $web['email'];?></td>
										<td style="font-weight:800;" ><?php echo $web['mobile'];?></td>
										<td><?php echo strip_tags(substr($web['about'],0,100));?></td>
										<td style="font-weight:800;" ><?php echo $web['location'];?></td>
										<td style="font-weight:800;" ><?php echo $web['date'];?></td>
                                        <td><a href="view-job-application.php?id=<?php echo $web['id'];?>" class='label label-sm label-primary' title="View"><i class="fa fa-eye"></i> View</a></td>
                                        <td><a href="delete/job-application.php?aid=<?php echo $web['id'];?>" class='label label-sm label-danger' onClick="if(confirm('Are You Sure Want To Delete This Record')){ return true;} else { return false; }" title="Delete"><i class="fa fa-trash"></i> Delete</a></td>
                                        <td><input type="checkbox"  class="checkbox" value="<?php echo $web['id']; ?>" name="bb[]" id="bb[]"></td>
									</tr>
								<?php $count++; }?>	
                                   
								</tbody>
							</table>
						</div>
						<!-- end panel-body -->
                        </form>
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-10 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
		
		
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
<?php require("includes/footer.php"); ?>
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageResponsive.init();
		});
	</script>
    
<!------------------------------>    
 <script>
function updateId(id)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            //alert(xmlhttp.responseText);
        }
    };
    xmlhttp.open("GET", "status/category.php?id=" +id, true);
    xmlhttp.send();
}
</script>
 <!---------------------------------------> 
    
	<script type="text/javascript">
    $(document).ready(function(){
        $('#select_all').on('click',function(){
            if(this.checked){
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                 $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });
        
        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#select_all').prop('checked',true);
            }else{
                $('#select_all').prop('checked',false);
            }
        });
    });
    </script>
</body>
</html>
