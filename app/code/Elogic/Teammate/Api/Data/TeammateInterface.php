<?php
declare(strict_types = 1);

namespace Elogic\Teammate\Api\Data;

interface TeammateInterface
{
    public const TEAMMATE_ID        = 'teammate_id';
    public const CUSTOMER_ENTITY_ID = 'customer_entity_id';
    public const FIRST_NAME         = 'first_name';
    public const LAST_NAME          = 'last_name';
    public const BIRTHDATE          = 'birthdate';
    public const SALARY             = 'salary';
    public const ROLE               = 'role';

    /**
     * Get teammate_id
     *
     * @return string|null
     */
    public function getTeammateId(): ?string;

    /**
     * Set teammate_id
     *
     * @param string $teammateId
     *
     * @return TeammateInterface
     */
    public function setTeammateId(string $teammateId): TeammateInterface;

    /**
     * Get customer_entity_id
     *
     * @return string|null
     */
    public function getCustomerEntityId(): ?string;

    /**
     * Set customer_entity_id
     *
     * @param string $customerEntityId
     *
     * @return TeammateInterface
     */
    public function setCustomerEntityId(string $customerEntityId): TeammateInterface;

    /**
     * Get first_name
     *
     * @return string|null
     */
    public function getFirstName(): ?string;

    /**
     * Set first_name
     *
     * @param string $firstName
     *
     * @return TeammateInterface
     */
    public function setFirstName(string $firstName): TeammateInterface;

    /**
     * Get last_name
     *
     * @return string|null
     */
    public function getLastName(): ?string;

    /**
     * Set last_name
     *
     * @param string $lastName
     *
     * @return TeammateInterface
     */
    public function setLastName(string $lastName): TeammateInterface;

    /**
     * Get birthdate
     *
     * @return string|null
     */
    public function getBirthdate(): ?string;

    /**
     * Set birthdate
     *
     * @param string $birthdate
     *
     * @return TeammateInterface
     */
    public function setBirthdate(string $birthdate): TeammateInterface;

    /**
     * Get role
     *
     * @return string|null
     */
    public function getRole(): ?string;

    /**
     * Set role
     *
     * @param string $role
     *
     * @return TeammateInterface
     */
    public function setRole(string $role): TeammateInterface;

    /**
     * Get salary
     *
     * @return string|null
     */
    public function getSalary(): ?string;

    /**
     * Set salary
     *
     * @param string $salary
     *
     * @return TeammateInterface
     */
    public function setSalary(string $salary): TeammateInterface;
}
