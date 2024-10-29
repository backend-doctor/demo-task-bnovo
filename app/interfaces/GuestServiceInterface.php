<?php

namespace App\Interfaces;

use App\Dto\GuestDto;
use App\Models\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GuestServiceInterface
{
    public function paginate(int $page): LengthAwarePaginator;
    public function store(GuestDto $dto): Guest;

    public function show(int $id): ?Guest;

    public function update(int $id, GuestDto $dto): ?Guest;

    public function destroy(int $id): ?bool;
}
