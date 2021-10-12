<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\IfrsExchangeRatesDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateIfrsExchangeRatesRequest;
use App\Http\Requests\Accounting\UpdateIfrsExchangeRatesRequest;
use App\Repositories\Accounting\IfrsCurrenciesRepository;
use App\Repositories\Accounting\IfrsEntitiesRepository;
use App\Repositories\Accounting\IfrsExchangeRatesRepository;
use Flash;
use Response;

class IfrsExchangeRatesController extends AppBaseController
{
    /** @var IfrsExchangeRatesRepository */
    private $ifrsExchangeRatesRepository;

    public function __construct(IfrsExchangeRatesRepository $ifrsExchangeRatesRepo)
    {
        $this->ifrsExchangeRatesRepository = $ifrsExchangeRatesRepo;
    }

    /**
     * Display a listing of the IfrsExchangeRates.
     *
     * @return Response
     */
    public function index(IfrsExchangeRatesDataTable $ifrsExchangeRatesDataTable)
    {
        return $ifrsExchangeRatesDataTable->render('accounting.ifrs_exchange_rates.index');
    }

    /**
     * Show the form for creating a new IfrsExchangeRates.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.ifrs_exchange_rates.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created IfrsExchangeRates in storage.
     *
     * @return Response
     */
    public function store(CreateIfrsExchangeRatesRequest $request)
    {
        $input = $request->all();

        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ifrsExchangeRates.singular')]));

        return redirect(route('accounting.ifrsExchangeRates.index'));
    }

    /**
     * Display the specified IfrsExchangeRates.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->find($id);

        if (empty($ifrsExchangeRates)) {
            Flash::error(__('models/ifrsExchangeRates.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.ifrsExchangeRates.index'));
        }

        return view('accounting.ifrs_exchange_rates.show')->with('ifrsExchangeRates', $ifrsExchangeRates);
    }

    /**
     * Show the form for editing the specified IfrsExchangeRates.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->find($id);

        if (empty($ifrsExchangeRates)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsExchangeRates.singular')]));

            return redirect(route('accounting.ifrsExchangeRates.index'));
        }

        return view('accounting.ifrs_exchange_rates.edit')->with('ifrsExchangeRates', $ifrsExchangeRates)->with($this->getOptionItems());
    }

    /**
     * Update the specified IfrsExchangeRates in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateIfrsExchangeRatesRequest $request)
    {
        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->find($id);

        if (empty($ifrsExchangeRates)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsExchangeRates.singular')]));

            return redirect(route('accounting.ifrsExchangeRates.index'));
        }

        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ifrsExchangeRates.singular')]));

        return redirect(route('accounting.ifrsExchangeRates.index'));
    }

    /**
     * Remove the specified IfrsExchangeRates from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->find($id);

        if (empty($ifrsExchangeRates)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsExchangeRates.singular')]));

            return redirect(route('accounting.ifrsExchangeRates.index'));
        }

        $this->ifrsExchangeRatesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ifrsExchangeRates.singular')]));

        return redirect(route('accounting.ifrsExchangeRates.index'));
    }

    /**
     * Provide options item based on relationship model IfrsExchangeRates from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $ifrsCurrency = new IfrsCurrenciesRepository(app());
        $ifrsEntity = new IfrsEntitiesRepository(app());

        return [
            'ifrsCurrencyItems' => ['' => __('crud.option.ifrsCurrency_placeholder')] + $ifrsCurrency->pluck(),
            'entityItems' => ['' => __('crud.option.ifrsEntity_placeholder')] + $ifrsEntity->pluck(),
        ];
    }
}
