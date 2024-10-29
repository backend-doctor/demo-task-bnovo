<?php

namespace App\Repositories;

use App\Dto\GuestDto;
use App\Exceptions\GuestNotFoundException;
use App\Interfaces\GuestRepositoryInterface;
use App\Models\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GuestRepository implements GuestRepositoryInterface
{

    public function paginate(?int $count = null, ? int $current = null): LengthAwarePaginator
    {
        return Guest::paginate(perPage: $count, page: $current);
    }
    /**
     * @inheritDoc
     */
    public function add(GuestDto $dto): Guest
    {
        $guest = Guest::fill((array)$dto);
        $guest->save();
        return $guest;
    }
    /**
     * @inheritDoc
     */
    public function update(int $id, GuestDto $dto): ?Guest
    {
        $guest = Guest::find($id);
        if (!$guest) {
            throw new GuestNotFoundException($id);
        }
        $guest
            ->fill((array)$dto)
            ->save();
        return $guest;
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): ?Guest
    {
        return Guest::find($id);
    }
    /**
     * @inheritDoc
     */
    public function delete(int $id): ?bool
    {
        $guest = Guest::find($id);
        if (!$guest) {
            throw new GuestNotFoundException($id);
        }
        return $guest->delete();
    }
}
