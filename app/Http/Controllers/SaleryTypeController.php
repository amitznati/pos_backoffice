<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSaleryTypeRequest;
use App\Http\Requests\UpdateSaleryTypeRequest;
use App\Repositories\SaleryTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SaleryTypeController extends AppBaseController
{
    /** @var  SaleryTypeRepository */
    private $saleryTypeRepository;

    public function __construct(SaleryTypeRepository $saleryTypeRepo)
    {
        $this->saleryTypeRepository = $saleryTypeRepo;
    }

    /**
     * Display a listing of the SaleryType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->saleryTypeRepository->pushCriteria(new RequestCriteria($request));
        $saleryTypes = $this->saleryTypeRepository->all();

        return view('salery_types.index')
            ->with('saleryTypes', $saleryTypes);
    }

    /**
     * Show the form for creating a new SaleryType.
     *
     * @return Response
     */
    public function create()
    {
        return view('salery_types.create');
    }

    /**
     * Store a newly created SaleryType in storage.
     *
     * @param CreateSaleryTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateSaleryTypeRequest $request)
    {
        $input = $request->all();

        $saleryType = $this->saleryTypeRepository->create($input);

        Flash::success('Salery Type saved successfully.');

        return redirect(route('saleryTypes.index'));
    }

    /**
     * Display the specified SaleryType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $saleryType = $this->saleryTypeRepository->findWithoutFail($id);

        if (empty($saleryType)) {
            Flash::error('Salery Type not found');

            return redirect(route('saleryTypes.index'));
        }

        return view('salery_types.show')->with('saleryType', $saleryType);
    }

    /**
     * Show the form for editing the specified SaleryType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $saleryType = $this->saleryTypeRepository->findWithoutFail($id);

        if (empty($saleryType)) {
            Flash::error('Salery Type not found');

            return redirect(route('saleryTypes.index'));
        }

        return view('salery_types.edit')->with('saleryType', $saleryType);
    }

    /**
     * Update the specified SaleryType in storage.
     *
     * @param  int              $id
     * @param UpdateSaleryTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSaleryTypeRequest $request)
    {
        $saleryType = $this->saleryTypeRepository->findWithoutFail($id);

        if (empty($saleryType)) {
            Flash::error('Salery Type not found');

            return redirect(route('saleryTypes.index'));
        }

        $saleryType = $this->saleryTypeRepository->update($request->all(), $id);

        Flash::success('Salery Type updated successfully.');

        return redirect(route('saleryTypes.index'));
    }

    /**
     * Remove the specified SaleryType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $saleryType = $this->saleryTypeRepository->findWithoutFail($id);

        if (empty($saleryType)) {
            Flash::error('Salery Type not found');

            return redirect(route('saleryTypes.index'));
        }

        $this->saleryTypeRepository->delete($id);

        Flash::success('Salery Type deleted successfully.');

        return redirect(route('saleryTypes.index'));
    }
}
