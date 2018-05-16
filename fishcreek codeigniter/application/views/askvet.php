<section

<p><a href="<?php echo site_url('contact/contact')?>">Contact</a> us if you have a question that you would like answered here.<br></p><br>
	
<?php 
	
	if(!empty($faq)){
		foreach ($faq->result() as $row){
			echo '<h4>'.$row->question.'</h4><p class="answer">'.$row->answer.'</p>';
		}
	}
	else
		echo '<h4 style="color:red;">Unable to retrive information. Please contact us.</h4>';
		
?>


</section>