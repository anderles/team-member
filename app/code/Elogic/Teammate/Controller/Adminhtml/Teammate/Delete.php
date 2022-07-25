<?php
declare(strict_types = 1);

namespace Elogic\Teammate\Controller\Adminhtml\Teammate;

class Delete extends \Elogic\Teammate\Controller\Adminhtml\Teammate
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('teammate_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Elogic\Teammate\Model\Teammate::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Teammate.'));

                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());

                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['teammate_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Teammate to delete.'));

        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
