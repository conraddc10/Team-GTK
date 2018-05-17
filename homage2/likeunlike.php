<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "homage"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$userid = $_SESSION['userid'];
$postid = $_POST['postid'];
$type = $_POST['type'];


// // Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM like_unlike WHERE like_filmid=".$postid." and like_uamid=".$userid;

$result = mysqli_query($con,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];


if($count == 0){
    $insertquery = "INSERT INTO like_unlike(like_filmid,like_filmid,type) values(".$userid.",".$postid.",".$type.")";
    mysqli_query($con,$insertquery);
}else {
    $updatequery = "UPDATE like_unlike SET type=" . $type . " where like_uamid=" . $userid . " and like_filmid=" . $postid;
    mysqli_query($con,$updatequery);
}


// count numbers of like and unlike in post
$query = "SELECT COUNT(*) AS cntLike FROM like_unlike WHERE type=1 and like_filmid=".$postid;
$result = mysqli_query($con,$query);
$fetchlikes = mysqli_fetch_array($result);
$totalLikes = $fetchlikes['cntLike'];

$query = "SELECT COUNT(*) AS cntUnlike FROM like_unlike WHERE type=0 and like_filmid=".$postid;
$result = mysqli_query($con,$query);
$fetchunlikes = mysqli_fetch_array($result);
$totalUnlikes = $fetchunlikes['cntUnlike'];


$return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);

echo json_encode($return_arr);