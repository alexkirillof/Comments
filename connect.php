<?php
$conn = new mysqli("127.0.0.1", "root", "", "Comments");

$data = json_decode(file_get_contents("php://input"));
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$out = array('error' => false);
 
$action="show";
 
if(isset($_GET['action'])){
    $action=$_GET['action'];
}
 
switch ($action) {
    case 'show':
        $sql = "SELECT * FROM comments ORDER BY date DESC";
    $query = $conn->query($sql);
    $comments = array();
 
    while($row = $query->fetch_array()){
        array_push($comments, $row);
    }
 
    $out['comments'] = $comments;
        break;
    case 'add':
        $name=$_POST['name'];
    $comment=$_POST['comment'];
    $date = date ('Y-m-d H:i:s');
    if($name==''){
        $out['error']=true;
        $out['message']='Name Empty.';
    }
    elseif($comment==''){
        $out['error']=true;
        $out['message']='Comment Empty.';
    }
    else{
            $sql="INSERT INTO comments (`name`, `comment`, `date`) VALUES ('$name', '$comment', '$date')";
            $query=$conn->query($sql);
        if($query){
            $out['message']='Member Successfully Added';
        }
        else{
            $out['error']=true;
            $out['message']='Error in Adding Occured';
        }
    }
        break;
    case 'delete':
        $id = $data->id;
        $sql="DELETE FROM comments WHERE id=".$id;
        $query=$conn->query($sql);
      echo "Delete successfully";
      exit;
        break;
}

header("Content-type: application/json");
echo json_encode($out);
?>