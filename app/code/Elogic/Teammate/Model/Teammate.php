<?php
declare(strict_types = 1);

namespace Elogic\Teammate\Model;

use Elogic\Teammate\Api\Data\TeammateInterface;
use Magento\Framework\Model\AbstractModel;

class Teammate extends AbstractModel implements TeammateInterface
{
    public const ENTITY    = 'elogic_teammate_teammate';
    public const CACHE_TAG = 'elogic_teammate_teammate';

    protected $_cacheTag    = 'elogic_teammate_teammate';

    protected $_eventPrefix = 'elogic_teammate_teammate';

    protected function _construct()
    {
        $this->_init(ResourceModel\Teammate::class);
    }

    /**
     * @inheritDoc
     */
    public function getTeammateId(): ?string
    {
        return $this->getData(self::TEAMMATE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setTeammateId(string $teammateId): TeammateInterface
    {
        return $this->setData(self::TEAMMATE_ID, $teammateId);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerEntityId(): ?string
    {
        return $this->getData(self::CUSTOMER_ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerEntityId(string $customerEntityId): TeammateInterface
    {
        return $this->setData(self::CUSTOMER_ENTITY_ID, $customerEntityId);
    }

    /**
     * @inheritDoc
     */
    public function getFirstName(): ?string
    {
        return $this->getData(self::FIRST_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setFirstName(string $firstName): TeammateInterface
    {
        return $this->setData(self::FIRST_NAME, $firstName);
    }

    /**
     * @inheritDoc
     */
    public function getLastName(): ?string
    {
        return $this->getData(self::LAST_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setLastName(string $lastName): TeammateInterface
    {
        return $this->setData(self::LAST_NAME, $lastName);
    }

    /**
     * @inheritDoc
     */
    public function getBirthdate(): ?string
    {
        return $this->getData(self::BIRTHDATE);
    }

    /**
     * @inheritDoc
     */
    public function setBirthdate(string $birthdate): TeammateInterface
    {
        return $this->setData(self::BIRTHDATE, $birthdate);
    }

    /**
     * @inheritDoc
     */
    public function getRole(): ?string
    {
        return $this->getData(self::ROLE);
    }

    /**
     * @inheritDoc
     */
    public function setRole(string $role): TeammateInterface
    {
        return $this->setData(self::ROLE, $role);
    }

    /**
     * @inheritDoc
     */
    public function getSalary(): ?string
    {
        return $this->getData(self::SALARY);
    }

    /**
     * @inheritDoc
     */
    public function setSalary(string $salary): TeammateInterface
    {
        return $this->setData(self::SALARY, $salary);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
