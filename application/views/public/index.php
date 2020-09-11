<?php include("header.php") ?> 
	
<?php for($i=1;$i<8;$i++)   {
         $this->load->view('public/sections/' . 'section'.$i. '.php'); 

        
}?>

<?php include("footer.php") ?>