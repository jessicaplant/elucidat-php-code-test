<?php

namespace App;

class GildedRose
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItem($which = null)
    {
        return ($which === null
            ? $this->items
            : $this->items[$which]
        );
    }

    public function nextDay()
    {
        foreach ($this->items as $item) {
            $item->tick();
//            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
//                if ($item->quality > 0) {
//                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
//                        $item->quality = $item->quality - 1;
//                    }
//                }
//            } else {
//                if ($item->quality < 50) {
//                    $item->quality = $item->quality + 1;
//                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
//                        if ($item->sellIn < 11) {
//                            if ($item->quality < 50) {
//                                $item->quality = $item->quality + 1;
//                            }
//                        }
//                        if ($item->sellIn < 6) {
//                            if ($item->quality < 50) {
//                                $item->quality = $item->quality + 1;
//                            }
//                        }
//                    }
//                }
//            }
//            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
//                $item->sellIn = $item->sellIn - 1;
//            }
//            if ($item->sellIn < 0) {
//                if ($item->name != 'Aged Brie') {
//                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
//                        if ($item->quality > 0) {
//                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
//                                $item->quality = $item->quality - 1;
//                            }
//                        }
//                    } else {
//                        $item->quality = $item->quality - $item->quality;
//                    }
//                } else {
//                    if ($item->quality < 50) {
//                        $item->quality = $item->quality + 1;
//                    }
//                }
//            }
        }
    }
}
