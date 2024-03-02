<?php

namespace App\Models\Contract;

interface CrudInterface
{
    public function insert(array $data): int;

    public function get(array $columns, array $where): array;

    public function find(int $id, array $where): object;

    public function update(array $data, string $where);

    public function delete(array $where);
}