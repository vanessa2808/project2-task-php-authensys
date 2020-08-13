<?php
class LibCommon {
    function redirectPage($link){
        header("Location: $link");
    }
}
?>