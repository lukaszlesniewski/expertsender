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
    
    public function _setCustomEventId(int $customEventId) : void
    {
        $this->data['customEventId'] = $customEventId;
    }
    
    public function _setCustomerId(int $customerId) : void
    {
        $this->data['customerId'] = $customerId;
    }
    
    public function _setCustomerEmail(string $customerEmail) : void
    {
        $this->data['customerEmail'] = $customerEmail;
    }
    
    public function _setCustomerEmailMd5(string $customerEmailMd5) : void
    {
        $this->data['customerEmailMd5'] = $customerEmailMd5;
    }
    
    public function _setCustomerEmailSha256(string $customerEmailSha256) : void
    {
        $this->data['customerEmailSha256'] = $customerEmailSha256;
    }
    
    public function _setCustomerPhone(string $customerPhone) : void
    {
        $this->data['customerPhone'] = $customerPhone;
    }

    public function _setCustomerCrmId(string $customerCrmId) : void
    {
        $this->data['customerCrmId'] = $customerCrmId;
    }
    
    public function _setDataFields(string $name, string $type, string $value) : void
    {
        $this->data['dataFields'][] = ['name' => $name, 'type' => $type, 'value' => $value];
    }

}