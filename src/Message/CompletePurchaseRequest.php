<?php

namespace Paytic\Payments\Btipay\Message;

use Paytic\Omnipay\Btipay\Message\CompletePurchaseRequest as AbstractCompletePurchaseRequest;
use Paytic\Payments\Btipay\Gateway;
use ByTIC\Payments\Models\Purchase\Traits\IsPurchasableModelTrait;

/**
 * Class PurchaseResponse
 * @package Paytic\Omnipay\Btipay\Message
 */
class CompletePurchaseRequest extends AbstractCompletePurchaseRequest
{
    use Traits\CompletePurchaseRequestTrait;

    /**
     * @inheritdoc
     */
    public function isValidNotification()
    {
        if (false == $this->hasGet('ctrl')) {
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
     * @return string
     */
    public function getModelIdFromRequest()
    {
        if ($this->httpRequest->query->has('hash')) {
            return $this->httpRequest->query->get('hash');
        }

        return $this->httpRequest->query->get('id');
    }

    /**
     * @inheritDoc
     */
    protected function parseNotification()
    {
        $model = $this->getModel();
        $this->updateParametersFromPurchase($model);

        return parent::parseNotification();
    }
}
