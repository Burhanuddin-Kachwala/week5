<!DOCTYPE html>
<html>
<body>

<?php
trait message1 {
  public function msg1() {
    echo "OOP is fun! "; 
  }
}

trait message2 {
  public function msg1() {
    echo "OOP reduces code duplication!"; 
  }
}


class Welcome2 {
  use message1, message2;
}





$obj2 = new Welcome2();
// $obj2->msg();
echo "<pre>";
   print_r("Error: ".$obj2->msg1());
   echo "</pre>";

?>
 
</body>
</html>
