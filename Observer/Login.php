<?php

namespace Excellence\Event\Observer;
 
use \Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Login implements ObserverInterface
{
   
     public function __construct(LoggerInterface $logger,
            \Excellence\Event\Model\TestFactory $testFactory )
    {
        $this->logger = $logger;
        $this->_testFactory = $testFactory;
    }
 
    public function execute(Observer $observer)
    {   
          $test=$this->_testFactory->create();
          $event = $observer->getEvent();
          $id = $event->getCustomer()->getId();  
          $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
          $customer_data = $objectManager->create('Magento\Customer\Model\Customer')->load($id);
          $customer_email = $customer_data->getEmail();
          $login_time=(new \DateTime())->format(\Magento\Framework\Stdlib\DateTime::DATETIME_PHP_FORMAT);
          $test->saveData($id,$customer_email,$login_time);

        
    }
}
