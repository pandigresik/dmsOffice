<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsArDoccustomerDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateDmsArDoccustomerRequest;
use App\Http\Requests\Base\UpdateDmsArDoccustomerRequest;
use App\Repositories\Base\DmsArDoccustomerRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmsArDoccustomerController extends AppBaseController
{
    /** @var  DmsArDoccustomerRepository */
    private $dmsArDoccustomerRepository;

    public function __construct(DmsArDoccustomerRepository $dmsArDoccustomerRepo)
    {
        $this->dmsArDoccustomerRepository = $dmsArDoccustomerRepo;
    }

    /**
     * Display a listing of the DmsArDoccustomer.
     *
     * @param DmsArDoccustomerDataTable $dmsArDoccustomerDataTable
     * @return Response
     */
    public function index(DmsArDoccustomerDataTable $dmsArDoccustomerDataTable)
    {
        return $dmsArDoccustomerDataTable->render('base.dms_ar_doccustomers.index');
    }

    /**
     * Show the form for creating a new DmsArDoccustomer.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_ar_doccustomers.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsArDoccustomer in storage.
     *
     * @param CreateDmsArDoccustomerRequest $request
     *
     * @return Response
     */
    public function store(CreateDmsArDoccustomerRequest $request)
    {
        $input = $request->all();

        $dmsArDoccustomer = $this->dmsArDoccustomerRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsArDoccustomers.singular')]));

        return redirect(route('base.dmsArDoccustomers.index'));
    }

    /**
     * Display the specified DmsArDoccustomer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsArDoccustomer = $this->dmsArDoccustomerRepository->find($id);

        if (empty($dmsArDoccustomer)) {
            Flash::error(__('models/dmsArDoccustomers.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsArDoccustomers.index'));
        }

        return view('base.dms_ar_doccustomers.show')->with('dmsArDoccustomer', $dmsArDoccustomer);
    }

    /**
     * Show the form for editing the specified DmsArDoccustomer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsArDoccustomer = $this->dmsArDoccustomerRepository->find($id);

        if (empty($dmsArDoccustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArDoccustomers.singular')]));

            return redirect(route('base.dmsArDoccustomers.index'));
        }

        return view('base.dms_ar_doccustomers.edit')->with('dmsArDoccustomer', $dmsArDoccustomer)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsArDoccustomer in storage.
     *
     * @param  int              $id
     * @param UpdateDmsArDoccustomerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmsArDoccustomerRequest $request)
    {
        $dmsArDoccustomer = $this->dmsArDoccustomerRepository->find($id);

        if (empty($dmsArDoccustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArDoccustomers.singular')]));

            return redirect(route('base.dmsArDoccustomers.index'));
        }

        $dmsArDoccustomer = $this->dmsArDoccustomerRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsArDoccustomers.singular')]));

        return redirect(route('base.dmsArDoccustomers.index'));
    }

    /**
     * Remove the specified DmsArDoccustomer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsArDoccustomer = $this->dmsArDoccustomerRepository->find($id);

        if (empty($dmsArDoccustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArDoccustomers.singular')]));

            return redirect(route('base.dmsArDoccustomers.index'));
        }

        $this->dmsArDoccustomerRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsArDoccustomers.singular')]));

        return redirect(route('base.dmsArDoccustomers.index'));
    }

    /**
     * Provide options item based on relationship model DmsArDoccustomer from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        
        return [
                        
        ];
    }
}
