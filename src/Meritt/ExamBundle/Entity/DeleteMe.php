<?php

namespace Meritt\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeleteMe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Meritt\ExamBundle\Entity\DeleteMeRepository")
 */
class DeleteMe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
