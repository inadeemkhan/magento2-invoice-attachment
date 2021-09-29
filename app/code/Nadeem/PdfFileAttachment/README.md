# Mage2 Module Nadeem PdfFileAttachment

    ``nadeem/module-pdffileattachment``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Magento2 free extension to Attached Pdf file in Invoice email | Nadeem Khan

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Nadeem`
 - Enable the module by running `php bin/magento module:enable Nadeem_PdfFileAttachment`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require nadeem/module-pdffileattachment`
 - enable the module by running `php bin/magento module:enable Nadeem_PdfFileAttachment`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - is_enable (invoice_attachment/general/is_enable)


## Specifications

 - Helper
	- Nadeem\PdfFileAttachment\Helper\Data

 - Model
	- InvoiceAttachment


## Attributes



