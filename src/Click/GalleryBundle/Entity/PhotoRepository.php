<?php

namespace Click\GalleryBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PhotoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PhotoRepository extends EntityRepository
{
    
    public function getPhotos()
    {
    	$qb = $this->createQueryBuilder('p')
                   ->select('p');  
    	
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