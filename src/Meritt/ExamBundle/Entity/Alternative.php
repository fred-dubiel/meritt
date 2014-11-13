<?php

namespace Meritt\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="isCorrect", type="boolean")
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set alternativeText
     *
     * @param string $alternativeText
     * @return Alternative
     */
    public function setAlternativeText($alternativeText)
    {
        $this->alternativeText = $alternativeText;

        return $this;
    }

    /**
     * Get alternativeText
     *
     * @return string 
     */
    public function getAlternativeText()
    {
        return $this->alternativeText;
    }

    /**
     * Set isCorrect
     *
     * @param boolean $isCorrect
     * @return Alternative
     */
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    /**
     * Get isCorrect
     *
     * @return boolean 
     */
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }

    /**
     * Set alternativeLabel
     *
     * @param string $alternativeLabel
     * @return Alternative
     */
    public function setAlternativeLabel($alternativeLabel)
    {
        $this->alternativeLabel = $alternativeLabel;

        return $this;
    }

    /**
     * Get alternativeLabel
     *
     * @return string 
     */
    public function getAlternativeLabel()
    {
        return $this->alternativeLabel;
    }
    
    public function getQuestion() {
        return $this->question;
    }

    public function setQuestion($question) {
        $this->question = $question;
    }


}
