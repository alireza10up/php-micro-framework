<?php

namespace App\Models\Contract;

class JsonBaseModel extends BaseModel
{
    #[\Override] public function insert(array $data): int
    {
        // TODO: Implement insert() method.
    }

    #[\Override] public function get(array $columns, array $where): array
    {
        // TODO: Implement get() method.
    }

    #[\Override] public function find(int $id, array $where): object
    {
        // TODO: Implement find() method.
    }

    #[\Override] public function update(array $data, string $where)
    {
        // TODO: Implement update() method.
    }

    #[\Override] public function delete(array $where)
    {
        // TODO: Implement delete() method.
    }
}