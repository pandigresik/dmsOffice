<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\TripDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateTripRequest;
use App\Http\Requests\Base\UpdateTripRequest;
use App\Repositories\Base\CityRepository;
use App\Repositories\Base\TripRepository;
use App\Repositories\Inventory\ProductCategoriesRepository;
use Flash;
use Response;

class TripController extends AppBaseController
{
    /** @var TripRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = TripRepository::class;
    }

    /**
     * Display a listing of the Trip.
     *
     * @return Response
     */
    public function index(TripDataTable $tripDataTable)
    {
        return $tripDataTable->render('base.trips.index');
    }

    /**
     * Show the form for creating a new Trip.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.trips.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Trip in storage.
     *
     * @return Response
     */
    public function store(CreateTripRequest $request)
    {
        $input = $request->all();

        $trip = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/trips.singular')]));

        return redirect(route('base.trips.index'));
    }

    /**
     * Display the specified Trip.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trip = $this->getRepositoryObj()->find($id);

        if (empty($trip)) {
            Flash::error(__('models/trips.singular').' '.__('messages.not_found'));

            return redirect(route('base.trips.index'));
        }

        return view('base.trips.show')->with('trip', $trip);
    }

    /**
     * Show the form for editing the specified Trip.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trip = $this->getRepositoryObj()->find($id);

        if (empty($trip)) {
            Flash::error(__('messages.not_found', ['model' => __('models/trips.singular')]));

            return redirect(route('base.trips.index'));
        }

        return view('base.trips.edit')->with('trip', $trip)->with($this->getOptionItems());
    }

    /**
     * Update the specified Trip in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateTripRequest $request)
    {
        $trip = $this->getRepositoryObj()->find($id);

        if (empty($trip)) {
            Flash::error(__('messages.not_found', ['model' => __('models/trips.singular')]));

            return redirect(route('base.trips.index'));
        }

        $trip = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/trips.singular')]));

        return redirect(route('base.trips.index'));
    }

    /**
     * Remove the specified Trip from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trip = $this->getRepositoryObj()->find($id);

        if (empty($trip)) {
            Flash::error(__('messages.not_found', ['model' => __('models/trips.singular')]));

            return redirect(route('base.trips.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/trips.singular')]));

        return redirect(route('base.trips.index'));
    }

    /**
     * Provide options item based on relationship model Trip from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $city = new CityRepository(app());
        $productCategories = new ProductCategoriesRepository(app());

        return [
            'cityItems' => ['' => __('crud.option.city_placeholder')] + $city->pluck(),
            'productCategoriesItems' => ['' => __('crud.option.product_categories_placeholder')] + $productCategories->pluck(),
        ];
    }
}
