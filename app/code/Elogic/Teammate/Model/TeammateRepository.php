<?php
declare(strict_types = 1);

namespace Elogic\Teammate\Model;

use Elogic\Teammate\Api\Data\TeammateInterface;
use Elogic\Teammate\Api\Data\TeammateInterfaceFactory;
use Elogic\Teammate\Api\Data\TeammateSearchResultsInterface;
use Elogic\Teammate\Api\Data\TeammateSearchResultsInterfaceFactory;
use Elogic\Teammate\Api\TeammateRepositoryInterface;
use Elogic\Teammate\Model\ResourceModel\Teammate as ResourceTeammate;
use Elogic\Teammate\Model\ResourceModel\Teammate\CollectionFactory as TeammateCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class TeammateRepository implements TeammateRepositoryInterface
{

    /**
     * @var TeammateInterfaceFactory
     */
    protected $teammateFactory;

    /**
     * @var TeammateCollectionFactory
     */
    protected $teammateCollectionFactory;

    /**
     * @var ResourceTeammate
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var Teammate
     */
    protected $searchResultsFactory;

    /**
     * @param ResourceTeammate                      $resource
     * @param TeammateInterfaceFactory              $teammateFactory
     * @param TeammateCollectionFactory             $teammateCollectionFactory
     * @param TeammateSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface          $collectionProcessor
     */
    public function __construct(
        ResourceTeammate $resource,
        TeammateInterfaceFactory $teammateFactory,
        TeammateCollectionFactory $teammateCollectionFactory,
        TeammateSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->teammateFactory = $teammateFactory;
        $this->teammateCollectionFactory = $teammateCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(TeammateInterface $teammate): TeammateInterface
    {
        try {
            $this->resource->save($teammate);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the teammate: %1',
                $exception->getMessage()
            ));
        }

        return $teammate;
    }

    /**
     * @inheritDoc
     */
    public function get(string $teammateId): TeammateInterface
    {
        $teammate = $this->teammateFactory->create();
        $this->resource->load($teammate, $teammateId);
        if (!$teammate->getId()) {
            throw new NoSuchEntityException(__('Teammate with id "%1" does not exist.', $teammateId));
        }

        return $teammate;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ): TeammateSearchResultsInterface {
        $collection = $this->teammateCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(TeammateInterface $teammate): bool
    {
        try {
            $teammateModel = $this->teammateFactory->create();
            $this->resource->load($teammateModel, $teammate->getTeammateId());
            $this->resource->delete($teammateModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Teammate: %1',
                $exception->getMessage()
            ));
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($teammateId): bool
    {
        return $this->delete($this->get($teammateId));
    }
}
