<?php
declare(strict_types=1);

namespace Nadeem\PdfFileAttachment\Model\Data;

use Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentInterface;

class InvoiceAttachment extends \Magento\Framework\Api\AbstractExtensibleObject implements InvoiceAttachmentInterface
{

    /**
     * Get invoiceattachment_id
     * @return string|null
     */
    public function getInvoiceattachmentId()
    {
        return $this->_get(self::INVOICEATTACHMENT_ID);
    }

    /**
     * Set invoiceattachment_id
     * @param string $invoiceattachmentId
     * @return \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentInterface
     */
    public function setInvoiceattachmentId($invoiceattachmentId)
    {
        return $this->setData(self::INVOICEATTACHMENT_ID, $invoiceattachmentId);
    }

    /**
     * Get id
     * @return string|null
     */
    public function getId()
    {
        return $this->_get(self::ID);
    }

    /**
     * Set id
     * @param string $id
     * @return \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}

