<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class CustomersExport implements FromView
{
    use Exportable;

    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {        
        $this->collection = $collection;
    }

    /**
     * @return View
     */
    public function view(): View{        
        return view('exports.customers', [
            'customers' => $this->collection
        ]);
    }
}
