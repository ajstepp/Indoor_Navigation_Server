<?php
$fileName = $_GET['fileName'];
$srcNode = $_GET['start'];
$dstNode = $_GET['dst'];


class MyNode {
	public $x;
	public $y;
	public $name;
	public $distances = array();
	public function __construct($x, $y, $name){
		$this->x = intval($x);
		$this->y = intval($y);
		$this->nodeName = $name;
	}
}


function calculateDistance($n1_x, $n1_y, $n2_x, $n2_y){
	$delta_x = abs($n2_x - $n1_x);
	$delta_y = abs($n2_y - $n1_y);
	$linear_distance = sqrt((pow($delta_x, 2) + pow($delta_y, 2)));
	return $linear_distance;
}

function getDistances($node, $node_list){
	for($i = 0; $i < count($node_list); $i++){
		if($node_list[$i]->nodeName == $node->nodeName){
			array_push($node->distances, 0);
		}
		else{
			$distance = calculateDistance($node->x, $node->y, $node_list[$i]->x, $node_list[$i]->y);
			if($distance > 400){
				$distance = 0;

			}
			array_push($node->distances, intval($distance));
		}
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
$node_list = array();
for($i = 0; $i < count($raw_nodes); $i++){
	$x =  $raw_nodes[$i]."}";
	$data = explode(",",$x);
	$node_name = substr($data[0], 14, -1);
	$x_coord = substr($data[1], 4,-1);
	$y_coord = substr($data[2], 4, -1);
	$tmpNode = new MyNode($x_coord, $y_coord, $node_name);
	array_push($node_list, $tmpNode);
}

for($i = 0; $i < count($node_list); $i++){
	getDistances($node_list[$i], $node_list);

}
$readFile = fopen("read.txt", "w");
for($i = 0; $i < count($node_list); $i++){
	for($j = 0; $j < count($node_list[$i]->distances); $j++){
		 fwrite($readFile, $node_list[$i]->distances[$j]);	
		 fwrite($readFile," ");
	}
	fwrite($readFile, "\n");
}
exec("java Dijkstras_Shortest_Path ".$srcNode." ".$dstNode);

$writeFile = fopen("write.txt", "r");
echo fread($writeFile, filesize("write.txt"));
fclose($writeFile);
?>
