<?php

namespace AppBundle\Entity;

trait RangeTrait
{
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $start;

    /**
     * @var \DateTime $updated
     *
     * @ORM\Column(type="datetime")
     */
    private $end;

    /**
     * @return \DateTime
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart($start) {
        $this->start = $start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd() {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd($end) {
        $this->end = $end;
    }

}
