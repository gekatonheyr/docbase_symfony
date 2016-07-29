<?php
/**
 * Created by PhpStorm.
 * User: Бартнев
 * Date: 20.07.2016
 * Time: 15:26
 */

namespace TarasTestBundle\EventSubscribers;

use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;

class DinamicDoctrineSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(Events::loadClassMetadata,);
    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        $metadata = $eventArgs->getClassMetadata();
        $metadata->setTableName('users');
    }
}