<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\BtbViewTmpDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateBtbViewTmpRequest;
use App\Http\Requests\Inventory\UpdateBtbViewTmpRequest;
use App\Repositories\Inventory\BtbViewTmpRepository;
use Flash;
use Response;

class BtbViewTmpController extends AppBaseController
{
    /** @var BtbViewTmpRepository */
    private $btbViewTmpRepository;

    public function __construct(BtbViewTmpRepository $btbViewTmpRepo)
    {
        $this->btbViewTmpRepository = $btbViewTmpRepo;
    }

    /**
     * Display a listing of the BtbViewTmp.
     *
     * @return Response
     */
    public function index(BtbViewTmpDataTable $btbViewTmpDataTable)
    {
        return $btbViewTmpDataTable->render('inventory.btb_view_tmps.index');
    }

    /**
     * Show the form for creating a new BtbViewTmp.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.btb_view_tmps.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created BtbViewTmp in storage.
     *
     * @return Response
     */
    public function store(CreateBtbViewTmpRequest $request)
    {
        $input = $request->all();

        $btbViewTmp = $this->btbViewTmpRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/btbViewTmps.singular')]));

        return redirect(route('inventory.btbViewTmps.index'));
    }

    /**
     * Display the specified BtbViewTmp.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $btbViewTmp = $this->btbViewTmpRepository->find($id);

        if (empty($btbViewTmp)) {
            Flash::error(__('models/btbViewTmps.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.btbViewTmps.index'));
        }

        return view('inventory.btb_view_tmps.show')->with('btbViewTmp', $btbViewTmp);
    }

    /**
     * Show the form for editing the specified BtbViewTmp.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $btbViewTmp = $this->btbViewTmpRepository->find($id);

        if (empty($btbViewTmp)) {
            Flash::error(__('messages.not_found', ['model' => __('models/btbViewTmps.singular')]));

            return redirect(route('inventory.btbViewTmps.index'));
        }

        return view('inventory.btb_view_tmps.edit')->with('btbViewTmp', $btbViewTmp)->with($this->getOptionItems());
    }

    /**
     * Update the specified BtbViewTmp in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateBtbViewTmpRequest $request)
    {
        $btbViewTmp = $this->btbViewTmpRepository->find($id);

        if (empty($btbViewTmp)) {
            Flash::error(__('messages.not_found', ['model' => __('models/btbViewTmps.singular')]));

            return redirect(route('inventory.btbViewTmps.index'));
        }

        $btbViewTmp = $this->btbViewTmpRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/btbViewTmps.singular')]));

        return redirect(route('inventory.btbViewTmps.index'));
    }

    /**
     * Remove the specified BtbViewTmp from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $btbViewTmp = $this->btbViewTmpRepository->find($id);

        if (empty($btbViewTmp)) {
            Flash::error(__('messages.not_found', ['model' => __('models/btbViewTmps.singular')]));

            return redirect(route('inventory.btbViewTmps.index'));
        }

        $this->btbViewTmpRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/btbViewTmps.singular')]));

        return redirect(route('inventory.btbViewTmps.index'));
    }

    /**
     * Provide options item based on relationship model BtbViewTmp from storage.
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
