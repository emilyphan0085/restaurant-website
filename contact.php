<?php include 'header.php';
	require_once('./dao/customerDAO.php');	
	 try{
            $customerDAO = new customerDAO();
            $hasError = false;
            $errorMessages = Array();


            if(isset($_POST['customerName']) ||
                isset($_POST['emailAddress']) || 
                isset($_POST['phoneNumber']) ||
				isset($_POST['referrer'])){
       
				
                if($_POST['customerName'] == ""){
                    $hasError = true;
                    $errorMessages['customerNameError'] = 'Please enter your name.';
                }

                if($_POST['emailAddress'] == ""){
                    $errorMessages['emailAddressError'] = "Please enter email address.";
                    $hasError = true;
                }
				if(!preg_match("/@/",$_POST['emailAddress'])){
                    $errorMessages['emailAddressError'] = "Invalid email address.";
                    $hasError = true;
                }

                if($_POST['phoneNumber'] == ""){
                    $errorMessages['phoneNumberError'] = "Please enter your phone.";
                    $hasError = true;
                }
				if(!is_numeric($_POST['phoneNumber'])){
                    $errorMessages['phoneNumberError'] = "Invalild phone number.";
                    $hasError = true;
                }
				  
				if(empty($_POST['referrer'])){
                    $errorMessages['referrerError'] = "Please choose referrer.";
                    $hasError = true;
                }
				

                if(!$hasError){
                    $contact = new Customer(0, $_POST['customerName'], $_POST['phoneNumber'], $_POST['emailAddress'], $_POST['referrer'], $_POST['deletedCustomerNames']);
                    $addSuccess = $customerDAO->addContact($contact);
                    echo '<h3>' . $addSuccess . '</h3>';
					exit;
                }
            }  
		}catch(Exception $e){
            echo '<h3>Error on page.</h3>';
            echo '<p>' . $e->getMessage() . '</p>';            
			}

      
	 
      ?>      
            
		<div id="content" class="clearfix">
			<aside>
					<h2>Mailing Address</h2>
					<h3>1385 Woodroffe Ave<br>
						Ottawa, ON K4C1A4</h3>
					<h2>Phone Number</h2>
					<h3>(613)727-4723</h3>
					<h2>Fax Number</h2>
					<h3>(613)555-1212</h3>
					<h2>Email Address</h2>
					<h3>info@wpeatery.com</h3>
			</aside>
			<div class="main">
				<h1>Sign up for our newsletter</h1>
				<p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
				<form name="frmNewsletter" id="frmNewsletter" method="post" action="contact.php">
					<table>
						<tr>
							<td>Name:</td>
							<td><input type="text" name="customerName" id="customerName" size='40'>
							 <?php
							if(isset($errorMessages['customerNameError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['customerNameError'] . '</span>';
							  }
							?></td>
						</tr>
						<tr>
							<td>Phone Number:</td>
							<td><input type="text" name="phoneNumber" id="phoneNumber" size='40'>
							<?php 
							if(isset($errorMessages['phoneNumberError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['phoneNumberError'] . '</span>';
							 }
							?></td>
						</tr>
						<tr>
							<td>Email Address:</td>
							<td><input type="text" name="emailAddress" id="emailAddress" size='40'>
							 <?php 
							if(isset($errorMessages['emailAddressError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['emailAddressError'] . '</span>';
							 }
							?></td>
							
						</tr>
						<tr>
							<td>How did you hear<br> about us?</td>
							<td>Newspaper<input type="radio" name="referrer" id="referralNewspaper" value="newspaper">
								Radio<input type="radio" name='referrer' id='referralRadio' value='radio'>
								TV<input type='radio' name='referrer' id='referralTV' value='TV'>
								Other<input type='radio' name='referrer' id='referralOther' value='other'>
							<?php 
							if(isset($errorMessages['referrerError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['referrerError'] . '</span>';
							 }
							?></td>
						</tr>
						<tr>
							<input type="hidden" name="deletedCustomerNames" id="deletedCustomerNames" value='na'>
							<td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
<?php include 'footer.php'; ?>
    
