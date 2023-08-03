<?php

namespace App\Infra\Entity;

trait EntityTimeStamp
{

    /**
     * Gets triggered only on insert
     * @ORM\PrePersist
     */
    public function onPrePersist():void
    {
        $this->created_at = new \DateTime("now");
    }

    /**
     * Gets triggered every time on update
     * @ORM\PreUpdate
     */
    public function onPreUpdate():void
    {
        $this->updated_at = new \DateTime("now");
    }
}