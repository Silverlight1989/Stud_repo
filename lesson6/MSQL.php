<?
class M_MSQL{
	private $instance;//Îáúåêò êëàññà
	private $con;
	
	private function __construct(){
		setlocale(LC_ALL,'ru_RU.UTF-8');
		//Ïîäêëþ÷åíèå ê áàçå äàííûõ
		$this->con = mysqli_connect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASS,DB_NAME);	
		mysqli_query($this->con,"set names utf-8");		
	}
	
	public static function Instance(){
		if(self::$instance==null))
			self::$instance = new M_MSQL;	
		return self::$instance;
	}
	
	//Select
	//$query
	//ðåçóëüòàò - ìàññèâ âûáðàííûõ îáúåêòîâ
	
	//['title'=>'Òåñò',...]
	
	public function Select($query){
		$result = mysqli_query($this->con,$query);
		if(!$result){
			die(mysqli_error());	
		}
		$n = mysqli_num_rows($result);
		$arr=array();
		for($i=0;$i<$n;$i++){
			$row[$i] = mysqli_fetch_assoc($result);	
			$arr[] = $row[$i];
		}
	}
	
	
	//INSERT INTO TABLE(FIELD1,...) VALUES(VAL1,...)
	//$table
	//$object àññîöèàòèâíûé ìàññèâ ñ ïàðàìè âèäà "èìÿ ñòîëáöà-çíà÷åíèå"
	//ðåçóëüòàò - èäåíòèôèêàòîð íîâîé ñòðîêè
	public function Insert($table,$object){
		$columns = array();
		$values = array();
		foreach($object as $key =>$value){
			$columns[] = $key;
			if($value==null){
				$values[]='NULL';	
			}
			else{
				$value = mysqli_real_escape_string($value);
				$values[] = "'$value'";	
			}
		}
		$columns_s = implode(',',$columns);
		$values_s = implode(',',$values);
		
		$query = "INSERT INTO $table($columns_s) VALUE ($values_s)";
		$result = mysqli_query($this->con,$query);
		if(!$result)
			die(mysqli_error());
		return mysqli_insert_id();
	}
	
	function Update($table,$object,$where){
		$sets = array();
		foreach($object as $key =>$value){
			$columns[] = $key;
			if($value==null){
				$sets[]="$key='NULL'";	
			}
			else{
				$value = mysqli_real_escape_string($value);
				$sets[]="$key='$value'";	
			}
		}
		$sets_s = implode(",",$sets);
		$result = mysqli_query($this->con,"UPDATE $table SET $sets_s WHERE $where");
		if(!$result)
			die(mysqli_error());
		return mysqli_affected_rows();
	}
	
	function Delete($table,$where){
		$query = "DELETE FROM $table WHERE $where";
		$result = mysqli_query($this->con,$query);
		if(!$result)
			die(mysqli_error());
		return mysqli_affected_rows();
	}?>