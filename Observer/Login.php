<?php

namespace Excellence\Event\Observer;
 
use \Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Login implements ObserverInterface
{
    protected $_customerFactory;
    protected $_testFactory;
     public function __construct(LoggerInterface $logger,
            \Excellence\Event\Model\TestFactory $testFactory,
            \Magento\Customer\Model\CustomerFactory $customerFactory )
    {
        $this->logger = $logger;
        $this->_testFactory = $testFactory;
        $this->_customerFactory=$customerFactory;
    }
 
    public function execute(Observer $observer)
    {   
          $test=$this->_testFactory->create();
          $customer=$this->_customerFactory->create();
          $event = $observer->getEvent();
          $id = $event->getCustomer()->getId();
          $customerEmail = $customer->load($id);
          $customer_email= $customerEmail->getEmail();  
          $login_time=(new \DateTime())->format(\Magento\Framework\Stdlib\DateTime::DATETIME_PHP_FORMAT);
          $test->saveData($id,$customer_email,$login_time);

        
    }
}
