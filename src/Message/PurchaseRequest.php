<?php

namespace Paytic\Payments\Btipay\Message;


use Nip\Records\AbstractModels\Record;
use Paytic\Omnipay\Btipay\Message\PurchaseRequest as AbstractRequest;
use Paytic\Payments\Utility\PaymentsModels;

/**
 * Class PurchaseRequest
 * @package Paytic\Payments\Btipay\Message
 *
 * @method PurchaseResponse send()
 */
class PurchaseRequest extends AbstractRequest
{

    /**
     * @var null
     */
    protected $transaction = null;

    protected function generateRedirectUrl()
    {
        $transaction = $this->getTransaction();
        if ($transaction) {
            $returnUrl = $transaction->getMetadataValue('returnUrl');
            if (!empty($returnUrl)) {
                return $returnUrl;
            }
        }
        $returnUrl = parent::generateRedirectUrl();
        if ($transaction) {
            $transaction->setMedataValue('returnUrl', $returnUrl);
            $transaction->save();
        }
        return $returnUrl;
    }

    /**
     * @return false|\Paytic\Payments\Models\Transactions\TransactionTrait|null
     */
    protected function getTransaction()
    {
        return $this->transaction;
    }

    public function setPurchase($purchase)
    {
        if ($purchase instanceof Record) {
            $transaction = PaymentsModels::transactions()->findOrCreateForPurchase($purchase);
            $this->transaction = $transaction;
        }
    }
}
