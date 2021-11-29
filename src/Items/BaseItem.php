<?php

namespace App\Items;

use App\Item as GoblinsItem;

class BaseItem extends GoblinsItem
{
    public $name;
    public $sellIn;
    public $quality;

    public function __construct($name, $quality, $sellIn)
    {
        parent::__construct($name, $quality, $sellIn);
    }

    public function tick()
    {
        switch($this->name) {
            case 'normal': $this->beNormal(); break;
            case 'Aged Brie': $this->beCheese(); break;
            case 'Backstage passes to a TAFKAL80ETC concert': $this->beBackstagePass(); break;
        }
    }

    private function beNormal()
    {
        --$this->quality;
        --$this->sellIn;

        if ($this->sellIn <= 0) {
            --$this->quality;
        }
        if ($this->quality < 0) {
            $this->quality = 0;
        }
    }

    private function beCheese()
    {
        ++$this->quality;
        --$this->sellIn;

        if ($this->sellIn < 0) {
            ++$this->quality;
        }
        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }

    private function beBackstagePass()
    {
        ++$this->quality;
        --$this->sellIn;

        if ($this->sellIn <= 0) {
            $this->quality = 0;
        }
        if ($this->sellIn === 1) {
            $this->quality = 50;
        }
    }
}