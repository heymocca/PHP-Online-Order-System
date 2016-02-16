<?php
include_once 'Database.inc.php';
include_once 'Entity.inc.php';
include_once 'Config.inc.php';
class BaseService{
	
	function GetInsertSQL($DataArray){
		$temp = '';
		$col = ' (';
		$data = ' values (';
		foreach($DataArray as $key=>$value){
			$col .=$key.',';
			$data .=$value.",";
		}
		$col = substr($col,0,strlen($col)-1).') ';
		$data = substr($data,0,strlen($data)-1).') ';
		$temp = $col.$data;
		return $temp;
	}
	
	function GetInsertSQLWihtQuote($DataArray){
		$temp = '';
		$col = ' (';
		$data = ' values (';
		foreach($DataArray as $key=>$value){
			$col .=$key.',';
			$data .="'".$value."',";
		}
		$col = substr($col,0,strlen($col)-1).') ';
		$data = substr($data,0,strlen($data)-1).') ';
		$temp = $col.$data;
		return $temp;
	}
	
	function GetRows($sql){
		try{
			$conn = new MyDb();
			$conn->Query($sql);
			$array = $conn->GetRecords();
			if($array){
				$conn->Close();
				return $array;
			}
				
		}catch (Exception $e){
			$conn->Close();
			echo $e->getMessage();
		}
		$conn->Close();
		return null;
	}
	
	function GetCount($sql){
		try{
			$conn = new MyDb();
			$count = $conn->GetCount($sql);
			if($count){
				$conn->Close();
				return $count;
			}
		
		}catch (Exception $e){
			$conn->Close();
			echo $e->getMessage();
		}
		$conn->Close();
		return 0;
	}
	
	function SetPaging($sql,$page){
		$offset = ($page-1)*constant('PAGE_SIZE');
		return $sql." limit ".$offset.",".constant('PAGE_SIZE');
	}
	
	function GetCurrentPage($totalPage){
		$cp;
		if(isset($_POST["currentPage"])){
			$cp = $_POST["currentPage"];
		}
		
		if(isset($_POST["btnFirstPage"])){
			$cp = 1;
		}else if(isset($_POST["btnPreviousPage"])){
			if($cp>1){
				$cp-=1;
			}
		}else if(isset($_POST["btnNextPage"])){
			if($cp<$totalPage){
				$cp+=1;
			}
		}else if(isset($_POST["btnLastPage"])){
			$cp=$totalPage;
		}else{
			$cp = 1;
		}
		return $cp;
	}
	
	function GetTotalPage($totalCount){
		$totalPage = 0;
		if($totalCount==0){
			$totalPage = 0;
		}else{
			$pageSize = constant("PAGE_SIZE");
			if($totalCount<=$pageSize){
				$totalPage = 1;
			}else{
				if($totalCount%$pageSize == 0){
					$totalPage = $totalCount/$pageSize;
				}else{
					$totalPage = floor($totalCount/$pageSize)+1;
				}
			}
		}
		return $totalPage;
	}
	
	function Save($sql){
		try{
			$conn = new MyDb();
			$id = $conn->SaveData($sql);
			$conn->Close();
			return $id;
		}catch (Exception $e){
			$conn->Close();
			echo $e->getMessage();
		}
		return 0;
	}
	
	function Update($sql){
		try{
			$conn = new MyDb();
			$id = $conn->UpdateData($sql);
			$conn->Close();
			return $id;
		}catch (Exception $e){
			$conn->Close();
			echo $e->getMessage();
		}
		return 0;
	}
}


class LoginService extends BaseService{
	
	function getRow($userName,$pwd){
		try{
			$query = "SELECT * FROM admin WHERE admin_name = '".$userName."' and admin_password ='".$pwd."'";
			$conn = new MyDb();
			$conn->Query($query);
			$array = $conn->GetRecord();
			if($array){
				$admin = new Admin();
				$admin->admin_id = $array["admin_id"];
				$admin->admin_name = $array["admin_name"];
				$conn->Close();
				return $admin;
			}
		}catch (Exception $e){
			$conn->Close();
			echo $e->getMessage();
		}
		return null;
	}
	
