<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['session_id']) && isset($_POST['action'])){
    $rt=array('status'=>false,'message'=>'Error To Connect');
    if($_POST['action']=='connect_it'){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://beta.admin.financelobby.com/users?page=1');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: finance_lobby_session=".$_POST['session_id']));

        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $r = curl_exec($ch);

        $rt['data']=$r;
        $rt['status']=true;
        $rt['message']='Connected Successfully';
        

    }
    else  if($_POST['action']=='fetch_page'){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://beta.admin.financelobby.com/users?page='.$_POST['page']);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: finance_lobby_session=".$_POST['session_id']));

        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $r = curl_exec($ch);

        $rt['data']=$r;
        $rt['status']=true;
    }
    else{
        $rt['message']='Unknow Action';
    }
    echo json_encode($rt);
    die();
}