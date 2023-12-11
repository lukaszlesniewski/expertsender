<?php
namespace Lukaszlesniewski\ExpertSender\Classes;

class ExpertSenderResults
{    
    function __construct(private array $info, private $result) {}
    
    public function ifSuccess() : bool
    {
        return ($this->info['http_code'] <= 299) ? true : false;
    }
    
    public function getCode() : int
    {
        return $this->info['http_code'];
    }
    
    public function getInfo(?string $option = null)
    {
        return (isset($this->info[$option])) ? $this->info[$option] : $this->info;
    }
    
    public function getResponse() : mixed
    {
        return json_decode($this->result);
    }
    
    public function getMessage() : string
    {
        return match($this->info['http_code']) {
                        200 => 'Success',
                        201 => 'Created',
                        400 => 'Bad request',
                        401 => 'Unauthorized',
                        403 => 'Forbidden',
                        404 => 'Not found',
                        500 => 'Internal server error',
                        default => 'Unknown error'
                    };
    }
}