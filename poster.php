<?php
function curl_wrap($url, $postfields) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

$url = "your-default-discord-webhook-url";

if (isset($_GET['url'])) {
    $url = $_GET['url'];
}

if (isset($_GET['name'])) {
    $postfields['name'] = $_GET['name'];
}

if (strpos($_SERVER["REQUEST_URI"],"&")>0) {
    $content = urldecode($_SERVER["REQUEST_URI"]);
    $content = preg_replace("/^\/.*\?/D","",$content);
    $content = preg_replace("/[\&url,url]=.*[&content=,]/D","",$content);
    $content = str_replace("&content=","",$content);
    $content = str_replace("content=","",$content);
}
 
if (isset($_GET['content'])) {
    if (mb_strlen($_GET['content'])<mb_strlen($content)){
        $postfields["content"] = $content;
    }else {
        $content = urldecode($_SERVER["REQUEST_URI"]);
        $content = preg_replace("/^\/.*\?/D","",$content);
        $content = preg_replace("/?url=.*\&content=/D","",$content);

        if(mb_strlen($_GET['content'])<mb_strlen($content)&&strpos($content,'url=')=== false){
            $postfields["content"] = $content;
        }else {
            $postfields["content"] = $_GET['content'];
        }
    }
} else {
    return "null";
}
return $data = curl_wrap($url, $postfields);
?>
