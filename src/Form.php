<?php

namespace Paytic\Payments\Btipay;

use Paytic\Payments\Gateways\Providers\AbstractGateway\Form as AbstractForm;

/**
 * Class Form
 * @package Paytic\Payments\Btipay
 */
class Form extends AbstractForm
{
    public function initElements(): void
    {
        parent::initElements();

        $this->initElementSandbox();
        $this->addInput('username', 'Username');
        $this->addInput('password', 'Password');
        $this->addInput('callback_token', 'Callback Token (base64)');
    }
}
