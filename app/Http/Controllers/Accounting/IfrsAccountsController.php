<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\IfrsAccountsDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateIfrsAccountsRequest;
use App\Http\Requests\Accounting\UpdateIfrsAccountsRequest;
use App\Repositories\Accounting\IfrsAccountsRepository;
use App\Repositories\Accounting\IfrsCategoriesRepository;
use App\Repositories\Accounting\IfrsCurrenciesRepository;
use App\Repositories\Accounting\IfrsEntitiesRepository;
use Flash;
use Response;

class IfrsAccountsController extends AppBaseController
{
    /** @var IfrsAccountsRepository */
    private $ifrsAccountsRepository;

    public function __construct(IfrsAccountsRepository $ifrsAccountsRepo)
    {
        $this->ifrsAccountsRepository = $ifrsAccountsRepo;
    }

    /**
     * Display a listing of the IfrsAccounts.
     *
     * @return Response
     */
    public function index(IfrsAccountsDataTable $ifrsAccountsDataTable)
    {
        return $ifrsAccountsDataTable->render('accounting.ifrs_accounts.index');
    }

    /**
     * Show the form for creating a new IfrsAccounts.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.ifrs_accounts.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created IfrsAccounts in storage.
     *
     * @return Response
     */
    public function store(CreateIfrsAccountsRequest $request)
    {
        $input = $request->all();

        $ifrsAccounts = $this->ifrsAccountsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ifrsAccounts.singular')]));

        return redirect(route('accounting.ifrsAccounts.index'));
    }

    /**
     * Display the specified IfrsAccounts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ifrsAccounts = $this->ifrsAccountsRepository->find($id);

        if (empty($ifrsAccounts)) {
            Flash::error(__('models/ifrsAccounts.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.ifrsAccounts.index'));
        }

        return view('accounting.ifrs_accounts.show')->with('ifrsAccounts', $ifrsAccounts);
    }

    /**
     * Show the form for editing the specified IfrsAccounts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ifrsAccounts = $this->ifrsAccountsRepository->find($id);

        if (empty($ifrsAccounts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsAccounts.singular')]));

            return redirect(route('accounting.ifrsAccounts.index'));
        }

        return view('accounting.ifrs_accounts.edit')->with('ifrsAccounts', $ifrsAccounts)->with($this->getOptionItems());
    }

    /**
     * Update the specified IfrsAccounts in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateIfrsAccountsRequest $request)
    {
        $ifrsAccounts = $this->ifrsAccountsRepository->find($id);

        if (empty($ifrsAccounts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsAccounts.singular')]));

            return redirect(route('accounting.ifrsAccounts.index'));
        }

        $ifrsAccounts = $this->ifrsAccountsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ifrsAccounts.singular')]));

        return redirect(route('accounting.ifrsAccounts.index'));
    }

    /**
     * Remove the specified IfrsAccounts from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ifrsAccounts = $this->ifrsAccountsRepository->find($id);

        if (empty($ifrsAccounts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsAccounts.singular')]));

            return redirect(route('accounting.ifrsAccounts.index'));
        }

        $this->ifrsAccountsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ifrsAccounts.singular')]));

        return redirect(route('accounting.ifrsAccounts.index'));
    }

    /**
     * Provide options item based on relationship model IfrsAccounts from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $ifrsCategory = new IfrsCategoriesRepository(app());
        $ifrsCurrency = new IfrsCurrenciesRepository(app());
        $ifrsEntity = new IfrsEntitiesRepository(app());
        $listTypes = config('ifrs')['accounts'];
        return [
            'categoryItems' => ['' => __('crud.option.ifrsCategory_placeholder')] + $ifrsCategory->pluck(),
            'currencyItems' => ['' => __('crud.option.ifrsCurrency_placeholder')] + $ifrsCurrency->pluck(),
            'entityItems' => ['' => __('crud.option.ifrsEntity_placeholder')] + $ifrsEntity->pluck(),
            'typeItems' => ['' => __('crud.option.ifrsEntity_placeholder')] + $listTypes,
        ];
    }
}
