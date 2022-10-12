<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Interfaces\SaleTeamInterface;
use App\Utils\Constant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SalesTeamController extends Controller
{

    private SaleTeamInterface $saleTeamInterface;

    public function __construct(SaleTeamInterface $saleTeamInterface)
    {
        $this->saleTeamInterface = $saleTeamInterface;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $currentRoutes = Constant::$currentRoutes;
        return view('content.sales.create', compact('currentRoutes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return redirect('sales-team')->with($this->saleTeamInterface->store($request));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return redirect('sales-team')->with($this->saleTeamInterface->update($request, $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        return redirect('sales-team')->with($this->saleTeamInterface->delete($id));
    }

    //email validation for create and update
    public function isEmailUnique(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'unique:sale_teams,email,' . $request->id
        ]);
        if ($validator->fails()) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    //get data for datatable
    public function getSalesTeamData(Request $request)
    {
        return response()->json($this->saleTeamInterface->index($request));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $currentRoutes = Constant::$currentRoutes;
        return view('content.sales.index', compact('currentRoutes'));
    }

    public function getSelectedSalePersonData(Request $request)
    {
        return response()->json($this->saleTeamInterface->edit($request->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $teamData = $this->saleTeamInterface->edit($id);
        $currentRoutes = Constant::$currentRoutes;
        return view('content.sales.create', compact('currentRoutes', 'teamData'));
    }
}
