<?php
namespace Excellence\Event\Model;
class Test extends \Magento\Framework\Model\AbstractModel implements TestInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'excellence_event_test';

    protected function _construct()
    {
        $this->_init('Excellence\Event\Model\ResourceModel\Test');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function saveData($id,$customer_email,$login_time)
    {

    	$this->setCustomerId($id);
    	$this->setCustomerEmail($customer_email);
    	$this->setTime($login_time);
    	$this->save();
    }
}
