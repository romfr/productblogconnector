<?php
/**
 * @category    Rom
 * @package     Rom_ProductBlogConnector
 * @copyright   Copyright (c) 2014 ROM - Agence de communication (http://www.rom.fr/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author      André Herrn <info@andre-herrn.de>
 */
class Rom_ProductBlogConnector_Block_Catalog_Product_View extends Mage_Core_Block_Template
{
    /**
     * Process origin _prepareLayout-function if module is enabled
     * 
     * @return string
     */
    public function _prepareLayout()
    {
        if (!Mage::getStoreConfig('blog/productblogconnector/enabled')) {
                return;
        } else {
            return parent::_prepareLayout();
        }
    }

    /**
     * Get blog posts linked to this product
     * 
     * @return AW_Blog_Model_Mysql4_Post_Collection|array
     */
    public function getBlogPosts()
    {
        if ($product = Mage::registry('product')) {
            return Mage::getModel('productblogconnector/post')->getBlogPostsByProductId($product->getId());
        } else {
            return array();
        }
    }
}
