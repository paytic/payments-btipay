<?php

namespace Paytic\Payments\Btipay\Message;

use Lcobucci\JWT\Token;
use Paytic\Omnipay\Btipay\Message\ServerCompletePurchaseRequest as AbstractServerCompletePurchaseRequest;

/**
 * Class ServerCompletePurchaseRequest
 * @package Paytic\Omnipay\Btipay\Message
 */
class ServerCompletePurchaseRequest extends AbstractServerCompletePurchaseRequest
{
    use Traits\CompletePurchaseRequestTrait;
    protected function validateToken(Token $token)
    {
        if ($this->validateModel()) {
            $model = $this->getModel();
            $this->updateParametersFromPurchase($model);
        }
        parent::validateToken($token);
    }

    protected function getModelIdFromRequest()
    {
        $data = $this->getDecodedData();
        return $data['orderNumber'] ?? null;
    }
}
