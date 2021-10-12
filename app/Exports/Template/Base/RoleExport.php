<?php

namespace App\Exports\Template\Base;

use App\Models\Base\Role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
class RoleExport implements FromCollection,WithHeadings,ShouldAutoSize,WithMapping
{
    use Exportable;
    private $isTemplate = FALSE;
    public function __construct(bool $isTemplate = FALSE)
    {
        $this->isTemplate = $isTemplate;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->isTemplate){
            return Role::limit(1)->get();
        }else{
            return Role::all();
        }
    }

    /**
    * @var Invoice $invoice
    */
    public function map($item): array
    {
        return [
            $item->name,
            $item->display_name,
            $item->description
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'name',
            'display_name',
            'description'
        ];
    }
}
