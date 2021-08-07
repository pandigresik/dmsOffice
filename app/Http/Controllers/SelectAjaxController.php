<?php

namespace App\Http\Controllers;

use Response;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\DataTables\CustomersDataTable;
use App\Http\Controllers\AppBaseController;

class SelectAjaxController extends AppBaseController
{
    private $request;
    private $repository;
    public function __construct(Request $request)
    {                
        $this->request = $request;
    }

    /**
     * Display a listing of the Customers.
     *
     * @param CustomersDataTable $customersDataTable
     * @return Response
     */
    public function index()
    {
        $repository = 'App\Repositories\\'.$this->request->get('repository');        
        $this->repository = app()->make($repository);        
        return $this->searchPaging();
        
    }

    private function searchPaging()
    {   
        $lookupColumn = $this->repository->getLookupColumnSelect();
        $q = $this->request->get('q');
        $currentPage = $this->request->get('page') || 1;
        $limit = $this->request->get('limit') ?? 10;                
        $data = $this->repository->paginate($limit, $currentPage, [$lookupColumn['id'],$lookupColumn['text'].' as text'],['keyword' => $q, 'column' => ['name']] );
                       
        return new JsonResponse($data);
    }    
}
