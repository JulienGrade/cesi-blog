<?php

namespace App\EntityListener;

use App\Entity\Categories;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoryEntityListener
{
    private SluggerInterface $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Categories $categories, LifecycleEventArgs $event){
        $categories->computeSlug($this->slugger);
    }

    public function preUpdate(Categories $categories, LifecycleEventArgs $event){
        $categories->computeSlug($this->slugger);
    }
}