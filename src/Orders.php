<?php
namespace Lukaszlesniewski\ExpertSender;

use Lukaszlesniewski\ExpertSender\Classes\ExpertSenderRequests;
use Lukaszlesniewski\ExpertSender\Classes\ExpertSenderEnum;

class Orders
{
    private string $endpoint = 'orders';
    
    protected string $endpointUrl;
    protected array $data;
    
    function __construct(protected string $apiKey)
    {
        $this->endpointUrl = config('expertsender.es_api_url') . '/' . $this->endpoint;
        $this->apiKey = $apiKey;
    }
    
    public function create(string $mode = ExpertSenderEnum::MODE_ADD)
    {        
        $fields = [            
                    'mode' => $mode,
                    'data' => [0 => $this->data]
            ];
        
        $request = new ExpertSenderRequests($this->endpointUrl, $this->apiKey);
        return $request->post($fields);
    }    
    
    public function get(int $orderId)
    {        
        $request = new ExpertSenderRequests($this->endpointUrl. '/id/'. $orderId, $this->apiKey);
        return $request->get();
    }
    
    public function changeStatus(string $orderId, ?int $websiteId = null, ?string $visitorId = null)
    {
        $request = new ExpertSenderRequests($this->endpointUrl, $this->apiKey);
        $fields['orderId'] = $orderId;
        if($websiteId !== null) $fields['websiteId'] = $websiteId;
        if($visitorId !== null) $fields['visitorId'] = $visitorId;
        
        return $request->put($fields);
    }
 
    public function delete(int $orderId)
    {
        $request = new ExpertSenderRequests($this->endpointUrl. '/'. $orderId, $this->apiKey);
        return $request->delete();
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
    
    public function setId(string $id) : void
    {
        $this->data['id'] = $id;
    }
    
    public function setDate(string $datetime) : void
    {
        $data = str_replace(' ', 'T', date('Y-m-d H:i:s', strtotime($datetime))).'Z';
        $this->data['date'] = $date;
    }
    
    public function setTimeZone(string $timezone) : void
    {
        $this->data['timeZone'] = $timezone;
    }
    
    public function setWebsiteId(int $websiteId) : void
    {
        $this->data['websiteId'] = $websiteId;
    }
    
    public function setCurrency(string $currency) : void
    {
        $this->data['currency'] = $currency;
    }
    
    public function setTotalValue(string $totalVal) : void
    {
        $this->data['totalValue'] = $totalVal;
    }
    
    public function setReturnsValue(string $returnsVal) : void
    {
        $this->data['returnsValue'] = $returnsVal;
    }
    
    public function setCustomer(?string $email = null, ?string $phone = null, ?string $crmId = null)
    {
        $data = [];
        if($email !== null) $data['email'] = $email;
        if($phone !== null) $data['phone'] = $phone;
        if($crmId !== null) $data['crmId'] = $crmId;
        
        $this->data['customer'] = $data;
    }    
    
    public function setProduct(array $product, array $productAttribs = [])
    {
        $product['productAttributes'] = $productAttribs;
        $this->data['products'][] = $product;
    }
    
    public function setOrderAttributes(string $name, string $value)
    {
        $this->data['orderAttributes'][] = ['name' => $name, 'value' => $value];
    }
    
}