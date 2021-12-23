<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class Commerce.
 */
class CountryPaymentMethod extends BambooPaymentObject
{
    public const PAYMENT_METHODS = 'paymentMethods';

    /** @var string */
    private $name;

    /** @var string */
    private $isoCode;

    /** @var string|null */
    private $flagUrl;

    /** @var array */
    private $localCurrency;

    /** @var array */
    private $paymentMethods;

    /**
     * @param array $data
     *
     * @return $this
     */
    public function hydrate(array $data): BambooPaymentObject
    {
        $paymentMethods              = $data[self::PAYMENT_METHODS] ?? [];
        $data[self::PAYMENT_METHODS] = [];

        foreach ($paymentMethods as $paymentMethod) {
            $paymentMethodEntity           = new PaymentMethod();
            $data[self::PAYMENT_METHODS][] = $paymentMethodEntity->hydrate($paymentMethod);
        }

        return parent::hydrate($data);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    /**
     * @return string|null
     */
    public function getFlagUrl(): ?string
    {
        return $this->flagUrl;
    }

    /**
     * @return array
     */
    public function getLocalCurrency(): array
    {
        return $this->localCurrency;
    }

    /**
     * @return array
     */
    public function getPaymentMethods(): array
    {
        return $this->paymentMethods;
    }
}
