<?php
namespace Lukaszlesniewski\ExpertSender;

use Lukaszlesniewski\ExpertSender\Classes\ExpertSenderRequests;
use Lukaszlesniewski\ExpertSender\Classes\ExpertSenderEnum;

class Attributes
{    
    protected string $endpointUrl;
    
    function __construct(protected string $apiKey)
    {
        $this->endpointUrl = config('expertsender.es_api_url');
        $this->apiKey = $apiKey;
    }
    
    public function customerAttributes()
    {        
        $request = new ExpertSenderRequests($this->endpointUrl.'/customerattributes', $this->apiKey);
        return $request->get();
    }   
    
    public function orderAttributes()
    {
        $request = new ExpertSenderRequests($this->endpointUrl.'/orderattributes', $this->apiKey);
        return $request->get();
    } 
    
    public function productAttributes()
    {
        $request = new ExpertSenderRequests($this->endpointUrl.'/productattributes', $this->apiKey);
        return $request->get();
    } 
}