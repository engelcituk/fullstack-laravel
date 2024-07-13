<?php

namespace App\Services\Frontend;

use  App\Services\Frontend\UIElements\StatIems\Contracts\StatItem;

final class StatGenerator {

    protected array $items = [];

    public function addStatItem(StatItem $item):self
    {
        $this->items [] = $item->toArray();
        return $this;
    }

    public function getStatItems():array
    {
        return $this->items;
    }
}
