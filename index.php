<?php
// localhost/app_listrik/index.php?mod=daya
if(isset($_GET['mod'])) {
    $mod = $_GET['mod'];
    if(file_exists("modules/mod_$mod/$mod.php")) {
        include "modules/mod_$mod/$mod.php";
    } else {
        echo "Modul tidak ada";
    }
} else {
    echo "Selamat datang";
}
