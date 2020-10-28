<?php

namespace Modules\Cabytrim\Http\ApiControllers;

use App\Http\Controllers\BaseAPIController;
use Modules\Cabytrim\Repositories\CabytrimRepository;
use Modules\Cabytrim\Http\Requests\CabytrimRequest;
use Modules\Cabytrim\Http\Requests\CreateCabytrimRequest;
use Modules\Cabytrim\Http\Requests\UpdateCabytrimRequest;

class CabytrimApiController extends BaseAPIController
{
    protected $CabytrimRepo;
    protected $entityType = 'cabytrim';

    public function __construct(CabytrimRepository $cabytrimRepo)
    {
        parent::__construct();

        $this->cabytrimRepo = $cabytrimRepo;
    }

    /**
     * @SWG\Get(
     *   path="/cabytrim",
     *   summary="List cabytrim",
     *   operationId="listCabytrims",
     *   tags={"cabytrim"},
     *   @SWG\Response(
     *     response=200,
     *     description="A list of cabytrim",
     *      @SWG\Schema(type="array", @SWG\Items(ref="#/definitions/Cabytrim"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function index()
    {
        $data = $this->cabytrimRepo->all();

        return $this->listResponse($data);
    }

    /**
     * @SWG\Get(
     *   path="/cabytrim/{cabytrim_id}",
     *   summary="Individual Cabytrim",
     *   operationId="getCabytrim",
     *   tags={"cabytrim"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="cabytrim_id",
     *     type="integer",
     *     required=true
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="A single cabytrim",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Cabytrim"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function show(CabytrimRequest $request)
    {
        return $this->itemResponse($request->entity());
    }




    /**
     * @SWG\Post(
     *   path="/cabytrim",
     *   summary="Create a cabytrim",
     *   operationId="createCabytrim",
     *   tags={"cabytrim"},
     *   @SWG\Parameter(
     *     in="body",
     *     name="cabytrim",
     *     @SWG\Schema(ref="#/definitions/Cabytrim")
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="New cabytrim",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Cabytrim"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function store(CreateCabytrimRequest $request)
    {
        $cabytrim = $this->cabytrimRepo->save($request->input());

        return $this->itemResponse($cabytrim);
    }

    /**
     * @SWG\Put(
     *   path="/cabytrim/{cabytrim_id}",
     *   summary="Update a cabytrim",
     *   operationId="updateCabytrim",
     *   tags={"cabytrim"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="cabytrim_id",
     *     type="integer",
     *     required=true
     *   ),
     *   @SWG\Parameter(
     *     in="body",
     *     name="cabytrim",
     *     @SWG\Schema(ref="#/definitions/Cabytrim")
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="Updated cabytrim",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Cabytrim"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function update(UpdateCabytrimRequest $request, $publicId)
    {
        if ($request->action) {
            return $this->handleAction($request);
        }

        $cabytrim = $this->cabytrimRepo->save($request->input(), $request->entity());

        return $this->itemResponse($cabytrim);
    }


    /**
     * @SWG\Delete(
     *   path="/cabytrim/{cabytrim_id}",
     *   summary="Delete a cabytrim",
     *   operationId="deleteCabytrim",
     *   tags={"cabytrim"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="cabytrim_id",
     *     type="integer",
     *     required=true
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="Deleted cabytrim",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Cabytrim"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function destroy(UpdateCabytrimRequest $request)
    {
        $cabytrim = $request->entity();

        $this->cabytrimRepo->delete($cabytrim);

        return $this->itemResponse($cabytrim);
    }

}
