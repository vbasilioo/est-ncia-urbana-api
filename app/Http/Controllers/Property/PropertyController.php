<?php

namespace App\Http\Controllers\Property;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Property\IdPropertyRequest;
use App\Http\Requests\Property\IndexPropertyRequest;
use App\Http\Requests\Property\StorePropertyRequest;
use App\Http\Requests\Property\UpdatePropertyRequest;
use App\Services\Property\PropertyService;

class PropertyController extends Controller
{
    public function __construct(protected PropertyService $propertyService){}

    public function store(StorePropertyRequest $request){
        try{
            $data = $this->propertyService->store($request->validated());
            return ReturnApi::success($data, 'Nova propriedade criada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao cadastrar uma nova propriedade.', $ex->getCode() ?? 500);
        }
    }

    public function index(IndexPropertyRequest $request){
        try{
            $data = $this->propertyService->index($request->validated());
            return ReturnApi::success($data, 'Propriedades listadas com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao listar as propriedades.', $ex->getCode() ?? 500);
        }
    }

    public function show(IdPropertyRequest $request){
        try{
            $data = $this->propertyService->show($request->validated());
            return ReturnApi::success($data, 'Propriedade exibida com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao mostrar a propriedade.', $ex->getCode() ?? 500);
        }
    }

    public function update(UpdatePropertyRequest $request){
        try{
            $data = $this->propertyService->update($request->validated());
            return ReturnApi::success($data, 'Propriedade atualizada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao atualizar a propriedade.', $ex->getCode() ?? 500);
        }
    }

    public function destroy(IdPropertyRequest $request){
        try{
            $data = $this->propertyService->destroy($request->validated());
            return ReturnApi::success($data, 'Propriedade deletada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao deletar a propriedade.', $ex->getCode() ?? 500);
        }
    }

    public function restore(IdPropertyRequest $request){
        try{
            $data = $this->propertyService->restore($request->validated());
            return ReturnApi::success($data, 'Propriedade restaurada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao restaurar a propriedade.', $ex->getCode() ?? 500);
        }
    }
}
