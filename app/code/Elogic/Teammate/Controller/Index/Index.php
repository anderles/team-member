<?php
declare(strict_types = 1);

namespace Elogic\Teammate\Controller\Index;

use Elogic\Teammate\Model\ResourceModel\Teammate\Collection;
use Elogic\Teammate\Model\TeammateFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    protected $teammateFactory;

    protected $teammateCollectionFactory;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        PageFactory $resultPageFactory,
        TeammateFactory $teammateFactory,
        Collection $teammateCollectionFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->teammateFactory = $teammateFactory;
        $this->teammateCollectionFactory = $teammateCollectionFactory;
    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $teammate = $this->teammateFactory->create();

        $teammates = $this->teammateCollectionFactory->getData();
        foreach ($teammates as $teammate) {

        }

        return $this->resultPageFactory->create();
    }
}
