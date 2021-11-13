<?php

namespace App\Http\Controllers\Base;

use Flash;
use Response;
use App\Http\Requests\Base;
use App\Repositories\Base\CityRepository;
use App\DataTables\Base\LocationDataTable;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Base\LocationRepository;
use App\Http\Requests\Base\CreateLocationRequest;
use App\Http\Requests\Base\UpdateLocationRequest;

class LocationController extends AppBaseController
{
    /** @var  LocationRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = LocationRepository::class;
    }

    /**
     * Display a listing of the Location.
     *
     * @param LocationDataTable $locationDataTable
     * @return Response
     */
    public function index(LocationDataTable $locationDataTable)
    {
        return $locationDataTable->render('base.locations.index');
    }

    /**
     * Show the form for creating a new Location.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.locations.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Location in storage.
     *
     * @param CreateLocationRequest $request
     *
     * @return Response
     */
    public function store(CreateLocationRequest $request)
    {
        $input = $request->all();

        $location = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/locations.singular')]));

        return redirect(route('base.locations.index'));
    }

    /**
     * Display the specified Location.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $location = $this->getRepositoryObj()->find($id);

        if (empty($location)) {
            Flash::error(__('models/locations.singular').' '.__('messages.not_found'));

            return redirect(route('base.locations.index'));
        }

        return view('base.locations.show')->with('location', $location);
    }

    /**
     * Show the form for editing the specified Location.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $location = $this->getRepositoryObj()->find($id);

        if (empty($location)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locations.singular')]));

            return redirect(route('base.locations.index'));
        }

        return view('base.locations.edit')->with('location', $location)->with($this->getOptionItems());
    }

    /**
     * Update the specified Location in storage.
     *
     * @param  int              $id
     * @param UpdateLocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLocationRequest $request)
    {
        $location = $this->getRepositoryObj()->find($id);

        if (empty($location)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locations.singular')]));

            return redirect(route('base.locations.index'));
        }

        $location = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/locations.singular')]));

        return redirect(route('base.locations.index'));
    }

    /**
     * Remove the specified Location from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $location = $this->getRepositoryObj()->find($id);

        if (empty($location)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locations.singular')]));

            return redirect(route('base.locations.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/locations.singular')]));

        return redirect(route('base.locations.index'));
    }

    /**
     * Provide options item based on relationship model Location from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
                
        $city = new CityRepository(app());
        $typeItems = [
            '' => __('crud.option.location_type_placeholder'),
            'origin' => 'origin',
            'destination' => 'destination',
            'common' => 'common'
        ];
        return [
            'cityItems' => ['' => __('crud.option.city_placeholder')] + $city->pluck([], null, null, 'name', 'name'),
            'typeItems' => $typeItems
        ];
    }
}
