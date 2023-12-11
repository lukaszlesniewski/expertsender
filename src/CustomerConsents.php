<?php
namespace Lukaszlesniewski\ExpertSender;

use Lukaszlesniewski\ExpertSender\Classes\ExpertSenderRequests;
use Lukaszlesniewski\ExpertSender\Classes\ExpertSenderEnum;

class CustomerConsents
{
    private string $endpoint = 'customerconsents';
    
    protected string $endpointUrl;
    protected array $data;
    
    function __construct(protected string $apiKey)
    {
        $this->endpointUrl = config('expertsender.es_api_url') . '/' . $this->endpoint;
        $this->apiKey = $apiKey;
    }
    
    public function get()
    {        
        $request = new ExpertSenderRequests($this->endpointUrl, $this->apiKey);
        return $request->get();
    }    
}