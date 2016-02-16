<?php
	class Admin{
		public $admin_id;
		public $admin_name;
	}
	class Customer{
		public $CustId;
		public $CustName;
		public $Password;
		public $HomePhone;
		public $WorkPhone;
		public $MobilePhone;
		public $FaxNumber;
		public $Email;
	}
	class Hat{
		public $HatId;
		public $HatName;
		public $ImgUrl;
		public $Price;
		public $Quantity;
		
		function __construct(){
			$Quantity = 1;
		}
		
		function GetSubTotal(){
			return $this->Price*$this->Quantity;
		}
	}
	
	class MyCart{
		public $list;
		public $totalCost;
		public $totalCount;
		public $subTotal;
		
		function __construct(){
			$this->list = array();
		}
		
		function clearCart(){
			$this->list = array();
			$this->totalCost=0;
			$this->totalCount=0;
			$this->subTotal=0;
		}
		function CalculateTotal(){
			$this->totalCost=0;
			$this->totalCount=0;
			$this->subTotal=0;
			foreach($this->list as $hat){
				$this->subTotal+=$hat->GetSubTotal();
				$this->totalCount+=$hat->Quantity;
			}
			$this->totalCost = $this->subTotal+number_format(($this->subTotal*constant('GST')/100),2);
		}
		function OperateCart($id,$type){
			if ($type=="delete"){
				$this->DeleteById($id);
			}
			else if($type=="more"){
				$this->AddOneMore($id);
			}
			else if($type=="less"){
				$this->AddOneLess($id);
			}
		}
		function FindHat($id){
			if(array_key_exists ($id,$this->list)){
				return $this->list[$id];
			}else{
				return null;
			}
		}
		function AddHat($hat) {
	        $hatInArray = $this->FindHat($hat->HatId);
	        if (!$hatInArray)
	        {
	            $this->list[$hat->HatId] = $hat;
	        }
	        else{
	            $hatInArray->Quantity+=1;
	        }
	        $this->CalculateTotal();
	    }
	    
	    function DeleteById($id) {
	    	unset($this->list[$id]);
	    	$this->CalculateTotal();
	    }
	    function AddOneMore($id)
	    {
	    	$hatInArray = $this->FindHat($id);
	    	$hatInArray->Quantity+=1;
	    	$this->CalculateTotal();
	    }
	    function AddOneLess($id)
	    {
	    	$hatInArray = $this->FindHat($id);
	    	if($hatInArray->Quantity > 1){
	    		$hatInArray->Quantity-=1;
	    	}
	    	$this->CalculateTotal();
	    }

	    function toString(){
	    	echo "totalCost=".$this->totalCost."<br/>";
	    	echo "totalCount=".$this->totalCount."<br/>";
	    	echo "subTotal=".$this->subTotal."<br/>";
	    	foreach ($this->list as $key=>$hat){
	    		echo "key=".$key."<br/>";
	    		echo "HatId=".$hat->HatId."<br/>";
	    		echo "HatName=".$hat->HatName."<br/>";
	    		echo "Price=".$hat->Price."<br/>";
	    		echo "Quantity=".$hat->Quantity."<br/>";
	    		echo "-----------------------------------"."<br/>";
	    	}
	    }
	}
?>