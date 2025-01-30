<?php

declare(strict_types=1);

namespace App\Common;

use Countable;
use DomainException;
use Iterator;
use JsonSerializable;

abstract class BaseCollection implements Iterator, Countable, JsonSerializable
{
    protected array $collection = [];

    final public function next(): void
    {
        next($this->collection);
    }

    final public function key(): null|int|string
    {
        return key($this->collection);
    }

    final public function valid(): bool
    {
        return null !== key($this->collection);
    }

    final public function rewind(): void
    {
        reset($this->collection);
    }

    final public function getCollection(): array
    {
        return $this->collection;
    }

    final public function count(): int
    {
        return \count($this->collection);
    }

    final public function isEmpty(): bool
    {
        return empty($this->collection);
    }

    final public function jsonSerialize(): array
    {
        $data = [];
        foreach ($this->collection as $element) {
            if (method_exists($element, 'jsonSerialize')) {
                $data[] = $element->jsonSerialize();
            } else {
                throw new DomainException('Methods jsonSerialize not found in ' . \get_class($element));
            }
        }

        return $data;
    }

    final public function sortByAsc(callable $callback, int $options = SORT_REGULAR, bool $descending = false)
    {
        $results = [];

        foreach ($this->collection as $key => $value) {
            $results[$key] = $callback($value, $key);
        }

        $descending ? arsort($results, $options)
            : asort($results, $options);

        foreach (array_keys($results) as $key) {
            $results[$key] = $this->collection[$key];
        }

        return self::createFromArray($results);
    }

    final public function sortByDesc(callable $callback, int $options = SORT_REGULAR)
    {
        return $this->sortByAsc($callback, $options, true);
    }
}
