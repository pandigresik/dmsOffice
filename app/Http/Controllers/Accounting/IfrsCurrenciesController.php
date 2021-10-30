<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\IfrsCurrenciesDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateIfrsCurrenciesRequest;
use App\Http\Requests\Accounting\UpdateIfrsCurrenciesRequest;
use App\Repositories\Accounting\IfrsCurrenciesRepository;
use App\Repositories\Accounting\IfrsEntitiesRepository;
use App\Repositories\Base\CurrenciesRepository;
use Flash;
use Response;

class IfrsCurrenciesController extends AppBaseController
{
    /** @var IfrsCurrenciesRepository */
    private $ifrsCurrenciesRepository;

    public function __construct(IfrsCurrenciesRepository $ifrsCurrenciesRepo)
    {
        $this->ifrsCurrenciesRepository = $ifrsCurrenciesRepo;
    }

    /**
     * Display a listing of the IfrsCurrencies.
     *
     * @return Response
     */
    public function index(IfrsCurrenciesDataTable $ifrsCurrenciesDataTable)
    {
        return $ifrsCurrenciesDataTable->render('accounting.ifrs_currencies.index');
    }

    /**
     * Show the form for creating a new IfrsCurrencies.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.ifrs_currencies.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created IfrsCurrencies in storage.
     *
     * @return Response
     */
    public function store(CreateIfrsCurrenciesRequest $request)
    {
        $input = $request->all();

        $ifrsCurrencies = $this->ifrsCurrenciesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ifrsCurrencies.singular')]));

        return redirect(route('accounting.ifrsCurrencies.index'));
    }

    /**
     * Display the specified IfrsCurrencies.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ifrsCurrencies = $this->ifrsCurrenciesRepository->find($id);

        if (empty($ifrsCurrencies)) {
            Flash::error(__('models/ifrsCurrencies.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.ifrsCurrencies.index'));
        }

        return view('accounting.ifrs_currencies.show')->with('ifrsCurrencies', $ifrsCurrencies);
    }

    /**
     * Show the form for editing the specified IfrsCurrencies.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ifrsCurrencies = $this->ifrsCurrenciesRepository->find($id);

        if (empty($ifrsCurrencies)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsCurrencies.singular')]));

            return redirect(route('accounting.ifrsCurrencies.index'));
        }

        return view('accounting.ifrs_currencies.edit')->with('ifrsCurrencies', $ifrsCurrencies)->with($this->getOptionItems());
    }

    /**
     * Update the specified IfrsCurrencies in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateIfrsCurrenciesRequest $request)
    {
        $ifrsCurrencies = $this->ifrsCurrenciesRepository->find($id);

        if (empty($ifrsCurrencies)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsCurrencies.singular')]));

            return redirect(route('accounting.ifrsCurrencies.index'));
        }

        $ifrsCurrencies = $this->ifrsCurrenciesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ifrsCurrencies.singular')]));

        return redirect(route('accounting.ifrsCurrencies.index'));
    }

    /**
     * Remove the specified IfrsCurrencies from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ifrsCurrencies = $this->ifrsCurrenciesRepository->find($id);

        if (empty($ifrsCurrencies)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsCurrencies.singular')]));

            return redirect(route('accounting.ifrsCurrencies.index'));
        }

        $this->ifrsCurrenciesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ifrsCurrencies.singular')]));

        return redirect(route('accounting.ifrsCurrencies.index'));
    }

    /**
     * Provide options item based on relationship model IfrsCurrencies from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $ifrsEntity = new IfrsEntitiesRepository(app());
        $currency = new CurrenciesRepository(app());

        return [
            'entityItems' => ['' => __('crud.option.ifrsEntity_placeholder')] + $ifrsEntity->pluck(),
            'currencyItems' => ['' => __('crud.option.ifrsEntity_placeholder')] + $currency->pluck(),
        ];
    }
}
