<?php

namespace Paytic\Payments\Btipay\Message;

use Paytic\Omnipay\Btipay\Message\ServerCompletePurchaseRequest as AbstractServerCompletePurchaseRequest;
use ByTIC\Payments\Gateways\Providers\AbstractGateway\Message\Traits\HasModelRequest;
use Paytic\Payments\Btipay\Gateway;
use ByTIC\Payments\Models\Purchase\Traits\IsPurchasableModelTrait;

/**
 * Class ServerCompletePurchaseRequest
 * @package Paytic\Omnipay\Btipay\Message
 */
class ServerCompletePurchaseRequest extends AbstractServerCompletePurchaseRequest
{
    use Traits\CompletePurchaseRequestTrait;

    /**
     * @inheritdoc
     */
    public function isValidNotification()
    {
        if (false == $this->hasPOST('REFNOEXT')) {
            return false;
        }
        if (false == $this->validateModel()) {
            return false;
        }
        $model = $this->getModel();
        $this->updateParametersFromPurchase($model);

        return parent::isValidNotification();
    }

    /**
     * Returns ID if it has it
     * @return int
     */
    public function getModelIdFromRequest()
    {
        return $this->httpRequest->request->get('REFNOEXT');
    }
}
