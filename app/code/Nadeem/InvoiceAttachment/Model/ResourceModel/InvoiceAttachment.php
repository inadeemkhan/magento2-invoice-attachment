<?php
declare(strict_types=1);

namespace Nadeem\InvoiceAttachment\Model\ResourceModel;

class InvoiceAttachment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('nadeem_invoiceattachment_invoiceattachment', 'invoiceattachment_id');
    }
}

