<?php

namespace App\Interfaces;

use App\Dto\GuestDto;
use App\Models\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GuestRepositoryInterface
{
    public function paginate(?int $count = null, ?int $current = null): LengthAwarePaginator;
    public function add(GuestDto $dto): Guest;

    public function find(int $id): ?Guest;
    public function update(int $id, GuestDto $dto): ?Guest;

    public function delete(int $id): ?bool;
}
