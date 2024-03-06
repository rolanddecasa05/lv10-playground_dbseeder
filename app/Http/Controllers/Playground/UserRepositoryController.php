<?php

namespace App\Http\Controllers\Playground;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Pgmodules\Services\UserService;

class UserRepositoryController extends Controller
{

    public function __construct(public UserService $service) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->service->find($request->all());
        return self::setSuccessResponse(message:null, data:$data); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        try {
            $data = $this->service->create(data:$request->all());
            return self::setSuccessResponse(message:null, data:$data);

        } catch (\Throwable $th) {
            return self::setErrorResponse(message:$th->getMessage());
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->service->findById(id:$id);
        return self::setSuccessResponse(message:null, data:$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        try {
            $data = $this->service->update(id: $id, data:$request->all());
            return self::setSuccessResponse(message:null, data:$data);

        } catch (\Throwable $th) {
            return self::setErrorResponse(message:$th->getMessage());
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = $this->service->delete(id: $id);
            return self::setSuccessResponse(message:null, data:$data);

        } catch (\Throwable $th) {
            return self::setErrorResponse(message:$th->getMessage());
        } 
    }
}
