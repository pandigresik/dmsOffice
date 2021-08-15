<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\RouteTripDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateRouteTripRequest;
use App\Http\Requests\Base\UpdateRouteTripRequest;
use App\Repositories\Base\CityRepository;
use App\Repositories\Base\RouteTripRepository;
use App\Repositories\Base\VehicleGroupRepository;
use Flash;
use Response;

class RouteTripController extends AppBaseController
{
    /** @var RouteTripRepository */
    private $routeTripRepository;

    public function __construct(RouteTripRepository $routeTripRepo)
    {
        $this->routeTripRepository = $routeTripRepo;
    }

    /**
     * Display a listing of the RouteTrip.
     *
     * @return Response
     */
    public function index(RouteTripDataTable $routeTripDataTable)
    {
        return $routeTripDataTable->render('base.route_trips.index');
    }

    /**
     * Show the form for creating a new RouteTrip.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.route_trips.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created RouteTrip in storage.
     *
     * @return Response
     */
    public function store(CreateRouteTripRequest $request)
    {
        $input = $request->all();

        $routeTrip = $this->routeTripRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/routeTrips.singular')]));

        return redirect(route('base.routeTrips.index'));
    }

    /**
     * Display the specified RouteTrip.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $routeTrip = $this->routeTripRepository->find($id);

        if (empty($routeTrip)) {
            Flash::error(__('models/routeTrips.singular').' '.__('messages.not_found'));

            return redirect(route('base.routeTrips.index'));
        }

        return view('base.route_trips.show')->with('routeTrip', $routeTrip);
    }

    /**
     * Show the form for editing the specified RouteTrip.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $routeTrip = $this->routeTripRepository->find($id);

        if (empty($routeTrip)) {
            Flash::error(__('messages.not_found', ['model' => __('models/routeTrips.singular')]));

            return redirect(route('base.routeTrips.index'));
        }

        return view('base.route_trips.edit')->with('routeTrip', $routeTrip)->with($this->getOptionItems());
    }

    /**
     * Update the specified RouteTrip in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateRouteTripRequest $request)
    {
        $routeTrip = $this->routeTripRepository->find($id);

        if (empty($routeTrip)) {
            Flash::error(__('messages.not_found', ['model' => __('models/routeTrips.singular')]));

            return redirect(route('base.routeTrips.index'));
        }

        $routeTrip = $this->routeTripRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/routeTrips.singular')]));

        return redirect(route('base.routeTrips.index'));
    }

    /**
     * Remove the specified RouteTrip from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $routeTrip = $this->routeTripRepository->find($id);

        if (empty($routeTrip)) {
            Flash::error(__('messages.not_found', ['model' => __('models/routeTrips.singular')]));

            return redirect(route('base.routeTrips.index'));
        }

        $this->routeTripRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/routeTrips.singular')]));

        return redirect(route('base.routeTrips.index'));
    }

    /**
     * Provide options item based on relationship model RouteTrip from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $city = new CityRepository(app());
        $vehicleGroup = new VehicleGroupRepository(app());

        return [
            'cityOriginItems' => ['' => __('crud.option.city_placeholder_origin')] + $city->pluck(),
            'cityDestinationItems' => ['' => __('crud.option.city_placeholder_origin')] + $city->pluck(),
            'vehicleGroupItems' => ['' => __('crud.option.vehicleGroup_placeholder')] + $vehicleGroup->pluck(),
        ];
    }
}
