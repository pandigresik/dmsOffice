<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsArPaymenttermDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateDmsArPaymenttermRequest;
use App\Http\Requests\Base\UpdateDmsArPaymenttermRequest;
use App\Repositories\Base\DmsArPaymenttermRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmsArPaymenttermController extends AppBaseController
{
    /** @var  DmsArPaymenttermRepository */
    private $dmsArPaymenttermRepository;

    public function __construct(DmsArPaymenttermRepository $dmsArPaymenttermRepo)
    {
        $this->dmsArPaymenttermRepository = $dmsArPaymenttermRepo;
    }

    /**
     * Display a listing of the DmsArPaymentterm.
     *
     * @param DmsArPaymenttermDataTable $dmsArPaymenttermDataTable
     * @return Response
     */
    public function index(DmsArPaymenttermDataTable $dmsArPaymenttermDataTable)
    {
        return $dmsArPaymenttermDataTable->render('base.dms_ar_paymentterms.index');
    }

    /**
     * Show the form for creating a new DmsArPaymentterm.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_ar_paymentterms.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsArPaymentterm in storage.
     *
     * @param CreateDmsArPaymenttermRequest $request
     *
     * @return Response
     */
    public function store(CreateDmsArPaymenttermRequest $request)
    {
        $input = $request->all();

        $dmsArPaymentterm = $this->dmsArPaymenttermRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsArPaymentterms.singular')]));

        return redirect(route('base.dmsArPaymentterms.index'));
    }

    /**
     * Display the specified DmsArPaymentterm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsArPaymentterm = $this->dmsArPaymenttermRepository->find($id);

        if (empty($dmsArPaymentterm)) {
            Flash::error(__('models/dmsArPaymentterms.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsArPaymentterms.index'));
        }

        return view('base.dms_ar_paymentterms.show')->with('dmsArPaymentterm', $dmsArPaymentterm);
    }

    /**
     * Show the form for editing the specified DmsArPaymentterm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsArPaymentterm = $this->dmsArPaymenttermRepository->find($id);

        if (empty($dmsArPaymentterm)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArPaymentterms.singular')]));

            return redirect(route('base.dmsArPaymentterms.index'));
        }

        return view('base.dms_ar_paymentterms.edit')->with('dmsArPaymentterm', $dmsArPaymentterm)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsArPaymentterm in storage.
     *
     * @param  int              $id
     * @param UpdateDmsArPaymenttermRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmsArPaymenttermRequest $request)
    {
        $dmsArPaymentterm = $this->dmsArPaymenttermRepository->find($id);

        if (empty($dmsArPaymentterm)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArPaymentterms.singular')]));

            return redirect(route('base.dmsArPaymentterms.index'));
        }

        $dmsArPaymentterm = $this->dmsArPaymenttermRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsArPaymentterms.singular')]));

        return redirect(route('base.dmsArPaymentterms.index'));
    }

    /**
     * Remove the specified DmsArPaymentterm from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsArPaymentterm = $this->dmsArPaymenttermRepository->find($id);

        if (empty($dmsArPaymentterm)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArPaymentterms.singular')]));

            return redirect(route('base.dmsArPaymentterms.index'));
        }

        $this->dmsArPaymenttermRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsArPaymentterms.singular')]));

        return redirect(route('base.dmsArPaymentterms.index'));
    }

    /**
     * Provide options item based on relationship model DmsArPaymentterm from storage.         
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
