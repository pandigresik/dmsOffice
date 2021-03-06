<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Base\CreateCompanyAPIRequest;
use App\Http\Requests\API\Base\UpdateCompanyAPIRequest;
use App\Http\Resources\Base\CompanyResource;
use App\Models\Base\Company;
use App\Repositories\Base\CompanyRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class CompanyController.
 */
class CompanyAPIController extends AppBaseController
{
    /** @var CompanyRepository */
    protected $repository;

    public function __construct()
    {
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/companies",
     *      summary="Get a listing of the Companies.",
     *      tags={"Company"},
     *      description="Get all Companies",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Company")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $companies = $this->getRepositoryObj()->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CompanyResource::collection($companies), 'Companies retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/companies",
     *      summary="Store a newly created Company in storage",
     *      tags={"Company"},
     *      description="Store Company",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Company that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Company")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Company"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCompanyAPIRequest $request)
    {
        $input = $request->all();

        $company = $this->getRepositoryObj()->create($input);

        return $this->sendResponse(new CompanyResource($company), 'Company saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/companies/{id}",
     *      summary="Display the specified Company",
     *      tags={"Company"},
     *      description="Get Company",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Company",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Company"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Company $company */
        $company = $this->getRepositoryObj()->find($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        return $this->sendResponse(new CompanyResource($company), 'Company retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/companies/{id}",
     *      summary="Update the specified Company in storage",
     *      tags={"Company"},
     *      description="Update Company",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Company",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Company that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Company")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Company"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCompanyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Company $company */
        $company = $this->getRepositoryObj()->find($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        $company = $this->getRepositoryObj()->update($input, $id);

        return $this->sendResponse(new CompanyResource($company), 'Company updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/companies/{id}",
     *      summary="Remove the specified Company from storage",
     *      tags={"Company"},
     *      description="Delete Company",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Company",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Company $company */
        $company = $this->getRepositoryObj()->find($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        $company->delete();

        return $this->sendSuccess('Company deleted successfully');
    }
}
