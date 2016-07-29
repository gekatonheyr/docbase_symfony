<?php
/**
 * Created by PhpStorm.
 * User: Бартнев
 * Date: 21.07.2016
 * Time: 10:50
 */

namespace TarasTestBundle\EventListeners;


class DinamicDoctrineListeners
{
    public function loadClassMetadata(\Doctrine\ORM\Event\LoadClassMetadataEventArgs $eventArgs)
    {
        $metadata = $eventArgs->getClassMetadata();
        $metadata->setTableName('users');
    }
}