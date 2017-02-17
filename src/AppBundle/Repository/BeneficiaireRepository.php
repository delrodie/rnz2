<?php

namespace AppBundle\Repository;

/**
 * BeneficiaireRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BeneficiaireRepository extends \Doctrine\ORM\EntityRepository
{
  /**
    * Recherche de l'article de la rubrique avantage
    *
    * Author: Delrodie AMOIKON
    * Date: 14/02/2017
    * Since: v1.0
    */
    public function getBeneficiaire()
    {
        $em = $this->getEntityManager();
        $qb = $em->createQuery('
            SELECT b
            FROM AppBundle:Beneficiaire b
            ORDER BY b.nom ASC
        ')
        ;
        try {
            $result = $qb->getResult();

            return $result;

        } catch (NoResultException $e) {
            return $e;
        }
    }

    /**
      * Recherche de l'article de la rubrique avantage
      *
      * Author: Delrodie AMOIKON
      * Date: 14/02/2017
      * Since: v1.0
      */
      public function getAnnuaire($zone, $domaine)
      {
          $em = $this->getEntityManager();
          $qb = $em->createQuery('
              SELECT b, d, z
              FROM AppBundle:Beneficiaire b
              JOIN b.domaines d
              JOIN b.zone z
              WHERE d.id = :domaine
              AND z.id = :zone
              ORDER BY b.nom ASC
          ')
            ->setParameter('domaine', $domaine)
            ->setParameter('zone', $zone)
          ;
          try {
              $result = $qb->getResult();

              return $result;

          } catch (NoResultException $e) {
              return $e;
          }
      }

      /**
        * Recherche de l'article de la rubrique Beneficiare par la zone
        *
        * Author: Delrodie AMOIKON
        * Date: 14/02/2017
        * Since: v1.0
        */
        public function getAnnuaireByDomaine($domaine)
        {
            $em = $this->getEntityManager();
            $qb = $em->createQuery('
                SELECT b, d
                FROM AppBundle:Beneficiaire b
                JOIN b.domaines d
                WHERE d.id = :domaine
                ORDER BY b.nom ASC
            ')
              ->setParameter('domaine', $domaine)
            ;
            try {
                $result = $qb->getResult();

                return $result;

            } catch (NoResultException $e) {
                return $e;
            }
        }
}
