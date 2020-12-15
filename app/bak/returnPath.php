<?php
$fileName = $_GET['fileName'];
$srcNode = $_GET['start'];
$dstNode = $_GET['dst'];


class MyNode {
	public $x;
	public $y;
	public $name;
	public $distances;
	public function __construct($x, $y, $name){
		$this->$x = $x;
		$this->$y = $y;
		$this->$name = $name;


	}

}





include_once("utils.php");
$query = "SELECT BlobData FROM Maps WHERE fileName = '".$fileName."';";
if($result = mysqli_query($link, $query)){
	while($row = mysqli_fetch_row($result)){
		$data_start_pos = strpos($row[0] , "}")+2;
		$data = substr($row[0], $data_start_pos);

	}
}
$raw_nodes = explode("}",$data);
for($i = 0; $i < count($raw_nodes); $i++){


	$x =  $raw_nodes[0]."}";
	echo $x;
	$data = explode(",",$x);
	var_dump($coords);
for($i = 0; $i < count($data); $i++){
	$x

}
	
}




?>
