<?php	
	class MenuItem{
		private $itemName, $description, $price, $image;
		
		function __construct($itemName, $description, $price, $image){
			$this->itemName = $itemName;
			$this->description = $description;
			$this->price = $price;
			$this->image = $image;
		}
		
		function set_item_name($itemName){
			$this->itemName = $itemName;
		}
		
		function get_item_name(){
			return $this->itemName;
		}
		
		function set_description($description){
			$this->description = $description;
		}
		
		function get_description(){
			return $this->description;
		}
		
		function set_price($price){
			$this->price = $price;
		}
		
		function get_price(){
			return $this->price;
		}
		
		function set_image($image){
			$this->image = $image;
		}
		
		function get_image(){
			return $this->image;
		}
	}
?>