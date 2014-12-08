<?php

if(!isUserLoggedIn()){
  home(); 
}

session_destroy();
home();
die();

