<?php

namespace App\Http\Controllers\Sales;

use App\DataTables\Sales\DmsSdRouteDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Sales\CreateDmsSdRouteRequest;
use App\Http\Requests\Sales\UpdateDmsSdRouteRequest;
use App\Repositories\Sales\DmsSdRouteRepository;
use Flash;
use Response;

class DmsSdRouteController extends AppBaseController
{
    /** @var DmsSdRouteRepository */
    private $dmsSdRouteRepository;

    public function __construct(DmsSdRouteRepository $dmsSdRouteRepo)
    {
        $this->dmsSdRouteRepository = $dmsSdRouteRepo;
    }

    /**
     * Display a listing of the DmsSdRoute.
     *
     * @return Response
     */
    public function index(DmsSdRouteDataTable $dmsSdRouteDataTable)
    {
        return $dmsSdRouteDataTable->render('sales.dms_sd_routes.index');
    }

    /**
     * Show the form for creating a new DmsSdRoute.
     *
     * @return Response
     */
    public function create()
    {
        return view('sales.dms_sd_routes.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsSdRoute in storage.
     *
     * @return Response
     */
    public function store(CreateDmsSdRouteRequest $request)
    {
        $input = $request->all();

        $dmsSdRoute = $this->dmsSdRouteRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsSdRoutes.singular')]));

        return redirect(route('sales.dmsSdRoutes.index'));
    }

    /**
     * Display the specified DmsSdRoute.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsSdRoute = $this->dmsSdRouteRepository->find($id);

        if (empty($dmsSdRoute)) {
            Flash::error(__('models/dmsSdRoutes.singular').' '.__('messages.not_found'));

            return redirect(route('sales.dmsSdRoutes.index'));
        }

        return view('sales.dms_sd_routes.show')->with('dmsSdRoute', $dmsSdRoute);
    }

    /**
     * Show the form for editing the specified DmsSdRoute.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsSdRoute = $this->dmsSdRouteRepository->find($id);

        if (empty($dmsSdRoute)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSdRoutes.singular')]));

            return redirect(route('sales.dmsSdRoutes.index'));
        }

        return view('sales.dms_sd_routes.edit')->with('dmsSdRoute', $dmsSdRoute)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsSdRoute in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsSdRouteRequest $request)
    {
        $dmsSdRoute = $this->dmsSdRouteRepository->find($id);

        if (empty($dmsSdRoute)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSdRoutes.singular')]));

            return redirect(route('sales.dmsSdRoutes.index'));
        }

        $dmsSdRoute = $this->dmsSdRouteRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsSdRoutes.singular')]));

        return redirect(route('sales.dmsSdRoutes.index'));
    }

    /**
     * Remove the specified DmsSdRoute from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsSdRoute = $this->dmsSdRouteRepository->find($id);

        if (empty($dmsSdRoute)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSdRoutes.singular')]));

            return redirect(route('sales.dmsSdRoutes.index'));
        }

        $this->dmsSdRouteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsSdRoutes.singular')]));

        return redirect(route('sales.dmsSdRoutes.index'));
    }

    /**
     * Provide options item based on relationship model DmsSdRoute from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        return [
        ];
    }
}
