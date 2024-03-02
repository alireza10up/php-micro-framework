<?php

namespace App\Models\Contract;

abstract class BaseModel implements CrudInterface
{
    protected $connection;
    protected string $table;
    protected string $primaryKey = 'id';
    protected int $pageSize = 10;
    protected array $attributes = [];

    protected function __construct()
    {
        # Todo Create Connection
    }

    protected function getAttribute($key): null|string
    {
        if (!$key || array_key_exists($key, $this->attributes)) return null;
        return $this->attributes[$key];
    }
}