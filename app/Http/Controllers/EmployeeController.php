<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Repositories\EmployeeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Person;
use App\Models\Employee;
use App\Models\Address;
use App\Models\Role;
use App\Models\Permission;
use App\Models\SaleryType;
use App\Models\EmployeeSalery;

class EmployeeController extends AppBaseController
{
    /** @var  EmployeeRepository */
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * Display a listing of the Employee.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->employeeRepository->pushCriteria(new RequestCriteria($request));
        $employees = $this->employeeRepository->all();

        return view('employees.index')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new Employee.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::all()->load('permissions');
        $permissions = Permission::all();
        $salery_types = SaleryType::all()->pluck('name','id');
        return view('employees.create')->withPermissions($permissions)->withRoles($roles)->withSaleries($salery_types);
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param CreateEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        //dd($request);
        $this->validate($request,array(
                'first_name'       => 'required|max:255|min:2',
                'last_name'        => 'required|max:255|min:2',
                'identifier'       => 'required|min:4|max:255|unique:persons,identifier',
                'roles[]'          => 'array|size:1',
                'amount'       => 'between:0,99999',
        ));
        if($request->add_salery == 'checked')
        {
             $this->validate($request,array(
                'amount'       => 'between:0,99999',
            ));
        }
        dd($request);
        $input = $request->all();
        //Employee
		$employee = new Employee();		
		$employee->save();
        //Role
        if($request->role)
            $employee->roles()->sync($request->role, false);
        //Permissions
        if($request->permissions)
            $employee->permissions()->sync($request->permissions, false);
        //Salery
        if($request->add_salery == 'checked')
        {
            $employee_salery = new EmployeeSalery($input);
            $employee_salery->employee()->associate($employee);
            $employee_salery->save();
        }
        //Person
        $person = new Person($input);
		$person->personable()->associate($employee);
		$person->save();
        //Address
        $address = new Address($input);       
        $address->addressable()->associate($person);
        $address->save();
        Flash::success('Employee saved successfully.');

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified Employee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employee = $this->employeeRepository->findWithoutFail($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employee = $this->employeeRepository->findWithoutFail($id);
        $employee->load('employeeSaleries');
        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }
        $roles = Role::all()->load('permissions');
        $permissions = Permission::all();
        $salery_types = SaleryType::all()->pluck('name','id');

        return view('employees.edit')->with('employee', $employee)->withPermissions($permissions)->withRoles($roles)->withSaleries($salery_types);
    }

    /**
     * Update the specified Employee in storage.
     *
     * @param  int              $id
     * @param UpdateEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeRequest $request)
    {
        $employee = $this->employeeRepository->findWithoutFail($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $employee = $this->employeeRepository->update($request->all(), $id);

        Flash::success('Employee updated successfully.');

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified Employee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employee = $this->employeeRepository->findWithoutFail($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $this->employeeRepository->delete($id);

        Flash::success('Employee deleted successfully.');

        return redirect(route('employees.index'));
    }
}
