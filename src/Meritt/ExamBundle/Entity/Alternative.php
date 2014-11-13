<?php

namespace Meritt\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Alternative
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Alternative
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
     * @ORM\Column(name="alternativeText", type="string", length=255)
     */
    private $alternativeText;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isCorrect", type="boolean", nullable=true)
     */
    private $isCorrect;

    /**
     * @var string
     *
     * @ORM\Column(name="alternativeLabel", type="string", length=1)
     */
    private $alternativeLabel;
    
    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="alternatives")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    protected $question;
    
    /**
     * @ORM\OneToMany(targetEntity="Evaluation", mappedBy="alternative")
     */
    private $evaluations;

    function __construct() {
        $this->evaluations = new ArrayCollection();
    }
    public function getId() {
        return $this->id;
    }

    public function getAlternativeText() {
        return $this->alternativeText;
    }

    public function getIsCorrect() {
        return $this->isCorrect;
    }

    public function getAlternativeLabel() {
        return $this->alternativeLabel;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function getEvaluations() {
        return $this->evaluations;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAlternativeText($alternativeText) {
        $this->alternativeText = $alternativeText;
    }

    public function setIsCorrect($isCorrect) {
        $this->isCorrect = $isCorrect;
    }

    public function setAlternativeLabel($alternativeLabel) {
        $this->alternativeLabel = $alternativeLabel;
    }

    public function setQuestion($question) {
        $this->question = $question;
    }

    public function setEvaluations($evaluations) {
        $this->evaluations = $evaluations;
    }
    
    public function __toString()
    {
        return $this->getAlternativeLabel();
    }

 
}
