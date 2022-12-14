<?php
include_once "../autoloader.php";
session_start();
if (isset($_POST['addTripToCart'])) addTripToCart();
if (isset($_POST['deleteOrderByIndex'])) deleteOrderFromCart();
if (isset($_POST['processCheckingOut'])) processCheckingOut();



function addTripToCart(){
    $id =$_POST["id"];
    $gare_depart =$_POST["gare_depart"];
    $gare_arrive =$_POST["gare_arrive"];
    $date_voyage = $_POST["date_voyage"];
    $prix_ticket=$_POST['prix_ticket'];

    if(!isset($_SESSION['order-list'])) $_SESSION['order-list']=array();
    $exist=false;
    /*foreach ($_SESSION['order-list'] as $order){
        if($order['id']==$id){
            $order['quantity']+=1;
            //echo "<script>alert('".$order['quantity']."')</script>";
            $exist=true;
        }
    }*/
    for ($i=0 ; $i<count($_SESSION['order-list']);$i++){
        if($_SESSION['order-list'][$i]['id']==$id){
            $_SESSION['order-list'][$i]['quantity']+=1;
            $exist=true;
        }
    }
    if(!$exist){
        $newOrder=array("id"=>$id,"gare_depart"=>$gare_depart,"gare_arrive"=>$gare_arrive,"date_voyage"=>$date_voyage,"prix_ticket"=>$prix_ticket,"quantity"=>1);
        array_push($_SESSION['order-list'],$newOrder);
    }
    echo json_encode($_SESSION['order-list']);
}


function deleteOrderFromCart(){
    $id = $_POST['deleteOrderByIndex'];
    array_splice($_SESSION['order-list'], $id, 1);
    echo json_encode($_SESSION['order-list']);
}



function processCheckingOut(){
    $id_user=$_SESSION['user']['id'];
    $orders=$_SESSION['order-list'];
    //echo json_encode($orders);
    $userModel = new UserModel();
    echo $userModel->bookTrip($id_user,$orders);

}