<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\ServicesRepository;
use App\Validators\ServicesValidator;
use Exception;

class Service{

    private $repository;
    private $validator;

    public function __construct(ServicesRepository $repository, ServicesValidator $validator){
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data){
        try{

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $concorrente = $this->repository->create($data);

            return [
                'success' => true,
                'message' => "Concorrente cadastrado",
                'data'    => $concorrente,
            ];
        }catch(Exception $e){
            return [
                'success' => false,
                'message' => "Erro de execução",
            ];
        }

    }


    public function update($data, $id){
        try{

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $concorrente = $this->repository->update($data, $id);

            return [
                'success' => true,
                'message' => "Concorrente cadastrado",
                'data'    => $concorrente,
            ];
        }catch(Exception $e){
            return [
                'success' => false,
                'message' => "Erro de execução",
            ];
        }
    }

    public function destroy($concorrente_id){
        try{

            // $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $concorrente = $this->repository->delete($concorrente_id);


            return [
                'success' => true,
                'message' => "Concorrente deletado!",
                'data'    => null,
            ];
        }catch(Exception $e){
            return [
                'success' => false,
                'message' => "Erro de execução",
            ];
        }
    }
}