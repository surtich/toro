<?php

require("toro.php");

header('Content-Type: application/json; charset=utf-8');

class HelloHandler {
    function get() {
      echo "Hello, world";
    }
}

class TestHandler {
    function get($name) {
      echo "Test $name";
    }
}

class Test2Handler {
    function get($name, $age) {
      echo "Test $name $age";
    }
}
class Test4Handler {
    function post() {
      echo "Test4 name $_POST[name], age  $_POST[age]";
    }
}

class Test3Handler {
    function get($name, $age) {
    	$data = array("items"=>array("firstname"=>"faheem", "lastname"=>"abbas","address"=>"pakistan"));
    	echo json_encode($data);
    }
}

Toro::serve(array(
    "/" => "HelloHandler",
     "/test/:alpha" => "TestHandler",
     "/test2/user/:alpha/age/:number" => "Test2Handler",
     "/test3" => "Test3Handler",
     "/test4" => "Test4Handler"
));

?>

