<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\IfrsVatsDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateIfrsVatsRequest;
use App\Http\Requests\Accounting\UpdateIfrsVatsRequest;
use App\Repositories\Accounting\IfrsAccountsRepository;
use App\Repositories\Accounting\IfrsEntitiesRepository;
use App\Repositories\Accounting\IfrsVatsRepository;
use Flash;
use IFRS\Models\Account;
use Response;

class IfrsVatsController extends AppBaseController
{
    /** @var IfrsVatsRepository */
    private $ifrsVatsRepository;

    public function __construct(IfrsVatsRepository $ifrsVatsRepo)
    {
        $this->ifrsVatsRepository = $ifrsVatsRepo;
    }

    /**
     * Display a listing of the IfrsVats.
     *
     * @return Response
     */
    public function index(IfrsVatsDataTable $ifrsVatsDataTable)
    {
        return $ifrsVatsDataTable->render('accounting.ifrs_vats.index');
    }

    /**
     * Show the form for creating a new IfrsVats.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.ifrs_vats.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created IfrsVats in storage.
     *
     * @return Response
     */
    public function store(CreateIfrsVatsRequest $request)
    {
        $input = $request->all();

        $ifrsVats = $this->ifrsVatsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ifrsVats.singular')]));

        return redirect(route('accounting.ifrsVats.index'));
    }

    /**
     * Display the specified IfrsVats.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ifrsVats = $this->ifrsVatsRepository->find($id);

        if (empty($ifrsVats)) {
            Flash::error(__('models/ifrsVats.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.ifrsVats.index'));
        }

        return view('accounting.ifrs_vats.show')->with('ifrsVats', $ifrsVats);
    }

    /**
     * Show the form for editing the specified IfrsVats.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ifrsVats = $this->ifrsVatsRepository->find($id);

        if (empty($ifrsVats)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsVats.singular')]));

            return redirect(route('accounting.ifrsVats.index'));
        }

        return view('accounting.ifrs_vats.edit')->with('ifrsVats', $ifrsVats)->with($this->getOptionItems());
    }

    /**
     * Update the specified IfrsVats in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateIfrsVatsRequest $request)
    {
        $ifrsVats = $this->ifrsVatsRepository->find($id);

        if (empty($ifrsVats)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsVats.singular')]));

            return redirect(route('accounting.ifrsVats.index'));
        }

        $ifrsVats = $this->ifrsVatsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ifrsVats.singular')]));

        return redirect(route('accounting.ifrsVats.index'));
    }

    /**
     * Remove the specified IfrsVats from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ifrsVats = $this->ifrsVatsRepository->find($id);

        if (empty($ifrsVats)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsVats.singular')]));

            return redirect(route('accounting.ifrsVats.index'));
        }

        $this->ifrsVatsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ifrsVats.singular')]));

        return redirect(route('accounting.ifrsVats.index'));
    }

    /**
     * Provide options item based on relationship model IfrsVats from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $ifrsAccount = new IfrsAccountsRepository(app());
        $ifrsEntity = new IfrsEntitiesRepository(app());

        return [
            'accountItems' => ['' => __('crud.option.ifrsAccount_placeholder')] + $ifrsAccount->pluck(['account_type' => Account::CONTROL]),
            'entityItems' => ['' => __('crud.option.ifrsEntity_placeholder')] + $ifrsEntity->pluck(),
        ];
    }
}
