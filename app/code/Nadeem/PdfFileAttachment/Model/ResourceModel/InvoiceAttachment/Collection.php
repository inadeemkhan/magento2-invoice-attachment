<?php
declare(strict_types=1);

namespace Nadeem\PdfFileAttachment\Model\ResourceModel\InvoiceAttachment;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'invoiceattachment_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Nadeem\PdfFileAttachment\Model\InvoiceAttachment::class,
            \Nadeem\PdfFileAttachment\Model\ResourceModel\InvoiceAttachment::class
        );
    }
}

