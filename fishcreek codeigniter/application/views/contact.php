<section> 
	
	<h2>Contact Fish Creek</h2>
	
	<p>Required fields are marked with an asterisk(*).

	<table id="form">
	<?php
	
	if(isset($information)) echo $information;
	
	echo form_open('contact/contact_submit');

	echo "<tr><th>".form_label('*Name:')."</th>";

	if(isset($name))
		$data_name = array('name' => 'name','id' => 'name','class' => 'input_box','value' => $name);
	else
		$data_name = array('name' => 'name','id' => 'name','class' => 'input_box','placeholder' => "Enter your name");
	echo "<td>".form_input($data_name)."</td><td>".form_error('name')."</td></tr>";

	echo "<tr><th>".form_label('*Email:')."</th>";
	 if(isset($email))
		$data_email = array('name' => 'email','id' => 'email','class' => 'input_box','value' => $email);
	else
		$data_email = array('name' => 'email','id' => 'email','class' => 'input_box','placeholder' => "Enter your email");
	echo "<td>".form_input($data_email)."</td><td>".form_error('email')."</td></tr>";

	echo "<tr><th>".form_label('*Comments:')."</th>";
	if(isset($comments))
		$data_comments = array('name' => 'comments','id' => 'comments', 'rows' => 5,'cols' => 22, 'value' => $comments);
	else
		$data_comments = array('name' => 'comments','id' => 'comments', 'rows' => 5,'cols' => 32,' placeholder' => "Enter your comments");
	echo "<td>".form_textarea($data_comments)."</td><td>".form_error('comments')."</td></tr>";


	echo "<tr><td></td><td>".form_submit('submit', 'Submit', "class='submit'")."</td></tr>";
	?>
	</table>
	</p>
	
</section> 
