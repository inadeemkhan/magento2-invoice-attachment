<?php
declare(strict_types=1);

namespace Nadeem\InvoiceAttachment\Api\Data;

interface InvoiceAttachmentSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get InvoiceAttachment list.
     * @return \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface[]
     */
    public function getItems();

    /**
     * Set id list.
     * @param \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

