<?php

namespace App\Repositories\Finance;

use App\Models\Finance\DebitCreditNote;
use App\Repositories\BaseRepository;

/**
 * Class DebitCreditNoteRepository
 * @package App\Repositories\Finance
 * @version December 6, 2021, 9:29 pm WIB
*/

class DebitCreditNoteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number',
        'type',
        'partner_type',
        'partner_id',
        'issue_date',
        'reference',
        'invoice_id',
        'description'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DebitCreditNote::class;
    }

    /**
     * Create model record.
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);        
        $model->number = $model->getNextNumber($input['type']);        
        $model->save();        

        return $model;
    }
}
