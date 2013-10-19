<?php

class Controller {

    function get($parameter) {
        if($parameter==""){
            readfile('dump.json');
        } else {
            readfile('detail.json');
        }


       // http_response_code(404);
    }

    function post() {
        if (!isset($_POST['point'])) {
            http_response_code(404);
            return;
        }

        $demo = 'POINT(-63.1803345680357396 -17.7778929161673211)';

        //if ($_POST['point'] != $demo) {
        //    http_response_code(404); return;
        //}

        readfile('dump.json');
    }
}
