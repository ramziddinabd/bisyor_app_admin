<?php 

    include('public/sql-query.php');

	if (isset($_GET['id'])) {
 		$qry 	= "SELECT * FROM tbl_help WHERE id ='".$_GET['id']."'";
		$result = mysqli_query($connect, $qry);
		$row 	= mysqli_fetch_assoc($result);
 	}


	if(isset($_POST['submit'])) {
 
		$data = array(											 

			'title'  => $_POST['help_title'],
			'content'  => $_POST['help_content']

		);	

		$hasil = Update('tbl_help', $data, "WHERE id = '".$_POST['id']."'");

		if ($hasil > 0) {
			//$_SESSION['msg'] = "";
		    $succes =<<<EOF
				<script>
				alert('Help Menu Updated Successfully...');
				window.location = 'manage-help.php';
				</script>
EOF;
			echo $succes;
			exit;
		}

	}

?>

<!--content area start-->
<div id="content" class="pmd-content content-area dashboard">

    <!--tab start-->
    <div class="container-fluid full-width-container">
        <h1></h1>
            
        <!--breadcrum start-->
        <ol class="breadcrumb text-left">
          <li><a href="dashboard.php">Главная</a></li>
          <li class="active">Добавить Текст</li>
        </ol>
        <!--breadcrum end-->
    
        <div class="section"> 

            <form id="validationForm" method="post" enctype="multipart/form-data">
            <div class="pmd-card pmd-z-depth">
                <div class="pmd-card-body">

                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="lead">ДОБАВИТЬ ТЕКСТ</div>
                        </div>
                    </div>

                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield">
                                <label for="help_title" class="control-label">
                                    Заголовок *
                                </label>
                                <input type="text" name="help_title" id="help_title" class="form-control" placeholder="Title" value="<?php echo $row['title'];?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield">
                                <label class="control-label">Текст, описание *</label>
                                <textarea required class="form-control" name="help_content"><?php echo $row['content'];?></textarea>
                                <script>                             
                                    CKEDITOR.replace( 'help_content' );
                                </script>   
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">

                </div>

                <div class="pmd-card-actions">
                    <p align="right">
                    <button type="submit" name="submit" class="btn pmd-ripple-effect btn-danger">Применить</button>
                    </p>
                </div>
            </div> <!-- section content end -->  
            </form>
        </div>
            
    </div><!-- tab end -->

</div><!--end content area -->