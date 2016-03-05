<?php

namespace Issei\Spike\Model\Factory;

use Issei\Spike\Model\Money;
use Issei\Spike\Model\Refund;

/**
 * Creates a new refund object.
 *
 * @author Issei Murasawa <issei.m7@gmail.com>
 */
class RefundFactory implements ObjectFactoryInterface
{
    use DateTimeUtilAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'refund';
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $refund = new Refund();
        $refund
            ->setCreated($this->dateTimeUtil->createDateTimeByUnixTime($data['created']))
            ->setAmount(new Money(floatval($data['amount']), $data['currency']))
        ;

        return $refund;
    }
}