	function loginForSite($userName,$pwd){
		try{
			$query = "SELECT * FROM customer WHERE customer_name = '".$userName."' and customer_password ='".$pwd."'";
			$conn = new MyDb();
			$conn->Query($query);
			$array = $conn->GetRecord();
			if($array){
				if($array["customer_status"] == constant("CUSTOMER_PASS")){
					$cust = new Customer();
					$cust->CustId = $array["customer_id"];
					$cust->CustName = $array["customer_name"];
					$cust->Password = $array["customer_password"];
					$cust->HomePhone = $array["customer_home_phone"];
					$cust->WorkPhone = $array["customer_work_phone"];
					$cust->MobilePhone = $array["customer_mobile_phone"];
					$cust->FaxNumber = $array["customer_fax_number"];
					$cust->Email = $array["customer_email"];
					$_SESSION["customer"] = $cust;
					$conn->Close();
					return 1;
				}else{
					$conn->Close();
					return 2;
				}
			}else{
				$conn->Close();
				return 3;
			}
		}catch (Exception $e){
			$conn->Close();
			echo $e->getMessage();
		}
	}
}


class SupplierService extends BaseService{
	
	
}

class CategoryService extends BaseService{
	function CategorysForSite(){
		$sql = "select c.*,(select COUNT(*) from hat h 
				where h.hat_category_id=c.category_id) as orderNum
				from category c 
				order by orderNum desc;";
		return $this->GetRows($sql);
	}
}

class CustomerService extends BaseService{
	function UpdateStatus($custId){
		$query = " select * from customer where customer_id='".$custId."'";
		$conn = new MyDb();
		$conn->Query($query);
		$array = $conn->GetRecord();
		$status = $array["customer_status"];
		if($status==constant("CUSTOMER_DENY")){
			$status = constant("CUSTOMER_PASS");
		}else{
			$status = constant("CUSTOMER_DENY");
		}
		$sql = "update customer set customer_status='".$status."' where customer_id='".$custId."'";
		$id = $conn->UpdateData($sql);
		$conn->Close();
		return $id;
	}
	
	function saveCustomer($sql,$email,$userName,$pwd){
		sendMail($email, $userName, $pwd);
		return $this->Save($sql);
	}
}

class OrderService extends BaseService{
	function UpdateStatus($orderId,$status){
		$conn = new MyDb();
		$sql = "update `order` set order_status='".$status."' where order_id='".$orderId."'";
		$id = $conn->UpdateData($sql);
		$conn->Close();
		return $id;
	}
	
	function InseterOrder(){
		try{
			$sql = "insert into `order` ";
			$cart = $_SESSION[constant("SESSION_CART")];
			$customer =  $_SESSION["customer"];
			$custId = $customer->CustId;
			$hats = $cart->list;
			$orderArray = array(
					"order_number"=>"'".getOrderNumber($custId)."'",
					"order_status"=>"'".constant("ORDER_WAITING")."'",
					"order_customer_id"=>"'".$custId."'",
					"order_gst"=>"'".constant("GST")."'",
					"order_subtotal"=>"'".$cart->subTotal."'"
			);
			$sql .= parent::GetInsertSQL($orderArray);
			
			$conn = new MyDb();
			$id = $conn->SaveDataWithTransaction($sql,true,false);
			if($id!=0){
				$items_sql = " insert into order_item ";
				foreach($hats as $hat){
					$dataArray = array(
							"item_hat_id"=>"'".$hat->HatId."'",
							"item_order_id"=>"'".$id."'",
							"item_quantity"=>"'".$hat->Quantity."'",
							"item_price"=>"'".$hat->Price."'"
					);
					$sqltemp=$items_sql.parent::GetInsertSQL($dataArray);
					$conn->SaveDataWithTransaction($sqltemp,false,false);
				}
			}
			$conn->CommitTransaction();
			$conn->Close();
			return $id;
		}catch (Exception $e){
			$conn->Close();
			echo $e->getMessage();
		}
		return 0;
	}

}

class OrderItemService extends BaseService{
	
}

class HatService extends BaseService{
	function SaveHat($sql,$suppliers){
		try{
			$conn = new MyDb();
			$id = $conn->SaveDataWithTransaction($sql,true,false);
			if($id!=0){
				$suppliers_sql = " insert into map_hat_supplier ";
				$supplier_array = explode(',',$suppliers);
				foreach($supplier_array as $sid){
					$dataArray = array(
						"map_hat_id"=>"'".$id."'",
						"map_supplier_id"=>"'".$sid."'"
					);
					$sqltemp=$suppliers_sql.parent::GetInsertSQL($dataArray);
					$conn->SaveDataWithTransaction($sqltemp,false,false);
				}
			}
			$conn->CommitTransaction();
			$conn->Close();
			return $id;
		}catch (Exception $e){
			$conn->Close();
			echo $e->getMessage();
		}
		return 0;
	}
}



?>