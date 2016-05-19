<?php
namespace Excellence\Event\Model\Test;
  
class Plugin
{   
	protected $messageManager;
    public function __construct(\Magento\Framework\Message\ManagerInterface $messageManager)
    {
         $this->messageManager = $messageManager;
    }
 
    public function afterSaveData($subject, $result)
    {
    	
         $this->messageManager->addSuccess('your email is'.$result); 
        return [$result];
    }
}