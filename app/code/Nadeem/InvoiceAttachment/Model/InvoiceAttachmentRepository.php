<?php
declare(strict_types=1);

namespace Nadeem\InvoiceAttachment\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterfaceFactory;
use Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentSearchResultsInterfaceFactory;
use Nadeem\InvoiceAttachment\Api\InvoiceAttachmentRepositoryInterface;
use Nadeem\InvoiceAttachment\Model\ResourceModel\InvoiceAttachment as ResourceInvoiceAttachment;
use Nadeem\InvoiceAttachment\Model\ResourceModel\InvoiceAttachment\CollectionFactory as InvoiceAttachmentCollectionFactory;

class InvoiceAttachmentRepository implements InvoiceAttachmentRepositoryInterface
{

    protected $resource;

    protected $invoiceAttachmentFactory;

    protected $invoiceAttachmentCollectionFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $dataInvoiceAttachmentFactory;

    protected $extensionAttributesJoinProcessor;

    private $storeManager;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceInvoiceAttachment $resource
     * @param InvoiceAttachmentFactory $invoiceAttachmentFactory
     * @param InvoiceAttachmentInterfaceFactory $dataInvoiceAttachmentFactory
     * @param InvoiceAttachmentCollectionFactory $invoiceAttachmentCollectionFactory
     * @param InvoiceAttachmentSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceInvoiceAttachment $resource,
        InvoiceAttachmentFactory $invoiceAttachmentFactory,
        InvoiceAttachmentInterfaceFactory $dataInvoiceAttachmentFactory,
        InvoiceAttachmentCollectionFactory $invoiceAttachmentCollectionFactory,
        InvoiceAttachmentSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->invoiceAttachmentFactory = $invoiceAttachmentFactory;
        $this->invoiceAttachmentCollectionFactory = $invoiceAttachmentCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataInvoiceAttachmentFactory = $dataInvoiceAttachmentFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface $invoiceAttachment
    ) {
        /* if (empty($invoiceAttachment->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $invoiceAttachment->setStoreId($storeId);
        } */
        
        $invoiceAttachmentData = $this->extensibleDataObjectConverter->toNestedArray(
            $invoiceAttachment,
            [],
            \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface::class
        );
        
        $invoiceAttachmentModel = $this->invoiceAttachmentFactory->create()->setData($invoiceAttachmentData);
        
        try {
            $this->resource->save($invoiceAttachmentModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the invoiceAttachment: %1',
                $exception->getMessage()
            ));
        }
        return $invoiceAttachmentModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($invoiceAttachmentId)
    {
        $invoiceAttachment = $this->invoiceAttachmentFactory->create();
        $this->resource->load($invoiceAttachment, $invoiceAttachmentId);
        if (!$invoiceAttachment->getId()) {
            throw new NoSuchEntityException(__('InvoiceAttachment with id "%1" does not exist.', $invoiceAttachmentId));
        }
        return $invoiceAttachment->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->invoiceAttachmentCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface $invoiceAttachment
    ) {
        try {
            $invoiceAttachmentModel = $this->invoiceAttachmentFactory->create();
            $this->resource->load($invoiceAttachmentModel, $invoiceAttachment->getInvoiceattachmentId());
            $this->resource->delete($invoiceAttachmentModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the InvoiceAttachment: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($invoiceAttachmentId)
    {
        return $this->delete($this->get($invoiceAttachmentId));
    }
}

