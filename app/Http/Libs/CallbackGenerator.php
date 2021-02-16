<?php


namespace App\Http\Libs;

use Exception;
use Illuminate\Http\Request;

class CallbackGenerator
{
    private $request_params = [];
    private $request_headers = [];
    private $request_response = null;

    private $url = null;
    private $username = null;
    private $password = null;

    private $method = 'post';
    private $isRaw = false;

    private function getMethod(){
        return $this->method;
    }

    private function getLink(){
        return $this->url;
    }

    private function getParamsQuery(){
        return '?'.Strings::arrayToQueryString($this->request_params);
    }

    public function setParams($data = []){
        foreach ($data as $key => $value){
            $this->request_params[$key] = $value;
        }
    }

    public function getParam($key){
        if(!is_null($this->request_response->{$key}))
            return $this->request_response->{$key};

        return null;
    }

    public function setParam($key, $value){
        $this->request_params[$key] = $value;
    }

    public function setHeaders($data = []){
        foreach ($data as $key => $value){
            $this->request_headers[] = $key.': '.$value;
        }
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setLink($url = null){
        $this->url = $url;
    }

    public function setMethod($method = 'get'){
        $this->method = $method;
    }

    public function setRaw($isRaw = false){
        $this->isRaw = $isRaw;
    }

    public function makeRequest(){
        try{
            $url = $this->getLink();

            if($this->getMethod() == 'get')
                $url = $url.$this->getParamsQuery();

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->request_headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($curl, CURLOPT_TIMEOUT, 2000);
            curl_setopt($curl, CURLOPT_USERPWD, $this->username . ":" . $this->password);


            if($this->getMethod() == 'post'){
                curl_setopt($curl, CURLOPT_POST, true);

                if($this->isRaw){
                    curl_setopt($curl, CURLOPT_POSTFIELDS, Strings::JsonEncode($this->request_params));
                }else{
                    curl_setopt($curl, CURLOPT_POSTFIELDS, Strings::arrayToQueryString($this->request_params));
                }
            }

            curl_exec($curl);
            $this->request_response = curl_exec($curl);

            if( !$this->request_response){
                trigger_error(curl_error($curl));
            }

            curl_close($curl);

            $this->request_response = Strings::JsonDecode($this->request_response);

        }catch (Exception $exception){
            dd($exception);
        }
    }

    public function debugResponse(){
        dd([
            $this->getLink(),
            $this->request_params,
            $this->request_headers,
            $this->request_response,
        ]);
    }

}
