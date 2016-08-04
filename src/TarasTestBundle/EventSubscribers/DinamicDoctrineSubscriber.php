<?php
/**
 * Created by PhpStorm.
 * User: Бартнев
 * Date: 20.07.2016
 * Time: 15:26
 */

namespace TarasTestBundle\EventSubscribers;

use Doctrine\ORM\Event\OnClassMetadataNotFoundEventArgs;
use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;

class DinamicDoctrineSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(Events::loadClassMetadata, Events::onClassMetadataNotFound);
    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        /*$metadata = $eventArgs->getClassMetadata();
        $metadata->setTableName($newTableName);*/
    }

    public function onClassMetadataNotFound(OnClassMetadataNotFoundEventArgs $eventArgs)
    {
        $class_name = $eventArgs->getClassName();
        $om = $eventArgs->getObjectManager();

        $name_parts = explode('-', $class_name);
        foreach($om->getMetadataFactory()->getAllMetadata() as $md){
            if($md->getTableName()==$name_parts[1]){
                $tmp = ucfirst($name_parts[1]);
                $foundMetadata = $om->getClassMetadata('TarasTestBundle:'.$tmp);
                $foundMetadata->setTableName('`akkalita-'.$name_parts[1].'`');
                return $eventArgs->setFoundMetadata($foundMetadata);
            }
        }
        echo 'something is wrong';
    }
}