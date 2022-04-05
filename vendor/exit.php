<?php
  setcookie("user",$login, time() - 3600, "/");
  $_SESSION = [];
  header('Location: ../');
