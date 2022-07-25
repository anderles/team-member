<?php
declare(strict_types=1);

namespace Elogic\Teammate\Model\ResourceModel\Teammate;

use Elogic\Teammate\Model\Teammate as TeammateModel;
use Elogic\Teammate\Model\ResourceModel\Teammate as TeammateResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'teammate_id';
    protected $_eventPrefix = 'elogic_teammate_teammate';
    protected $_eventObject = 'teammate_collection';

    protected function _construct()
    {
        $this->_init(TeammateModel::class, TeammateResourceModel::class);
    }
}
