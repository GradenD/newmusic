<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/header.php'?>

<?
  global $auth;
  if($auth){
    require_once 'lk.php';
  }else{
    require_once 'register.php';
  }
?>

<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/footer.php'?>