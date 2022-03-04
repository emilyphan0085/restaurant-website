<!DOCTYPE html>
<html>	
	<?php include 'header.php';
		require_once('./dao/customerDAO.php'); ?>
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
					<h1>Removed Users List</h1>
					
				
				<?php
				
				$removedCustomerDAO = new customerDAO();
				$removedMailingList = $removedCustomerDAO->getRemovedCustomerList();
				if(!empty($removedMailingList)){
					echo '<table>';
					echo '<tr><td>Name: </td><td>Phone Number:</td><td>Email Address:</td></tr>';
					foreach($removedMailingList as $contact){
					
					echo '<tr>';
					
		
					echo '<td>'.$contact->getCustomerName().'</td>';
					echo '<td>'. $contact->getPhoneNumber().'</td>';
					echo  '<td>'.$contact->getEmailAddress().'</td>';
					
					echo '</tr>';
				

					}
					echo '</table>';
				}
				?>
				</div>
			</div>
		<?php	include 'footer.php'; ?>
    </body>
</html>