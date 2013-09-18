<?php

namespace Click\GalleryBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * GalleryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GalleryRepository extends EntityRepository
{
    
    public function getGalleries()
    {
    	$qb = $this->createQueryBuilder('g')
                   ->select('g')
                   ->addOrderBy('g.name');  
    	
    	return $qb->getQuery()->getResult();    	
    }
    
    public function getCoverPhoto(Gallery $gallery)
    {

        $qb = $this->createQueryBuilder('p')
                    ->select('p')
                    ->innerJoin('p.gallery', 'g')
                    ->innerJoin('p.gallery','g','WITH','g = :gallery')    		
                    ->setParameter('gallery', $gallery)
                    ->addOrderBy('p.updatedAt', 'DESC')
                    ->setMaxResults(1);
        
        return $qb->getQuery()->getResult();
    }
    
}