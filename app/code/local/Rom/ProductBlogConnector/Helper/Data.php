<?php
/**
 * @category    Rom
 * @package     Rom_ProductBlogConnector
 * @copyright   Copyright (c) 2014 ROM - Agence de communication (http://www.rom.fr/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author      André Herrn <info@andre-herrn.de>
 */
class Rom_ProductBlogConnector_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Get blog post url
     * 
     * @param AW_Blog_Model_Post $blogPost
     * @return string
     */
    public function getBlogPostUrl($blogPost)
    {
        return Mage::getUrl(
            Mage::helper('blog/data')->getRoute() . '/' .$blogPost->getIdentifier()
        );
    }
}