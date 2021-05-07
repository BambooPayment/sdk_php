<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

class Customer extends BambooPaymentObject
{
    /** @var int */
    private $CustomerId;

    /** @var  string */
    private $Created;

    /** @var string |null */
    private $CommerceCustomerId;

    /** @var string */
    private $Owner;

    /** @var string */
    private $Email;

    /** @var bool|null */
    private $Enabled;

    /** @var Address|null */
    private $ShippingAddress;

    /** @var Address|null */
    private $BillingAddress;

    /** @var String|null */
    private $Plans;

    /** @var array|null */
    private $AdditionalData;

    /** @var array|null */
    private $PaymentProfiles;

    /** @var string|null */
    private $CaptureURL;

    /** @var string */
    private $UniqueID;

    /** @var string */
    private $URL;

    /** @var string|null */
    private $FirstName;

    /** @var string|null */
    private $LastName;

    /** @var string|null */
    private $DocNumber;

    /** @var string|null */
    private $DocumentTypeId;

    /** @var string|null */
    private $PhoneNumber;

    public function hydrate(array $data): self
    {
        $shippingAddress = $data['ShippingAddress'] ?? null;
        if ($shippingAddress !== null) {
            $address                 = new Address();
            $data['ShippingAddress'] = $address->hydrate($shippingAddress);
        }

        $billingAddress = $data['BillingAddress'] ?? null;
        if ($billingAddress !== null) {
            $address                = new Address();
            $data['BillingAddress'] = $address->hydrate($billingAddress);
        }

        $paymentProfiles = $data['PaymentProfiles'] ?? [];
        if (\count($paymentProfiles) > 0) {
            $data['PaymentProfiles'] = [];
            foreach ($paymentProfiles as $paymentProfileData) {
                $PaymentProfile            = new PaymentProfile();
                $data['PaymentProfiles'][] = $PaymentProfile->hydrate($paymentProfileData);
            }
        }

        return parent::hydrate($data);
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->CustomerId;
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
    public function getCommerceCustomerId(): ?string
    {
        return $this->CommerceCustomerId;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->Owner;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->Email;
    }

    /**
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->Enabled;
    }

    /**
     * @return \BambooPayment\Entity\Address|null
     */
    public function getShippingAddress(): ?Address
    {
        return $this->ShippingAddress;
    }

    /**
     * @return \BambooPayment\Entity\Address|null
     */
    public function getBillingAddress(): ?Address
    {
        return $this->BillingAddress;
    }

    /**
     * @return array|null
     */
    public function getAdditionalData(): ?array
    {
        return $this->AdditionalData;
    }

    /**
     * @return array|null
     */
    public function getPaymentProfiles(): ?array
    {
        return $this->PaymentProfiles;
    }

    /**
     * @return string|null
     */
    public function getCaptureURL(): ?string
    {
        return $this->CaptureURL;
    }

    /**
     * @return string
     */
    public function getUniqueID(): string
    {
        return $this->UniqueID;
    }

    /**
     * @return string
     */
    public function getURL(): string
    {
        return $this->URL;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    /**
     * @return string|null
     */
    public function getDocNumber(): ?string
    {
        return $this->DocNumber;
    }

    /**
     * @return string|null
     */
    public function getDocumentTypeId(): ?string
    {
        return $this->DocumentTypeId;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }

    /**
     * @return String|null
     */
    public function getPlans(): ?string
    {
        return $this->Plans;
    }
}
