<section> 
	<ul>
	<?php

		if(!empty($servicelist))
		{
			foreach ($servicelist->result() as $row)
			{
			echo '<li><h4>'.$row->servicename.'</h4></li><p id="no_tab">'.$row->description.'</p>';
			}
			
		}
		else
		{
			echo '<h4  style="color:red;">Unable to retrive information. Please contact us.</h4>';
		}
	
	?>
	</ul>

</section> 