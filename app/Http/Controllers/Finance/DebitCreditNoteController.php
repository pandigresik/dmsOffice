<?php

namespace App\Http\Controllers\Finance;

use App\DataTables\Finance\DebitCreditNoteDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Finance\CreateDebitCreditNoteRequest;
use App\Http\Requests\Finance\UpdateDebitCreditNoteRequest;
use App\Models\Finance\DebitCreditNote;
use App\Models\Purchase\Invoice;
use App\Repositories\Finance\DebitCreditNoteRepository;
use App\Repositories\Purchase\InvoiceRepository;
use Flash;
use Response;

class DebitCreditNoteController extends AppBaseController
{
    /** @var DebitCreditNoteRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DebitCreditNoteRepository::class;
    }

    /**
     * Display a listing of the DebitCreditNote.
     *
     * @return Response
     */
    public function index(DebitCreditNoteDataTable $debitCreditNoteDataTable)
    {
        return $debitCreditNoteDataTable->render('finance.debit_credit_notes.index');
    }

    /**
     * Show the form for creating a new DebitCreditNote.
     *
     * @return Response
     */
    public function create()
    {
        return view('finance.debit_credit_notes.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DebitCreditNote in storage.
     *
     * @return Response
     */
    public function store(CreateDebitCreditNoteRequest $request)
    {
        $input = $request->all();

        $debitCreditNote = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/debitCreditNotes.singular')]));

        return redirect(route('finance.debitCreditNotes.index'));
    }

    /**
     * Display the specified DebitCreditNote.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $debitCreditNote = $this->getRepositoryObj()->find($id);

        if (empty($debitCreditNote)) {
            Flash::error(__('models/debitCreditNotes.singular').' '.__('messages.not_found'));

            return redirect(route('finance.debitCreditNotes.index'));
        }

        return view('finance.debit_credit_notes.show')->with('debitCreditNote', $debitCreditNote);
    }

    /**
     * Show the form for editing the specified DebitCreditNote.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $debitCreditNote = $this->getRepositoryObj()->find($id);

        if (empty($debitCreditNote)) {
            Flash::error(__('messages.not_found', ['model' => __('models/debitCreditNotes.singular')]));

            return redirect(route('finance.debitCreditNotes.index'));
        }

        return view('finance.debit_credit_notes.edit')->with('debitCreditNote', $debitCreditNote)->with($this->getOptionItems());
    }

    /**
     * Update the specified DebitCreditNote in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDebitCreditNoteRequest $request)
    {
        $debitCreditNote = $this->getRepositoryObj()->find($id);

        if (empty($debitCreditNote)) {
            Flash::error(__('messages.not_found', ['model' => __('models/debitCreditNotes.singular')]));

            return redirect(route('finance.debitCreditNotes.index'));
        }

        $debitCreditNote = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/debitCreditNotes.singular')]));

        return redirect(route('finance.debitCreditNotes.index'));
    }

    /**
     * Remove the specified DebitCreditNote from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $debitCreditNote = $this->getRepositoryObj()->find($id);

        if (empty($debitCreditNote)) {
            Flash::error(__('messages.not_found', ['model' => __('models/debitCreditNotes.singular')]));

            return redirect(route('finance.debitCreditNotes.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/debitCreditNotes.singular')]));

        return redirect(route('finance.debitCreditNotes.index'));
    }

    /**
     * Provide options item based on relationship model DebitCreditNote from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $invoice = new InvoiceRepository(app());
        $invoiceData = $invoice->with(['partner', 'ekspedisi'])->all(['state' => Invoice::VALIDATE], null, null, ['id', 'number', 'reference', 'partner_id', 'partner_type']);
        $invoiceItemOptions = $invoiceData->keyBy('id')->toArray();

        return [
            'invoiceItems' => ['' => __('crud.option.invoice_placeholder')] + $invoiceData->pluck('full_identity', 'id')->toArray(),
            'invoiceItemOptions' => $invoiceItemOptions,
            'partnerTypeItems' => array_merge(['' => __('crud.option.invoice_placeholder')], DebitCreditNote::PARTNER_TYPE),
            'typeItems' => ['' => __('crud.option.invoice_placeholder'), 'CN' => 'CN', 'DN' => 'DN'],
        ];
    }
}
