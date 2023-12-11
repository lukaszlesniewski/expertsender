<?php
namespace Lukaszlesniewski\ExpertSender\Classes;

class ExpertSenderRequests
{
    
    public function __construct(private string $endpointUrl, private string $apiKey) {}
    
    public function post(array|object $data = [])
    {
       return $this->_request($data, ExpertSenderEnum::METHOD_POST);
    }
    
    public function get(array|object $data = [])
    {
        return $this->_request($data);        
    }
    
    public function delete(array|object $data = [])
    {
        return $this->_request($data, ExpertSenderEnum::METHOD_DELETE);        
    }
    
    public function put(array|object $data = [])
    {
        return$this->_request($data, ExpertSenderEnum::METHOD_PUT);        
    }
    
    private function _request(array|object $data, string $requestType = ExpertSenderEnum::METHOD_GET) :  mixed
    {
        $ch = curl_init();
        
        $headers[] =  'x-api-key: '.$this->apiKey;
        
        curl_setopt($ch, CURLOPT_URL, $this->endpointUrl);
        if($requestType == ExpertSenderEnum::METHOD_POST)
        {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                json_encode($data));
            $headers[] = "Content-Type: application/json";
            $headers[] = "Accept-Encoding: gzip";
        }
        else 
        {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($requestType));
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                http_build_query($data));
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $info = curl_getinfo($ch);
        $return = curl_exec($ch);
                    
        curl_close($ch);
        
        return new ExpertSenderResults($info, $return);
    }
}