<?php
declare(strict_types=1);

namespace Nadeem\InvoiceAttachment\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface InvoiceAttachmentRepositoryInterface
{

    /**
     * Save InvoiceAttachment
     * @param \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface $invoiceAttachment
     * @return \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface $invoiceAttachment
    );

    /**
     * Retrieve InvoiceAttachment
     * @param string $invoiceattachmentId
     * @return \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($invoiceattachmentId);

    /**
     * Retrieve InvoiceAttachment matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete InvoiceAttachment
     * @param \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface $invoiceAttachment
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Nadeem\InvoiceAttachment\Api\Data\InvoiceAttachmentInterface $invoiceAttachment
    );

    /**
     * Delete InvoiceAttachment by ID
     * @param string $invoiceattachmentId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($invoiceattachmentId);
}

