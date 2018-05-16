<section> 

	<h2>Subscribe Fish Creek</h2>
		
	
	<p>Required fields are marked with an asterisk(*).
	<table id="form">

	<?php

	if(!empty($info)) echo $info;

	
	echo form_open('subscribe/subscribe');

	echo "<tr><th>".form_label('*Client Full Name:')."</th>";
	if(isset($name))
		$data_name = array('name' => 'name','id' => 'name','class' => 'input_box','value' => $name);
	else
		$data_name = array('name' => 'name','id' => 'name','class' => 'input_box','placeholder' => "Enter your name");
	echo "<td>".form_input($data_name)."</td><td>".form_error('name')."</td></tr>";

	
	echo "<tr><th>".form_label('*Address:')."</th>";
	if(isset($address))
		$data_address = array('name' => 'address','id' => 'address','class' => 'input_box','value' => $address);
	else
		$data_address = array('name' => 'address','id' => 'address','class' => 'input_box','placeholder' => "Enter your address");
	echo "<td>".form_input($data_address)."</td><td>".form_error('address')."</td></tr>";


	echo "<tr><th>".form_label('*Email:')."</th>";
	 if(isset($email))
		$data_email = array('name' => 'email','id' => 'email','class' => 'input_box','value' => $email);
	else
		$data_email = array('name' => 'email','id' => 'email','class' => 'input_box','placeholder' => "Enter your email");
	echo "<td>".form_input($data_email)."</td><td>".form_error('email')."</td></tr>";


	echo "<tr><th>".form_label('*Phone:')."</th>";
	 if(isset($phone))
		$data_phone = array('name' => 'phone','id' => 'phone','class' => 'input_box','value' => $phone);
	else
		$data_phone = array('name' => 'phone','id' => 'phone','class' => 'input_box','placeholder' => "Enter your phone");
	echo "<td>".form_input($data_phone)."</td><td>".form_error('phone')."</td></tr>";


	echo "<tr><th>".form_label('*Password:')."</th>";
	 if(isset($password))
		$data_password = array('name' => 'password','id' => 'password','class' => 'input_box','value' => $password);
	else
		$data_password = array('name' => 'password','id' => 'password','class' => 'input_box','placeholder' => "Enter your password");
	echo "<td>".form_password($data_password)."</td><td>".form_error('password')."</td></tr>";


	
	echo "<tr><th>*Type of <br>Service:</th><td>";
	
	$options['Select'] = "Select";	
	foreach ($servicelist->result() as $row )
		$options[$row->servicename]=$row->servicename;

	if(!empty($type_of_service))
		echo form_dropdown('type_of_service',$options,$type_of_service)."</td><td>".form_error('type_of_service')."</td></tr>"; 
	else
		echo form_dropdown('type_of_service',$options,'Select')."</td><td>".form_error('type_of_service')."</td></tr>"; 

	
	echo "<tr><th>*Pet:</th><td>";
	
	$opt_pets['Select'] = "Select";
	foreach  ($petlist->result() as $row)
		$opt_pets[$row->petname]=$row->petname;

	if(!empty($pet))
		echo form_dropdown('pet',$opt_pets,$pet)."</td><td>".form_error('pet')."</td></tr>"; 
	else
		echo form_dropdown('pet',$opt_pets,'Select')."</td><td>".form_error('pet')."</td></tr>"; 

	echo "<tr><td></td><td>".form_submit('submit', 'Submit', "class='submit'")."</td><td>".form_error('Pet')."</td></tr>";


	echo form_close( ); 
	?>
	</table>
	</p>
	
</section> 