<?php
declare(strict_types=1);

namespace Nadeem\InvoiceAttachment\Api\Data;

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
     * @return \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface
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
     * @return \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface
     */
    public function setId($id);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentExtensionInterface $extensionAttributes
    );
}

