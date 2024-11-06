<?php

namespace App\Http\Controllers\Leasing;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Leasing\IdLeasingRequest;
use App\Http\Requests\Leasing\IndexLeasingRequest;
use App\Http\Requests\Leasing\StoreLeasingRequest;
use App\Http\Requests\Leasing\UpdateLeasingRequest;
use App\Services\Leasing\LeasingService;

class LeasingController extends Controller
{
    public function __construct(protected LeasingService $leasingService){}

    public function store(StoreLeasingRequest $request){
        try{
            $data = $this->leasingService->store($request->validated());
            return ReturnApi::success($data, 'Contrato de locação criado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao criar contrato de locação.', $ex->getCode() ?? 500);
        }
    }

    public function index(IndexLeasingRequest $request){
        try{
            $data = $this->leasingService->index($request->validated());
            return ReturnApi::success($data, 'Contratos de locação listados com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao listar contratos de locação.', $ex->getCode() ?? 500);
        }
    }

    public function show(IdLeasingRequest $request){
        try{
            $data = $this->leasingService->show($request->validated());
            return ReturnApi::success($data, 'Contrato de locação encontrado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao mostrar contrato de locação.', $ex->getCode() ?? 500);
        }
    }

    public function update(UpdateLeasingRequest $request){
        try{
            $data = $this->leasingService->update($request->validated());
            return ReturnApi::success($data, 'Contrato de locação atualizado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao atualizar contrato de locação.', $ex->getCode() ?? 500);
        }
    }

    public function destroy(IdLeasingRequest $request){
        try{
            $data = $this->leasingService->destroy($request->validated());
            return ReturnApi::success($data, 'Contrato de locação excluído com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao excluir contrato de locação.', $ex->getCode() ?? 500);
        }
    }

    public function restore(IdLeasingRequest $request){
        try{
            $data = $this->leasingService->restore($request->validated());
            return ReturnApi::success($data, 'Contrato de locação restaurado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao restaurar contrato de locação.', $ex->getCode() ?? 500);
        }
    }
}
