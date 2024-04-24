<?php

namespace Paytic\Payments\Btipay\Message;

use Paytic\Omnipay\Btipay\Message\ServerCompletePurchaseRequest as AbstractServerCompletePurchaseRequest;

/**
 * Class ServerCompletePurchaseRequest
 * @package Paytic\Omnipay\Btipay\Message
 */
class ServerCompletePurchaseRequest extends AbstractServerCompletePurchaseRequest
{
    use Traits\CompletePurchaseRequestTrait;
}
