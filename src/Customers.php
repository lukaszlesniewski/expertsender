<?php
namespace Lukaszlesniewski\ExpertSender;

use Lukaszlesniewski\ExpertSender\Classes\ExpertSenderRequests;
use Lukaszlesniewski\ExpertSender\Classes\ExpertSenderEnum;

class Customers
{
    private string $endpoint = 'customers';
    
    protected string $endpointUrl;
    protected array $data;
    
    function __construct(protected string $apiKey)
    {
        $this->endpointUrl = config('expertsender.es_api_url') . '/' . $this->endpoint;
        $this->apiKey = $apiKey;
    }
    
    public function add(string $mode = ExpertSenderEnum::MODE_ADD)
    {        
        $fields = [            
                    'mode' => $mode,
                    'matchBy' => 'email',
                    'data' => [0 => $this->data]
            ];
        
        $request = new ExpertSenderRequests($this->endpointUrl, $this->apiKey);
        return $request->post($fields);
    }    
    
    public function getById(int $customerId)
    {        
        $request = new ExpertSenderRequests($this->endpointUrl. '/id/'. $customerId, $this->apiKey);
        return $request->get();
    }
    
    public function getByEmail(string $customerEmail)
    {
        $request = new ExpertSenderRequests($this->endpointUrl. '/email/'. $customerEmail, $this->apiKey);
        return $request->get();
    }
    
    public function getByPhone(string $customerPhone)
    {
        $request = new ExpertSenderRequests($this->endpointUrl. '/phone/'. $customerPhone, $this->apiKey);
        return $request->get();
    }
    
    public function getByCrmId(string $customerCrmId)
    {
        $request = new ExpertSenderRequests($this->endpointUrl. '/crmId/'. $customerCrmId, $this->apiKey);
        return $request->get();
    }
    
    
    /*
     * SETTERS FOR DATA
     */
    
    public function setData(array $data) : void
    {
        $this->data = $data;
    }
    
    public function setCustomElement(string $name, mixed $value) : void
    {
        $this->data[$name] = $value;
    }
    
    public function setEmail(string $email) : void
    {
        $this->data['email'] = $email;
    }
    
    public function setPhone(string $phone) : void
    {
        $this->data['phone'] = $phone;
    }
    
    public function setCrmId(string $id) : void
    {
        $this->data['crmId'] = $id;
    }
    
    public function setFirstName(string $firstName) : void
    {
        $this->data['firstName'] = $firstName;
    }
    
    public function setLastName(string $lastName) : void
    {
        $this->data['lastName'] = $lastName;
    }
    
    public function setCustomAttribute(string $name, mixed $value) : void
    {
        $this->data['customAttributes'][] = ['name' => $name, 'value' => $value];
    }
    
    public function setConsentsData(int $consentId, mixed $value) : void
    {
        $this->data['consentsData']['consents'][] = ['id' => $consentId, 'value' => $value];
    }
    
    public function setConsentsDataForce(bool $value) : void
    {
        $this->data['consentsData']['force'] = $value;
    }
    
    public function setConsentsDataConfirmationMessageId(int $value) : void
    {
        $this->data['consentsData']['confirmationMessageId'] = $value;
    }
}