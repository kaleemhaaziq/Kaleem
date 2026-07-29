<?php

namespace Citytech\CategoryWidget\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Dataa extends AbstractHelper
{
    /**
     * XML Config Path
     */
    public const XML_PATH_ENABLED = 'category_widget/general/enabled';

    /**
     * Check if module is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get Config Value
     *
     * @param string $path
     * @param int|null $storeId ..........................Haaziq..............................................
     * @return mixed
     */
    public function getConfigValue(string $path, ?int $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $path,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}