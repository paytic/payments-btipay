<?php

namespace Paytic\Payments\Btipay\Message\Traits;

use Paytic\Payments\Gateways\Providers\AbstractGateway\Message\Traits\HasGatewayRequestTrait;
use Paytic\Payments\Gateways\Providers\AbstractGateway\Message\Traits\HasModelRequest;
use Paytic\Payments\Btipay\Gateway;

/**
 * Trait CompletePurchaseRequestTrait
 * @package Paytic\Payments\Btipay\Message\Traits
 */
trait CompletePurchaseRequestTrait
{
    use HasGatewayRequestTrait;
    use HasModelRequest;

    /**
     * @inheritdoc
     */
    public function getData()
    {
        $return = parent::getData();
        // Add model only if has data
        if (count($return)) {
            $return['model'] = $this->getModel();
        }

        return $return;
    }

    protected function parseNotification()
    {
        if ($this->validateModel()) {
            $model = $this->getModel();
            $this->updateParametersFromPurchase($model);
        }

        return parent::parseNotification();
    }


    /**
     * @param Gateway $model
     */
    protected function updateParametersFromGateway($gateway)
    {
        $this->setTestMode($gateway->getTestMode());
        $this->setUsername($gateway->getUsername());
        $this->setPassword($gateway->getPassword());
        $this->setCallbackToken($gateway->getCallbackToken());
    }
}
