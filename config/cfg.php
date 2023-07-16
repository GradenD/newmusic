<?php
    function script($txt, $class=false){
        return "\n<div class='$class'>\n<script>\n" . $txt . "\n</script>\n</div>\n";
    }
    const __PAGES__ =  'pages/';
    const __TMP__ =  'tmp/';
    const __LIB__ = 'library/';
    const __CFG__ = 'config/';
?>