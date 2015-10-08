<?php namespace Ilkermutlu\Gloss;

use Illuminate\Support\Collection;

class Gloss {

    protected $array;
    protected $collection;
    protected $name = 'name';

    public function createFrom(Array $array = null, Collection $collection = null)
    {
        if ($array) {
            $collection = new Collection($array);
            $this->collection = $collection;
        }

        if ($collection) {
            $this->collection = $collection;
        }
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function make()
    {
        try {
            return $this->reduce();
        } catch (\Exception $e) {
            echo 'Name not found.';
        }
    }

    public function reduce()
    {
        $reduced = $this->collection->reduce(function($groupedByFirstLetter, $record) {
            if (isset($record->{$this->name})) {
                $firstCharacter = mb_substr($record->{$this->name}, 0, 1);
                if (!isset($groupedByFirstLetter[$firstCharacter])) {
                    $groupedByFirstLetter[$firstCharacter] = [];
                }
                $groupedByFirstLetter[$firstCharacter][] = $record;
                return $groupedByFirstLetter;
            } else {
                throw new \Exception;
            }
        }, []);
        return $reduced;
    }
}
