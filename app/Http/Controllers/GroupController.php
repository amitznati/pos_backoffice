<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreategroupRequest;
use App\Http\Requests\UpdategroupRequest;
use App\Repositories\groupRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Department;
class GroupController extends AppBaseController
{
    /** @var  groupRepository */
    private $groupRepository;

    public function __construct(groupRepository $groupRepo)
    {
        $this->groupRepository = $groupRepo;
    }

    /**
     * Display a listing of the group.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->groupRepository->pushCriteria(new RequestCriteria($request));
        $groups = $this->groupRepository->all();

        return view('groups.index')
            ->with('groups', $groups);
    }

    /**
     * Show the form for creating a new group.
     *
     * @return Response
     */
    public function create()
    {
		$departments = Department::all()->pluck('name','id');
        return view('groups.create')->withDepartments($departments);
    }

    /**
     * Store a newly created group in storage.
     *
     * @param CreategroupRequest $request
     *
     * @return Response
     */
    public function store(CreategroupRequest $request)
    {
        $input = $request->all();

        $group = $this->groupRepository->create($input);

        Flash::success('Group saved successfully.');

        return redirect(route('groups.index'));
    }

    /**
     * Display the specified group.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $group = $this->groupRepository->findWithoutFail($id);

        if (empty($group)) {
            Flash::error('Group not found');

            return redirect(route('groups.index'));
        }

        return view('groups.show')->with('group', $group);
    }

    /**
     * Show the form for editing the specified group.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $group = $this->groupRepository->findWithoutFail($id);

        if (empty($group)) {
            Flash::error('Group not found');

            return redirect(route('groups.index'));
        }
        $departments = Department::all()->pluck('name','id');
        return view('groups.edit')->with('group', $group)->withDepartments($departments);
    }

    /**
     * Update the specified group in storage.
     *
     * @param  int              $id
     * @param UpdategroupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategroupRequest $request)
    {
        $group = $this->groupRepository->findWithoutFail($id);

        if (empty($group)) {
            Flash::error('Group not found');

            return redirect(route('groups.index'));
        }

        $group = $this->groupRepository->update($request->all(), $id);

        Flash::success('Group updated successfully.');

        return redirect(route('groups.index'));
    }

    /**
     * Remove the specified group from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $group = $this->groupRepository->findWithoutFail($id);

        if (empty($group)) {
            Flash::error('Group not found');

            return redirect(route('groups.index'));
        }

        $this->groupRepository->delete($id);

        Flash::success('Group deleted successfully.');

        return redirect(route('groups.index'));
    }
}
