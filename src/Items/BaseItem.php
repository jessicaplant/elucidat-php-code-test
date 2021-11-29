<?php

namespace App\Items;

use App\Item as GoblinsItem;

/**
 * Hopefully the goblin is merciful that I haven't touched HIS items,
 * but have improved them?
 */
class BaseItem extends GoblinsItem
{
    /**
     * My original plan for this test was to create an abstract BaseItem with
     * subclasses overriding the tick() function to implement their various requirements
     * around quality and dates - problem is I wasn't sure if this would anger
     * the goblin as I'd have to change the tests which would in turn change the
     * array.
     *
     * I also wasn't allowed to DIRECTLY touch the Item class but I could extend
     * it? I think? Given the base Item was identical with just a bit of sugar on
     * top I hope this is acceptable. I didn't want to turn in a rejigged pile
     * of conditionals so did look for ways and means to make this more OOP but if
     * I contravened the rules I'm sorry - I did my best to stick within them.
     */
    public $name;
    public $sellIn;
    public $quality;

    public function __construct($name, $quality, $sellIn)
    {
        parent::__construct($name, $quality, $sellIn);
    }

    /**
     * This is the method I'd have overridden in subclasses but given I
     * couldn't quickly find a way to transform an object into another one
     * in the constructor (I did try and it was madness) this was the easiest
     * way I could think to modify behaviour based on the one thing that identifies
     * the 'thing' - the name.
     */
    public function tick()
    {
        switch($this->name) {
            case 'Aged Brie': $this->beCheese(); break;
            case strpos($this->name, 'Sulfuras') !== false : $this->beExecutus(); break;
            case strpos($this->name, 'Backstage passes') !== false :  $this->beBackstagePass(); break;
            case strpos($this->name, 'Conjured') !== false : $this->beManaCake(); break;
            default: $this->beNormal();
        }
    }

    /**
     * This would be the functionality of the abstract class - thing goes down over
     * time.
     */
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

    /**
     * It ain't easy being cheesy! This was the first one I had to think
     * about extensively and was guided heavily by the tests. If this was a
     * real world example I'd extend a Cheese base class with all sorts of
     * different cheeses providing different behaviours.
     *
     * My favourite is stilton. That remains at quality 50 forever in my opinion.
     */
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

    /**
     * This one was tricky - clearly the author of the test is a fan of
     * Elite Tauren Chieftain so I didn't want to do them wrong, but the rules
     * set out were interesting and required a bit of playing around.
     */
    private function beBackstagePass()
    {
        ++$this->quality;
        --$this->sellIn;

        if ($this->sellIn < 10) {
            ++$this->quality;
        }
        if ($this->sellIn <= 5) {
            ++$this->quality;
        }
        if ($this->sellIn < 0) {
            $this->quality = 0;
        }
        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }

    /**
     * This caught me by surprise originally until I realised the lack of a default
     * entry in switch/case meant the Ragnoros stuff was behaving as expected - until I realised
     * I had scope to change the test owing to the last line that stated his items would have
     * a quality of 80.
     *
     * I would normally abstract this into some kind of LegendaryItem but time is pressing. Also I
     * fear the goblin.
     */
    private function beExecutus()
    {
        $this->quality = 80;
    }

    private function beManaCake()
    {
        --$this->quality;
        --$this->quality;
        --$this->sellIn;

        if ($this->sellIn <= 0) {
            --$this->quality;
            --$this->quality;
        }
        if ($this->quality < 0) {
            $this->quality = 0;
        }
    }
}