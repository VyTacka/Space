<?php

namespace VA\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

class BaseRepository extends EntityRepository
{
    public function countAll()
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('count(x.id)')
            ->from($this->getEntityName(), 'x');
        try {
            return $qb->getQuery()->getSingleScalarResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return 0;
        }
    }
} 