<?php
declare(strict_types=1);

namespace Nadeem\InvoiceAttachment\Model\ResourceModel\InvoiceAttachment;

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
            \Nadeem\InvoiceAttachment\Model\InvoiceAttachment::class,
            \Nadeem\InvoiceAttachment\Model\ResourceModel\InvoiceAttachment::class
        );
    }
}

