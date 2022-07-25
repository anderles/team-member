<?php
declare(strict_types = 1);

namespace Elogic\Teammate\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

use Elogic\Teammate\Api\Data\TeammateInterface;
use Elogic\Teammate\Api\Data\TeammateSearchResultsInterface;

interface TeammateRepositoryInterface
{
    /**
     * Save Teammate
     *
     * @param TeammateInterface $teammate
     *
     * @return TeammateInterface
     * @throws LocalizedException
     */
    public function save(TeammateInterface $teammate): TeammateInterface;

    /**
     * Retrieve Teammate
     *
     * @param string $teammateId
     *
     * @return TeammateInterface
     * @throws LocalizedException
     */
    public function get(string $teammateId): TeammateInterface;

    /**
     * Retrieve Teammate matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     *
     * @return TeammateSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria): TeammateSearchResultsInterface;

    /**
     * Delete Teammate
     *
     * @param TeammateInterface $teammate
     *
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(TeammateInterface $teammate): bool;

    /**
     * Delete Teammate by ID
     *
     * @param string $teammateId
     *
     * @return bool true on success
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById(string $teammateId): bool;
}
