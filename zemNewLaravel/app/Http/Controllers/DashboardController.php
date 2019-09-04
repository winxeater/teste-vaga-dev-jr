<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;
use App\Repositories\ServicesRepository;

class DashboardController extends ServicesController
{
    //
    protected $repository;
    protected $validator;
    protected $servicesrepository;

    public function __construct(UserRepository $repository, UserValidator $validator, ServicesRepository $servicesrepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->servicesrepository = $servicesrepository;
    }

    public function index(){

        $concorrentes = $this->servicesrepository->all();

        return view('user.dashboard', [
            'concorrentes' => $concorrentes,
        ]);
    }

    public function cadastro(){
        return view('templates/cadastro/cadastro');
    }

    public function auth(Request $request){

        $data = [
            'email'     => $request->get('username'),
            'password'  => $request->get('password')
        ];

        try{
            if(env('PASSWORD_HASH')){
                Auth::attempt($data, false);
            }else{
                $user = $this->repository->findWhere(['email' => $request->get('username')])->first();

                
                if(!$user)
                    throw new Exception("O e-mail informado está incorreto");

                if($user->password != $request->get('password'))
                    throw new Exception("Senha inválida!");

                    Auth::login($user);     
            }
            return redirect()->route('user.dashboard');

        } catch (Exception $e) {
            return $e->getMessage();
        }

        

        // dd($request->all());


        // echo "auth mt";
    }
}
