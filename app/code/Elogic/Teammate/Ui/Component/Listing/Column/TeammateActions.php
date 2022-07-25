<?php
declare(strict_types = 1);

namespace Elogic\Teammate\Ui\Component\Listing\Column;

class TeammateActions extends \Magento\Ui\Component\Listing\Columns\Column
{

    public const URL_PATH_DETAILS = 'elogic_teammate/teammate/details';
    public const URL_PATH_EDIT    = 'elogic_teammate/teammate/edit';
    public const URL_PATH_DELETE  = 'elogic_teammate/teammate/delete';

    protected $urlBuilder;

    /**
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory           $uiComponentFactory
     * @param \Magento\Framework\UrlInterface                              $urlBuilder
     * @param array                                                        $components
     * @param array                                                        $data
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['teammate_id'])) {
                    $item[$this->getData('name')] = [
                        'view'   => [
                            'href'  => $this->urlBuilder->getUrl(
                                static::URL_PATH_DETAILS,
                                [
                                    'teammate_id' => $item['teammate_id'],
                                ]
                            ),
                            'label' => __('View'),
                        ],
                        'edit'   => [
                            'href'  => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'teammate_id' => $item['teammate_id'],
                                ]
                            ),
                            'label' => __('Edit'),
                        ],
                        'delete' => [
                            'href'    => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'teammate_id' => $item['teammate_id'],
                                ]
                            ),
                            'label'   => __('Delete'),
                            'confirm' => [
                                'title'   => __('Delete "${ $.$data.title }"'),
                                'message' => __('Are you sure you wan\'t to delete a "${ $.$data.title }" record?'),
                            ],
                        ],
                    ];
                }
            }
        }

        return $dataSource;
    }
}
