<?php
require_once('abstractDAO.php');
require_once('./model/customer.php');

class customerDAO extends abstractDAO {
        
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }
    
   
    public function getMailinglist(){
        
        $result = $this->mysqli->query('SELECT * FROM mailingList WHERE deletedCustomerNames = "na"');
        $customers = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                $customer = new Customer($row['_id'], $row['customerName'], $row['phoneNumber'], $row['emailAddress'], $row['referrer'], $row['deletedCustomerNames']);
                $customers[] = $customer;
				}
            $result->free();
            return $customers;
        }
        $result->free();
        return false;
    }
    
  
    public function getCustomer($customerId){
        $query = 'SELECT * FROM mailingList WHERE _id = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $customerId);
        $stmt->execute();
        $result = $stmt->get_result();
	
        if($result->num_rows == 1){
            $temp = $result->fetch_assoc();
            $customer = new Customer($temp['_id'], $temp['customerName'], $temp['phoneNumber'], $temp['emailAddress'], $temp['referrer'], $temp['deletedCustomerNames']);
			$result->free();
			return $customer;
        }
		$result->free();
        return false;
    }

    public function addContact($contact){
        if(!$this->mysqli->connect_errno){
            $query = 'INSERT INTO mailingList(customerName, phoneNumber, emailAddress, referrer, deletedCustomerNames) VALUES (?,?,?,?,?)';
            $stmt = $this->mysqli->prepare($query);
			if($stmt){
				$contactName = $contact->getCustomerName(); 
				$contactEmail = $contact->getEmailAddress();
				$contactPhone = $contact->getPhoneNumber();
				$contactReferral = $contact->getReferrer();
				$contactRemoved = $contact->getDeletedCustomerNames();
				$stmt->bind_param('sssss', $contactName, $contactPhone, $contactEmail, $contactReferral, $contactRemoved);
				
				$stmt->execute();
				if($stmt->error){
					return $stmt->error;
				} else {
					return $contact->getCustomerName() . ' added successfully!';
				}
			} else {
				$error = $this->mysqli->errno .' ' .$this->mysqli->error;
				echo $error;
				return $error;
			}
		} else{
			return 'Could not connect to database';
		}
    }
    
    public function deleteContact($id){
        if(!$this->mysqli->connect_errno){
			$contact = $this->getCustomer($id);
			$contact->setDeletedCustomerNames($contact->getCustomerName(). ' ' .$contact->getPhoneNumber(). ' '.$contact->getEmailAddress());
			$contact->setId(0);
			$this->addContact($contact);
				
			$query = 'DELETE FROM mailingList WHERE _id = ?';
			$stmt = $this->mysqli->prepare($query);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			if($stmt->error){
				return false;
			} else {
				return true;
			}	
		}else {
				return false;
		}
    }
    
   public function getRemovedCustomerList(){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM mailingList WHERE deletedCustomerNames <> "na"');
        $customers = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                $customer = new Customer($row['_id'], $row['customerName'], $row['phoneNumber'], $row['emailAddress'], $row['referrer'], $row['deletedCustomerNames']);
                $customers[] = $customer;
			}
            $result->free();
            return $customers;
        }
        $result->free();
        return false;
    }
}

?>
