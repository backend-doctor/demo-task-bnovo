<?php

namespace App\Services;

use App\Dto\GuestDto;
use App\Interfaces\GuestRepositoryInterface;
use App\Interfaces\GuestServiceInterface;
use App\Models\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GuestService implements GuestServiceInterface
{
    public function __construct(
        private readonly GuestRepositoryInterface $repository
    ) {}

    public function paginate(int $page): LengthAwarePaginator
    {
        return $this->repository->paginate(current: $page);
    }
    public function store(GuestDto $dto): Guest
    {
        return $this->repository->add($dto);
    }
    public function update(int $id, GuestDto $dto):?Guest
    {
        return $this->repository->update($id, $dto);
    }
    public function show(int $id): ?Guest
    {
        return $this->repository->find($id);
    }

    public function destroy($id): ?bool
    {
        return $this->repository->delete($id);
    }
}
