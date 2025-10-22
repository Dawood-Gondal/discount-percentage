<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_DiscountPercentage
 * @copyright   Copyright (c) 2025 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

declare(strict_types=1);

namespace M2Commerce\DiscountPercentage\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Data extends AbstractHelper
{
    /**
     * @var
     */
    protected $scopeConfig;

    /**
     * @var StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context                                    $context,
        StoreManagerInterface $storeManager
    ) {
        $this->_storeManager = $storeManager;

        parent::__construct($context);
    }

    /**
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function isActive()
    {
        return $this->scopeConfig->getValue(
            'discountpercentage/general/enable',
            ScopeInterface::SCOPE_STORE,
            $this->getStoreId()
        );
    }

    /**
     * @return int
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getStoreId()
    {
        return $this->_storeManager->getStore()->getId();
    }
}
