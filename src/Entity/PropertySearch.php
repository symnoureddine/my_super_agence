<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch{


    /**
     * @var int|null
     * 
     */
    private $maxPrice;

    /**
     * @var int|null
     * @Assert\Range(min=10, max=400)
     */
    private $minSurface;


    /**
     * @var ArrayCollection
     */
    private $optionns;

    public function __construct()
    {
        $optionns =  new ArrayCollection();
    }

    /**
     * Get the value of maxPrice
     *
     * @return  int|null
     */ 
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * Set the value of maxPrice
     *
     * @param  int|null  $maxPrice
     *
     * @return  self
     */ 
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get the value of minSurface
     *
     * @return  int|null
     */ 
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @param  int|null  $minSurface
     *
     * @return  self
     */ 
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of optionns
     *
     * @return  ArrayCollection
     */ 
    public function getOptionns() 
    {
        return $this->optionns;
    }

    /**
     * Set the value of optionns
     *
     * @param  ArrayCollection  $optionns
     *
     * @return  self
     */ 
    public function setOptionns(ArrayCollection $optionns)
    {
        $this->optionns = $optionns;

        return $this;
    }
}
