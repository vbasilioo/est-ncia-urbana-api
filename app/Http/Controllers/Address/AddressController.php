<?php

namespace App\Http\Controllers\Address;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Address\IdAddressRequest;
use App\Http\Requests\Address\IndexAddressRequest;
use App\Http\Requests\Address\StoreAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Services\Address\AddressService;

class AddressController extends Controller
{
    public function __construct(protected AddressService $addressService){}

    /**
     * Armazena um novo endereço.
     *
     * @param StoreAddressRequest $request A requisição validada contendo os dados do endereço.
     * @return \Illuminate\Http\JsonResponse A resposta com os dados do endereço criado e uma mensagem de sucesso.
     * @throws ApiException Se ocorrer um erro durante o armazenamento do endereço.
     */
    public function store(StoreAddressRequest $request){
        try{
            $data = $this->addressService->store($request->validated());
            return ReturnApi::success($data, 'Endereço cadastrado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao cadastrar um novo endereço.', $ex->getCode() ?? 500);
        }
    }

    /**
     * Lista os endereços com base nos parâmetros fornecidos na requisição.
     *
     * @param IndexAddressRequest $request A requisição validada contendo os filtros e ordenação dos dados.
     * @return \Illuminate\Http\JsonResponse A resposta com os dados dos endereços e uma mensagem de sucesso.
     * @throws ApiException Se ocorrer um erro durante a listagem dos endereços.
     */
    public function index(IndexAddressRequest $request){
        try{
            $data = $this->addressService->index($request->validated());
            return ReturnApi::success($data, 'Endereços listados com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao listar os endereços.', $ex->getCode() ?? 500);
        }
    }

    /**
     * Exibe os detalhes de um endereço específico.
     *
     * @param IdAddressRequest $request A requisição validada contendo o ID do endereço a ser exibido.
     * @return \Illuminate\Http\JsonResponse A resposta com os dados do endereço e uma mensagem de sucesso.
     * @throws ApiException Se ocorrer um erro durante a busca do endereço ou se o ID não for fornecido.
     */
    public function show(IdAddressRequest $request){
        try{
            $data = $this->addressService->show($request->validated());
            return ReturnApi::success($data, 'Endereço encontrado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao mostrar o endereço.', $ex->getCode() ?? 500);
        }
    }

    /**
     * Atualiza um endereço existente.
     *
     * @param UpdateAddressRequest $request A requisição validada contendo os dados do endereço a ser atualizado.
     * @return \Illuminate\Http\JsonResponse A resposta com os dados do endereço atualizado e uma mensagem de sucesso.
     * @throws ApiException Se ocorrer um erro durante a atualização do endereço.
     */
    public function update(UpdateAddressRequest $request){
        try{
            $data = $this->addressService->update($request->validated());
            return ReturnApi::success($data, 'Endereço atualizado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao atualizar endereço.', $ex->getCode() ?? 500);
        }
    }

    public function destroy(IdAddressRequest $request){
        try{
            $data = $this->addressService->destroy($request->validated());
            return ReturnApi::success($data, 'Endereço excluído com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao excluir endereço.', $ex->getCode() ?? 500);
        }
    }

    public function restore(IdAddressRequest $request){
        try{
            $data = $this->addressService->restore($request->validated());
            return ReturnApi::success($data, 'Endereço restaurado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao restaurar endereço.', $ex->getCode() ?? 500);
        }
    }
}
