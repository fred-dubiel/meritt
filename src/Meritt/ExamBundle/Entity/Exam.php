<?php

namespace Meritt\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Exam
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Exam
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="applicationDate", type="date")
     */
    private $applicationDate;
    
    /**
     *
     * @var Collection
     * 
     *
     * @ORM\ManyToMany(targetEntity="Question", inversedBy="exams")
     * @ORM\JoinTable(name="exam_question")
     **/
    private $questions;
    


    public function __construct() {
        $this->questions = new ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Exam
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set applicationDate
     *
     * @param \DateTime $applicationDate
     * @return Exam
     */
    public function setApplicationDate($applicationDate)
    {
        $this->applicationDate = $applicationDate;

        return $this;
    }

    /**
     * Get applicationDate
     *
     * @return \DateTime 
     */
    public function getApplicationDate()
    {
        return $this->applicationDate;
    }
    
    
    public function getQuestions() {
        return $this->questions;
    }

    public function setQuestions(Collection $questions) {
        $this->questions = $questions;
    }

}
