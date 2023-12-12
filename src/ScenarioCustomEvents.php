<?php
namespace Lukaszlesniewski\ExpertSender;

use Lukaszlesniewski\ExpertSender\Classes\ExpertSenderRequests;
use Lukaszlesniewski\ExpertSender\Classes\ExpertSenderEnum;

class ScenarioCustomEvents
{
    private string $endpoint = 'scenariocustomevents';
    
    protected string $endpointUrl;
    protected array $data;
    
    function __construct(protected string $apiKey)
    {
        $this->endpointUrl = config('expertsender.es_api_url') . '/' . $this->endpoint;
        $this->apiKey = $apiKey;
    }
    
    public function add(string $mode = ExpertSenderEnum::MODE_ADD)
    {        
        $request = new ExpertSenderRequests($this->endpointUrl, $this->apiKey);
        return $request->post($this->data);
    }    
    
    /*
     * SETTERS FOR DATA
     */
    
    public function setCustomEventId(int $customEventId) : void
    {
        $this->data['customEventId'] = $customEventId;
    }
    
    public function setCustomerId(int $customerId) : void
    {
        $this->data['customerId'] = $customerId;
    }
    
    public function setCustomerEmail(string $customerEmail) : void
    {
        $this->data['customerEmail'] = $customerEmail;
    }
    
    public function setCustomerEmailMd5(string $customerEmailMd5) : void
    {
        $this->data['customerEmailMd5'] = $customerEmailMd5;
    }
    
    public function setCustomerEmailSha256(string $customerEmailSha256) : void
    {
        $this->data['customerEmailSha256'] = $customerEmailSha256;
    }
    
    public function setCustomerPhone(string $customerPhone) : void
    {
        $this->data['customerPhone'] = $customerPhone;
    }

    public function setCustomerCrmId(string $customerCrmId) : void
    {
        $this->data['customerCrmId'] = $customerCrmId;
    }
    
    public function setDataFields(string $name, string $type, string $value) : void
    {
        $this->data['dataFields'][] = ['name' => $name, 'type' => $type, 'value' => $value];
    }

}