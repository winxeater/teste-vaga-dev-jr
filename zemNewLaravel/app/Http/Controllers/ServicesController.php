<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ServicesCreateRequest;
use App\Http\Requests\ServicesUpdateRequest;
use App\Repositories\ServicesRepository;
use App\Services\Service;


/**
 * Class ServicesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ServicesController extends Controller
{
    /**
     * @var ServicesRepository
     */
    protected $repository;
    protected $service;


    /**
     * ServicesController constructor.
     *
     * @param ServicesRepository $repository
     * @param ServicesValidator $validator
     */
    public function __construct(ServicesRepository $repository, Service $service)
    {
        $this->repository = $repository;
        $this->service  = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $service = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $service,
            ]);
        }

        return view('services.index', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ServicesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ServicesCreateRequest $request)
    {
        $request = $this->$service->store($request->all());

        if($request['success'])
            $concorrente = $request('data');
        else
            $usuario = null;

        return view('cadastro.cadastro', [
            'concorrente' => $concorrente,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $service,
            ]);
        }

        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = $this->repository->find($id);

        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ServicesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ServicesUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $service = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Services updated.',
                'data'    => $service->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Services deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Services deleted.');
    }
}