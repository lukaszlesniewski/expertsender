<?php
namespace Lukaszlesniewski\ExpertSender\Classes;

class ExpertSenderEnum
{
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_STRING = 'string';
    const TYPE_INTEGER = 'int';
    const TYPE_DATE = 'date';
    const TYPE_DATE_TIME = 'dateTime';

    const MODE_ADD_OR_UPDATE = 'AddOrUpdate';
    const MODE_ADD = 'Add';
    const MODE_UPDATE = 'Update';
    const MODE_REPLACE = 'Replace';
    
    const METHOD_POST = 'Post';
    const METHOD_GET = 'Get';
    const METHOD_PUT = 'Put';
    const METHOD_DELETE = 'Delete';
    
    const GET_BY_CUSTOMER_ID = 'CustomerId';
    const GET_BY_CUSTOMER_EMAIL = 'CustomerEmail';
    const GET_BY_CUSTOMER_PHONE = 'CustomerPhone';
    const GET_BY_CUSTOMER_CRM_ID = 'CustomerCrmId';
   
}