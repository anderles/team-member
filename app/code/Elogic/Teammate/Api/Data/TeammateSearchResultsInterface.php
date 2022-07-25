<?php
declare(strict_types = 1);

namespace Elogic\Teammate\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface TeammateSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Teammate list.
     *
     * @return array
     */
    public function getItems(): array;

    /**
     * Set customer_entity_id list.
     *
     * @param array $items
     *
     * @return $this
     */
    public function setItems(array $items): TeammateSearchResultsInterface;
}
