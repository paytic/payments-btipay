<?php

namespace Paytic\Payments\Btipay\Message;

use Paytic\Omnipay\Btipay\Message\CompletePurchaseRequest as AbstractCompletePurchaseRequest;

/**
 * Class PurchaseResponse
 * @package Paytic\Omnipay\Btipay\Message
 */
class CompletePurchaseRequest extends AbstractCompletePurchaseRequest
{
    use Traits\CompletePurchaseRequestTrait;

    /**
     * @return string
     */
    public function getModelIdFromRequest()
    {
        if ($this->httpRequest->query->has('hash')) {
            return $this->httpRequest->query->get('hash');
        }

        return $this->httpRequest->query->get('id');
    }
}
