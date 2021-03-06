<?php

namespace VendingMachine\Repository;

use VendingMachine\Item\Item;

interface ItemRepository
{
    public function add(Item $item): void;

    public function getItemBySelector($selector): ?Item;

    /** @return array|Item[] */
    public function getAll(): array;
}
