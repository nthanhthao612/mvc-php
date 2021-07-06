<?php
class Session{
   public $temp;
   public function init(){
      if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
         session_start();
      }
   }

   public function set($key, $val){
      $_SESSION[$key] = $val;
   }
   public function get($key){
      if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
      } else {
      return false;
      }
   }
   public function checkLogin(){
      if($this->get('login')==True)
         return True;
      else
         return False;
   }
   public function destroy(){
      session_destroy();
   }
}

?>
