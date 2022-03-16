<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateJournalDmsRequest;
use App\Models\Accounting\JournalAccount;
use App\Repositories\Accounting\JournalDmsRepository;
use App\Repositories\Base\DmsSmBranchRepository;
use Flash;
use Response;

class JournalDmsController extends AppBaseController
{
    /** @var JournalDmsRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = JournalDmsRepository::class;
    }

    /**
     * Show the form for creating a new BkbValidate.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.journal_dms.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created JournalDms in storage.
     *
     * @return Response
     */
    public function store(CreateJournalDmsRequest $request)
    {
        $input = $request->all();

        $model = $this->getRepositoryObj()->create($input);

        if ($model instanceof JournalAccount) {
            Flash::success(__('messages.saved', ['model' => __('models/JournalDms.singular')]));
        } else {
            Flash::error($model);
        }

        return redirect(route('accounting.journalDms.create'));
    }

    /**
     * Provide options item based on relationship model JournalDms from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $branch = new DmsSmBranchRepository(app());

        return [
            'branchItems' => ['' => 'Pilih depo'] + $branch->pluck([], null, null, 'szId', 'szName'),
            'typeItems' => ['' => 'Pilih tipe'] + ['JBL' => 'Pembelian', 'JPK' => 'Penjualan Kredit', 'JPT' => 'Penjualan Tunai', 'JBY' => 'Beban Biaya', 'NRC' => 'Neraca'],
        ];
    }
}
