<?php
class MyCurl{
    private $response;


    public function __construct(){
    }

    public function __destruct(){
        self::destroy($this->response);
    }

    public function init_curl($url,$method="GET"){
        $ch = curl_init(); 
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
        curl_setopt($ch, CURLOPT_TCP_FASTOPEN,true );
        curl_setopt($ch, CURLOPT_TCP_NODELAY,true );
        curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE,true );
        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        //curl_setopt($ch, CURLOPT_ENCODING, '');
        //curl_setopt($ch, CURLOPT_RESOLVE, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 0);
        curl_setopt($ch,CURLOPT_HEADER, false);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $this->response = curl_exec($ch);
        if (curl_error($ch)) {
            throw new \Exception('error (' . curl_errno($ch) . '): ' . curl_error($ch));
        }
        curl_close($ch);
        return $this->response;
    }

    public function init_method($method){

    }

    protected function destroy($var){
        unset($var);
        $var = null;
    }
}
?>