<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

class Purchase extends BambooPaymentObject
{
    /** @var int */
    private $PurchaseId;

    /** @var string */
    private $Created;

    /** @var string|null */
    private $TrxToken;

    /** @var string */
    private $Order;

    /** @var Transaction */
    private $Transaction;

    /** @var bool */
    private $Capture;

    /** @var float */
    private $Amount;

    /** @var float */
    private $OriginalAmount;

    /** @var float */
    private $TaxableAmount;

    /** @var float|null */
    private $Tip;

    /** @var int */
    private $Installments;

    /** @var string */
    private $Currency;

    /** @var string|null */
    private $Description;

    /** @var Customer */
    private $Customer;

    /** @var array */
    private $RefundList;

    /** @var string|null */
    private $PlanID;

    /** @var string|null */
    private $UniqueID;

    /** @var array|null */
    private $AdditionalData;

    /** @var string|null */
    private $CustomerUserAgent;

    /** @var string|null */
    private $CustomerIP;

    /** @var string */
    private $URL;

    /** @var CountryDataUy|null */
    private $DataUY;

    /** @var CountryDataDo|null */
    private $DataDO;

    /** @var array */
    private $Acquirer;

    /** @var string|null */
    private $CommerceAction;

    /** @var int */
    private $PurchasePaymentProfileId;

    /** @var string|null */
    private $LoyaltyPlan;

    /** @var string|null */
    private $DeviceFingerprId;

    public function hydrate(array $data): self
    {
        $customer         = new Customer();
        $data['Customer'] = $customer->hydrate($data['Customer']);

        $transaction         = new Transaction();
        $data['Transaction'] = $transaction->hydrate($data['Transaction']);

        if (null !== $data['DataUY']) {
            $dataUy         = new CountryDataUy();
            $data['DataUY'] = $dataUy->hydrate($data['DataUY']);
        }

        if (null !== $data['DataDO']) {
            $dataDo         = new CountryDataDo();
            $data['DataDO'] = $dataDo->hydrate($data['DataDO']);
        }

        $refundHydrated = [];
        $refunds        = $data['RefundList'] ?? [];
        if (\count($refunds) > 0) {
            foreach ($refunds as $refundData) {
                $refund           = new RefundData();
                $refundHydrated[] = $refund->hydrate($refundData);
            }
            $data['RefundList'] = $refundHydrated;
        }

        return parent::hydrate($data);
    }

    /**
     * @return int
     */
    public function getPurchaseId(): int
    {
        return $this->PurchaseId;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->Created;
    }

    /**
     * @return string|null
     */
    public function getTrxToken(): ?string
    {
        return $this->TrxToken;
    }

    /**
     * @return string
     */
    public function getOrder(): string
    {
        return $this->Order;
    }

    /**
     * @return Transaction
     */
    public function getTransaction(): Transaction
    {
        return $this->Transaction;
    }

    /**
     * @return bool
     */
    public function isCapture(): bool
    {
        return $this->Capture;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->Amount;
    }

    /**
     * @return float
     */
    public function getOriginalAmount(): float
    {
        return $this->OriginalAmount;
    }

    /**
     * @return float
     */
    public function getTaxableAmount(): float
    {
        return $this->TaxableAmount;
    }

    /**
     * @return float|null
     */
    public function getTip(): ?float
    {
        return $this->Tip;
    }

    /**
     * @return int
     */
    public function getInstallments(): int
    {
        return $this->Installments;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->Currency;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->Description;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->Customer;
    }

    /**
     * @return RefundData[]
     */
    public function getRefundList(): array
    {
        return $this->RefundList ?? [];
    }

    /**
     * @return string|null
     */
    public function getPlanID(): ?string
    {
        return $this->PlanID;
    }

    /**
     * @return string|null
     */
    public function getUniqueID(): ?string
    {
        return $this->UniqueID;
    }

    /**
     * @return array|null
     */
    public function getAdditionalData(): ?array
    {
        return $this->AdditionalData ?? [];
    }

    /**
     * @return string|null
     */
    public function getCustomerUserAgent(): ?string
    {
        return $this->CustomerUserAgent;
    }

    /**
     * @return string|null
     */
    public function getCustomerIP(): ?string
    {
        return $this->CustomerIP;
    }

    /**
     * @return string
     */
    public function getURL(): string
    {
        return $this->URL;
    }

    /**
     * @return CountryDataUy|null
     */
    public function getDataUY(): ?CountryDataUy
    {
        return $this->DataUY;
    }

    /**
     * @return CountryDataDo|null
     */
    public function getDataDO(): ?CountryDataDo
    {
        return $this->DataDO;
    }

    /**
     * @return array
     */
    public function getAcquirer(): array
    {
        return $this->Acquirer;
    }

    /**
     * @return string|null
     */
    public function getCommerceAction(): ?string
    {
        return $this->CommerceAction;
    }

    /**
     * @return int
     */
    public function getPurchasePaymentProfileId(): int
    {
        return $this->PurchasePaymentProfileId;
    }

    /**
     * @return string|null
     */
    public function getLoyaltyPlan(): ?string
    {
        return $this->LoyaltyPlan;
    }

    /**
     * @return string|null
     */
    public function getDeviceFingerprId(): ?string
    {
        return $this->DeviceFingerprId;
    }
}
