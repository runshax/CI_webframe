<!doctype html>
<html>

<?php 
		 // if($act!="dologin"){
			$this->load->view('inc/header'); 
		 // }
		  
?>  

        <body class="">
		
		  <div class="bg-dark dk" id="wrap">
		  
		  <?php
		 // if($act!="dologin"){
		  $this->load->view('inc/sideandtop'); 
		 // }
		  ?>  
		  <?php echo $contents;?>
		<?php //$this->load->view('main/home'); ?>  
          </div>
		   <!-- /#wrap -->
			
<?php 
		//  if($act!="dologin"){
		  $this->load->view('inc/footer');
		//  }
 ?>  
			
        </body>

</html>
