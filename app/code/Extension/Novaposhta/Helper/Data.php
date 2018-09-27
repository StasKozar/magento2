<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/4/18
 * Time: 6:21 PM
 */

namespace Extension\Novaposhta\Helper;

use Magento\Framework\App\Helper\AbstractHelper;


class Data extends AbstractHelper
{
    private $logFile = 'novaposhta.log';

    /**
     * @param string $string
     *
     * @return \Extension\Novaposhta\Helper\Data
     */
    public function log(string $string): \Extension\Novaposhta\Helper\Data
    {
        if($this->scopeConfig->getValue("carriers/novaposhta/enable_log")) {
            $this->_logger->log(null, $string, $this->logFile);
        }
        return $this;
    }
}