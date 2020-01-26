<?php


namespace App;


class LessonFilters extends QueryFilter
{
    public function popular($order = 'desc')
    {
        return $this->builder->orderBy('view', $order);
    }

    public function difficulty($label)
    {
        return $this->builder->where('difficulty', $label);
    }

    public function length($order = 'asc')
    {
        return $this->builder->orderBy('length', $order);
    }

    public function take($count)
    {
        return $this->builder->limit($count);
    }
}
