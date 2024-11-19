<?php
session_start();
session_unset();
session_destroy();
// echo "<script>window.confirm('Are you Sure You want to Log Out?')</script>";
// echo "<script>if (confirm('Are you Sure You want to Log Out?')) {
//     window.open('../index.php','_self')
//   }else
//   {

//    } </script>";
echo "<script>window.open('../index.php','_self')</script>";


?>
