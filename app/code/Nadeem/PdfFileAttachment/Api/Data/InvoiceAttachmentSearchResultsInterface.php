<?php
declare(strict_types=1);

namespace Nadeem\PdfFileAttachment\Api\Data;

interface InvoiceAttachmentSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get InvoiceAttachment list.
     * @return \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentInterface[]
     */
    public function getItems();

    /**
     * Set id list.
     * @param \Nadeem\PdfFileAttachment\Api\Data\InvoiceAttachmentInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

