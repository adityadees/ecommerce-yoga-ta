<?php

if( $_POST ){
	
	$fname = $_POST['txt_fname'];
	$lname = $_POST['txt_lname'];
	$email = $_POST['txt_email'];
	$phno = $_POST['txt_contact'];

	?>
    
    <table class="table table-striped" border="0">
    
    <tr>
    <td colspan="2">
    	<div class="alert alert-info">
    		<strong>Success</strong>, Form Submitted Successfully...
    	</div>
    </td>
    </tr>
    
    <tr>
    <td>First Name</td>
    <td><?php echo $fname ?></td>
    </tr>
    
    <tr>
    <td>Last Name</td>
    <td><?php echo $lname ?></td>
    </tr>
    
    <tr>
    <td>Your eMail</td>
    <td><?php echo $email; ?></td>
    </tr>
    
    <tr>
    <td>Contact No</td>
    <td><?php echo $phno; ?></td>
    </tr>
    
    </table>
    <?php
	
}