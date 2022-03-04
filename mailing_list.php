<?php require_once('./dao/customerDAO.php'); ?>
<!DOCTYPE html>
<html>	
	<?php include 'header.php'; ?>
	    <script type="text/javascript">
            function confirmDelete(customerName){
                return confirm("Do you wish to delete " + customerName + "?");
            }
        </script>

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
					<h1>Mailing List</h1>
					<br>
					<?php
						if(isset($_GET['deleted'])) {
							if($_GET['deleted'] == true){
							echo '<h3>Customer Deleted</h3>';
							}
						}
					?>
					<?php
					$customerDAO = new customerDAO();
					$mailingList = $customerDAO->getMailingList();
					if($mailingList){
						echo '<table>';
						echo '<tr><th>Name: </th><th>Phone Number:</th><th>Email Address:</th><th>Referrer: </th><th>Delete?</th></tr>';
						foreach($mailingList as $customer){
							echo '<tr>';
							echo "<aside style=\"margin: 8px;\">";
							echo '<td>'.$customer->getCustomerName().'</td>';
							echo '<td>'. $customer->getPhoneNumber().'</td>';
							echo  '<td>'.$customer->getEmailAddress().'</td>';
							echo  '<td>'.$customer->getReferrer().'</td>';
							echo '<td>
									<a onclick="return confirmDelete(\'' . $customer->getCustomerName() . '\')"
									href="removeCustomer.php?action=delete&_id=' .$customer->getId() . '">
									<input style=\'width:100%\' type=\'button\' value=\'Delete\'></a>
								</td>';
							echo '</tr>';
						}
						echo '</table>';
					}
					?>
				</div>
		</div>
	<?php include 'footer.php'; ?>
	</body>
</html>