<?php

namespace Paytic\Payments\Btipay;

use Paytic\Payments\Gateways\Providers\AbstractGateway\Form as AbstractForm;

/**
 * Class Form
 * @package Paytic\Payments\Btipay
 */
class Form extends AbstractForm
{
    public function initElements()
    {
        $this->addInput('username', 'Username');
        $this->addInput('password', 'Password');
    }
}
