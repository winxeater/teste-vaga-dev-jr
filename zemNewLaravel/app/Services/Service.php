<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\ServicesRepository;
use App\Validators\ServicesValidator;

class Service{

    private $repository;
    private $validator;

    public function __construct(ServicesRepository $repository, ServicesValidator $validator){
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data){
        try{

            $this->validator->with($data->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $concorrente = $this->repository->create($data);

            return [
                'success' => true,
                'message' => "Concorrente cadastrado",
                'data'    => $concorrente,
            ];
        }catch(\Exception $e){
            return [
                'success' => false,
                'message' => "Erro de execução",
            ];
        }

    }


    public function update(){}
    public function delete(){}
}