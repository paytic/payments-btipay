<?php

namespace Paytic\Payments\Btipay\Message\Traits;

use ByTIC\Payments\Gateways\Providers\AbstractGateway\Message\Traits\HasGatewayRequestTrait;
use ByTIC\Payments\Gateways\Providers\AbstractGateway\Message\Traits\HasModelRequest;

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

    /**
     * @param \Paytic\Payments\Btipay\Gateway $model
     */
    protected function updateParametersFromGateway($gateway)
    {
//        $this->setMerchant($gateway->getMerchant());
        $this->setSecretKey($gateway->getSecretKey());
    }
}
