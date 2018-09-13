<?php
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: POST");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
// Check connection
    $postdata = file_get_contents("php://input");
    if (isset($postdata)) {
        function ScaniDir($path){
            $ptd= opendir($path);
            while (( $ptdf=readdir($ptd))){
            $srca = $path.'/'.$ptdf;
            if (is_file($srca) and pathinfo($srca, PATHINFO_EXTENSION)=='pdf') {$files['src'][]=$srca;$files['name'][]=explode('.',$ptdf)[0];}
            
            }
            return $files ;
            
            }
        $request = json_decode($postdata);
        $folder = $request->folder;
        $files =(is_dir($folder)) ? ScaniDir($folder) : null;
        print_r(json_encode($files));
    }
    else {
        echo "Not called properly with Action parameter!";
    }

?>
