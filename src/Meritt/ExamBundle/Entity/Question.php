<?php

namespace Meritt\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Question
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Question
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
     * @ORM\Column(name="questionText", type="string", length=255)
     */
    private $questionText;

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer")
     */
    private $points;
    
    /**
     * @ORM\OneToMany(targetEntity="Alternative", mappedBy="question")
     */
    private $alternatives;
    
    /**
     *
     * @var Collection
     * 
     *
     * @ORM\ManyToMany(targetEntity="Exam", mappedBy="questions")
     **/
    private $exams;
    
    /**
     * @ORM\OneToMany(targetEntity="Evaluation", mappedBy="question")
     */
    private $evaluations;

    function __construct() {
        $this->exams = new ArrayCollection();
        $this->evaluations = new ArrayCollection();
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
     * Set questionText
     *
     * @param string $questionText
     * @return Question
     */
    public function setQuestionText($questionText)
    {
        $this->questionText = $questionText;

        return $this;
    }

    /**
     * Get questionText
     *
     * @return string 
     */
    public function getQuestionText()
    {
        return $this->questionText;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Question
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }
    public function getAlternatives() {
        return $this->alternatives;
    }

    public function setAlternatives($alternatives) {
        $this->alternatives = $alternatives;
    }
    
    public function getExams() {
        return $this->exams;
    }

    public function setExams(Collection $exams) {
        $this->exams = $exams;
    }

    public function getEvaluations() {
        return $this->evaluations;
    }

    public function setEvaluations($evaluations) {
        $this->evaluations = $evaluations;
    }




    
}
