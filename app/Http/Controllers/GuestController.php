<?php

namespace App\Http\Controllers;

use App\Dto\GuestDto;
use App\Http\Requests\IndexGuestRequest;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Http\Resources\GuestResource;
use App\Interfaces\GuestServiceInterface;
use Symfony\Component\HttpFoundation\Response;

class GuestController extends Controller
{
    public function __construct(
        private readonly GuestServiceInterface $service
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(IndexGuestRequest $request)
    {
        return
            GuestResource::collection(
                $this->service->paginate($request->page)
            );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuestRequest $request)
    {
        return response()
            ->setStatusCode(Response::HTTP_CREATED)
            ->json(
                $this->service->store(GuestDto::fromRequest($request))
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()
            ->json(
                $this->service->show($id)
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuestRequest $request, string $id)
    {
        return response()
            ->json(
                $this->service->update($id, GuestDto::fromRequest($request))
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()
            ->json(
                $this->service->destroy($id)
            );
    }
}
