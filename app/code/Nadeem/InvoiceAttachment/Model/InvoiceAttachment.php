<?php
declare(strict_types=1);

namespace Nadeem\InvoiceAttachment\Model;

use Magento\Framework\Api\DataObjectHelper;
use Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface;
use Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterfaceFactory;

class InvoiceAttachment extends \Magento\Framework\Model\AbstractModel
{

    protected $invoiceattachmentDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'nadeem_invoiceattachment_invoiceattachment';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param InvoiceAttachmentInterfaceFactory $invoiceattachmentDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Nadeem\InvoiceAttachment\Model\ResourceModel\InvoiceAttachment $resource
     * @param \Nadeem\InvoiceAttachment\Model\ResourceModel\InvoiceAttachment\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        InvoiceAttachmentInterfaceFactory $invoiceattachmentDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Nadeem\InvoiceAttachment\Model\ResourceModel\InvoiceAttachment $resource,
        \Nadeem\InvoiceAttachment\Model\ResourceModel\InvoiceAttachment\Collection $resourceCollection,
        array $data = []
    ) {
        $this->invoiceattachmentDataFactory = $invoiceattachmentDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve invoiceattachment model with invoiceattachment data
     * @return InvoiceAttachmentInterface
     */
    public function getDataModel()
    {
        $invoiceattachmentData = $this->getData();
        
        $invoiceattachmentDataObject = $this->invoiceattachmentDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $invoiceattachmentDataObject,
            $invoiceattachmentData,
            InvoiceAttachmentInterface::class
        );
        
        return $invoiceattachmentDataObject;
    }
}

