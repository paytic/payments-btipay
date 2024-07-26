<?php

namespace Paytic\Payments\Btipay;

use Omnipay\Common\Message\RequestInterface;
use Paytic\Omnipay\Btipay\Gateway as AbstractGateway;
use Paytic\Payments\Gateways\Providers\AbstractGateway\Traits\GatewayTrait;
use Paytic\Payments\Gateways\Providers\AbstractGateway\Traits\OverwriteServerCompletePurchaseTrait;

/**
 * Class Gateway
 * @package Paytic\Payments\Btipay
 */
class Gateway extends AbstractGateway
{
    use GatewayTrait;
    use OverwriteServerCompletePurchaseTrait;

    public function purchase(array $parameters = []): RequestInterface
    {
        return $this->createRequestWithInternalCheck('purchase', $parameters);
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        if (strlen($this->getUsername()) > 5 && strlen($this->getPassword()) > 10) {
            return true;
        }

        return false;
    }
}
