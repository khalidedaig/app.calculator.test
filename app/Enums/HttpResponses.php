<?php


namespace App\Enums;


enum HttpResponses: int
{
    case HTTP_RESPONSE_OK = 200;
    case HTTP_RESPONSE_CREATED = 201;
    case HTTP_RESPONSE_BAD_REQUEST = 400;
    case HTTP_RESPONSE_NOT_FOUND = 404;
}
