<?php
//name => required , string , min 3
//email => required , email 
//pass => required , string , max 20
// 1-we must filter inputs to protect them from any danger 
// 2-we must make them required

// variables
$error="";
$res="";
$success="";
//---------------------------------------------required inputs----------------------------------------
function Required_Input($value){
    $str=trim($value);
    if(strlen($str) > 0){
        return true;
    }else{
        return false;
    }
}
//----------------------------------------------------------------------------------------------------
//--------------------------------------------sanitize string input-----------------------------------
function Sant_String($value){
    $str=trim($value);
    $str=filter_var($str,FILTER_SANITIZE_STRING); //to deal with all <scripts> as a string
    return $str;
}
//sanitize email input
function Sant_Email($email){
    $email=trim($email);
    $email=filter_var($email,FILTER_SANITIZE_EMAIL); //to deal with all <scripts> as a string
    return $email;
}
//--------------------------------------------------------------------------------------------------
//---------------------------minuim input ---------------- Max input--------------------------------
function Mini_Input($value , $min){
    if(strlen($value) < $min ){
        return false;
    }else{
        return true;
    }
}
function Max_Input($value , $max){
    if(strlen($value) > $max ){
        return false;
    }else
    {
        return true;
    }
}
//--------------------------------------------------------------------------------------------
//-------------------------------------Validate Email----------------------------------------
function Valid_Email($email){
    if(filter_var($email , FILTER_VALIDATE_EMAIL)){
        return true;
    }else
    {
        return false;
    }
}
