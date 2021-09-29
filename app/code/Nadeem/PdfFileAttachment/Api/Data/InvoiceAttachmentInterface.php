<?php
declare(strict_types=1);

namespace Nadeem\PdfFileAttachment\Api\Data;

interface InvoiceAttachmentInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const ID = 'id';
    const INVOICEATTACHMENT_ID = 'invoiceattachment_id';

    /**
     * Get invoiceattachment_id
     * @return string|null
     */
    public function getInvoiceattachmentId();

    /**
     * Set invoiceattachment_id
     * @param string $invoiceattachmentId
     * @return \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentInterface
     */
    public function setInvoiceattachmentId($invoiceattachmentId);

    /**
     * Get id
     * @return string|null
     */
    public function getId();

    /**
     * Set id
     * @param string $id
     * @return \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentInterface
     */
    public function setId($id);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentExtensionInterface $extensionAttributes
    );
}

