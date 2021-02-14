<?php 
function testTimeOut(){
    //tempo máximo de inatividade em segundos
    $timeout=3000;
    //check de tempo
    if (isset($_SESSION['timeout'])){
        $duaracao= time()-$_SESSION['timeout'];
        if($duaracao>$timeout){
            session_unset();
            session_destroy();
            header("Location: index.php");
        };
    }
    $_SESSION['timeout']=time();
    
};
//echo $_SERVER['REQUEST_URI'];
?>