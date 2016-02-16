<?php
include_once 'Config.inc.php';
class MyDb{
	var $Host;
	var $Database;
	var $UserName;
	var $Password;
	var $Link_ID;
	var $Query_ID;
	var $Record;
	var $Records;
	function __construct()
	{
		$this->Host = constant('HOST');
		$this->Database = constant('DATABASE_NAME');
		$this->UserName = constant('USER_NAME');
		$this->Password = constant('PWD');
		$this->Link_ID = 0;
		$this->Query_ID = 0;
		$this->Record = array();
		$this->Records = array();
		$this->Connect();
	}
	function Connect()
	{
		if ( 0 == $this->Link_ID )
		{
			$this->Link_ID=mysql_connect($this->Host, $this->UserName , $this-> Password );
			$err = mysql_error();
			if($err)
			{
				printf("error:%s.\n code: %s\n", mysql_error(), mysql_errno());
				exit;
			}
		}
		mysql_select_db($this->Database,$this->Link_ID);
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER SET utf8 ",$this->Link_ID);
    	mysql_query("SET character_set_results =utf8 ",$this->Link_ID);
  }
  
  function Query($Query_String)
  {
	  	$this->Query_ID = mysql_query($Query_String,$this->Link_ID);
	  	$err = mysql_error();
	  	if($err)
	  	{
	  		printf("error:%s.\n code: %s\n", mysql_error(), mysql_errno());
	  		exit;
	  	}
	  	return $this->Query_ID;
  }
  
  function GetCount($Query_String)
  {
  	$this->Query_ID = mysql_query($Query_String,$this->Link_ID);
  	$count = mysql_fetch_array($this->Query_ID);
  	$err = mysql_error();
  	if($err)
  	{
  		printf("error:%s.\n code: %s\n", mysql_error(), mysql_errno());
  		exit;
  	}
  	return $count[0];
  }
  
  function GetRecord() {
  	$this->Record = mysql_fetch_array($this->Query_ID);
  	return $this->Record;
  }
  
  function GetRecords(){
  	$i = 0;
  	while($Row = $this->GetRecord()){
  		$this->Records[$i] = $Row;
  		$i++;
  	}
  	return $this->Records;
  }
  
  function SaveData($sql){
	  	$this->Query_ID = mysql_query($sql,$this->Link_ID);
	  	$err = mysql_error();
	  	if($err)
	  	{
	  		printf("error:%s.\n code: %s\n", mysql_error(), mysql_errno());
	  		exit;
	  	}
	  	return mysql_insert_id($this->Link_ID);
  }
  
  function UpdateData($sql){
  	$this->Query_ID = mysql_query($sql,$this->Link_ID);
  	$err = mysql_error();
  	if($err)
  	{
  		printf("error:%s.\n code: %s\n", mysql_error(), mysql_errno());
  		exit;
  	}
  	return $this->Query_ID;
  }
  
  function SaveDataWithTransaction($sql,$start,$end){
  	if($start)
  		$this->BeginTransaction();
  	$this->Query_ID = mysql_query($sql,$this->Link_ID);
  	$err = mysql_error();
  	if($err)
  	{
  		$this->RollbackTransaction();
  		printf("error:%s.\n code: %s\n", mysql_error(), mysql_errno());
  		exit;
  	}
  	$id = mysql_insert_id($this->Link_ID);
  	if($end)
  		$this->CommitTransaction();
  	return $id;
  }
  
  function CommitTransaction(){
  		mysql_query("COMMIT");
  }
  function BeginTransaction(){
  		mysql_query("BEGIN");
  }
  function RollbackTransaction(){
  		mysql_query("ROLLBACK");
  }
  
  function Close()
  {
  	if (0 != $this->Link_ID)
  	{
  		mysql_close($this->Link_ID);
  	}
  }
	
}

?>