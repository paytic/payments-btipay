<?php

namespace Paytic\Payments\Btipay\Message;

use Paytic\Omnipay\Btipay\Message\ServerCompletePurchaseResponse as AbstractServerCompletePurchaseResponse;
use Paytic\Payments\Gateways\Providers\AbstractGateway\Message\Traits\CompletePurchaseResponseTrait;

/**
 * Class ServerCompletePurchaseResponse
 * @package Paytic\Omnipay\Btipay\Message
 */
class ServerCompletePurchaseResponse extends AbstractServerCompletePurchaseResponse
{
    use CompletePurchaseResponseTrait;

    /** @noinspection PhpMissingParentCallCommonInspection
     * @return bool
     */
    protected function canProcessModel()
    {
        return true;
    }
}
