<?php
/**
 * @category    Rom
 * @package     Rom_ProductBlogConnector
 * @copyright   Copyright (c) 2014 ROM - Agence de communication (http://www.rom.fr/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author      André Herrn <info@andre-herrn.de>
 */
class Rom_ProductBlogConnector_Model_Post extends Varien_Object
{
    /**
     * Get AW_Blog Posts by product id
     *
     * @param int $productId
     * @return AW_Blog_Model_Mysql4_Post_Collection
     */
    public function getBlogPostsByProductId($productId)
    {
        if (empty($productId)) {
            Mage::throwException(
                Mage::helper('productblogconnector/data')->__('No valid product id found to load blog posts')
            );
        }

        /**
         * The widget integration style into a blog post is:
         *
         * {{widget type="widgetsingleproduct/single" id_path="product/10" product_thumbnail="1" product_name="2" product_price="3"
         * product_addtocart="4" product_thumbnailwidth="150" product_thumbnailheight="150"}}
         */
        $blogPosts = Mage::getModel('blog/post')
            ->getCollection()
            ->addFieldToFilter(
                'post_content',
                array(
                    array('like' => '%id_path="product/'.$productId.'"%'),
                    array('like' => '%id_path="product/'.$productId.'/%'),
                )
            )
            ->setOrder('created_time','DESC');;
        $blogPosts->getSelect()->limit((int) Mage::getStoreConfig('blog/productblogconnector/posts_limit'));


        return $blogPosts;
    }
}