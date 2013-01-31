<?php $this->load->view('header'); ?>

<?php 
if(isset($data)){
	$this->load->view($view_page, $data);	
}
else{
	$this->load->view($view_page);
}
 ?>

<?php $this->load->view('footer'); ?>
