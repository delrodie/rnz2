<?php

namespace AppBundle\Repository;

/**
 * EvenementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EvenementRepository extends \Doctrine\ORM\EntityRepository
{
  /**
  * Recherche des publicites actives
  *
  * Author: Delrodie AMOIKON
  * Date: 14/02/2017
  * Since: v1.0
  */
  public function getEvenement()
  {
      $em = $this->getEntityManager();
      $qb = $em->createQuery('
          SELECT a
          FROM AppBundle:Evenement a
          WHERE a.statut = :stat
          AND a.datedeb >= :today
          AND a.datefin >= :today
          ORDER BY a.datedeb ASC
      ')
       ->setParameter('stat', 1)
       ->setParameter('today', date('Y-m-d', time()))
      ;
      try {
          $result = $qb->getResult();

          return $result;

      } catch (NoResultException $e) {
          return $e;
      }

  }
}
