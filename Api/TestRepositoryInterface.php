<?php
namespace Excellence\Event\Api;

use Excellence\Event\Model\TestInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface TestRepositoryInterface 
{
    public function save(TestInterface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(TestInterface $page);

    public function deleteById($id);
}
