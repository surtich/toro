<?php

require("toro.php");



class HelloHandler {
    function get() {
      echo "Hello, world";
    }

    function post() {
      echo "Bye, world";
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
      header('Content-Type: application/json; charset=utf-8');
      $data = array("items"=>array("firstname"=>"faheem", "lastname"=>"abbas","address"=>"pakistan"));
      echo json_encode($data);
    }
}

ToroHook::add("404",  function() {
  header('HTTP/1.0 404 Not Found');
  echo "Error";
});

Toro::serve(array(
    "/" => "HelloHandler",
     "/test/:alpha" => "TestHandler",
     "/test2/user/:alpha/age/:number" => "Test2Handler",
     "/test3" => "Test3Handler",
     "/test4" => "Test4Handler"
));

?>

