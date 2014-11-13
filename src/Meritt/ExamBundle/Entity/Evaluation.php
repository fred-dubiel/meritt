<?php

namespace Meritt\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Evaluation
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
     * @ORM\ManyToOne(targetEntity="Exam", inversedBy="evaluations")
     * @ORM\JoinColumn(name="exam_id", referencedColumnName="id")
     */
    private $exam;
    
    /**
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="evaluations")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     */
    private $student;
    /**
     * @ORM\ManyToOne(targetEntity="Alternative", inversedBy="evaluations")
     * @ORM\JoinColumn(name="alternative_id", referencedColumnName="id")
     */
    private $alternative;
    
    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="evalutions")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    private $question;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function getExam() {
        return $this->exam;
    }

    public function getStudent() {
        return $this->student;
    }

    public function getAlternative() {
        return $this->alternative;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function setExam($exam) {
        $this->exam = $exam;
    }

    public function setStudent($student) {
        $this->student = $student;
    }

    public function setAlternative($alternative) {
        $this->alternative = $alternative;
    }

    public function setQuestion($question) {
        $this->question = $question;
    }


}
