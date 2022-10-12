<?php

namespace App\Repositories;

use App\Interfaces\SaleTeamInterface;
use App\Models\SaleTeam;
use Exception;
use Illuminate\Http\Request;

class SaleTeamRepository implements SaleTeamInterface
{

    public function index(Request $request)
    {
        try {
            $draw = $request->get('draw');
            $query = SaleTeam::where(function ($q) use ($request) {});
            $totalCount = $query->count();
            $data = $query->skip($request->get("start"))
                ->take($request->get("length"))->get()
                ->transform(function ($item, $key) use ($request) {
                    return [
                        "name" => $item->name,
                        "email" => $item->email,
                        "telephone" => $item->telephone,
                        "route" => $item->current_route_name,
                        "action" => $item->action(),
                    ];
                });
            return ['data' => $data, 'draw' => intval($draw), "iTotalRecords" => $totalCount, "iTotalDisplayRecords" => $totalCount];
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function store(Request $request)
    {
        try {
            $salePersonObj = new SaleTeam();
            //send object to the common save function
            $this->storeData($request, $salePersonObj);
            return ['message' => 'Sales Team Member Added Successfully'];
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    //Data save and update write as a common function
    public function storeData(Request $request, $salePersonObj)
    {
        try {
            $salePersonObj->name = $request->name;
            $salePersonObj->email = $request->email;
            $salePersonObj->telephone = $request->telephone;
            $salePersonObj->joined_date = $request->doj;
            $salePersonObj->current_route = $request->current_route;
            $salePersonObj->comment = $request->comment;
            $salePersonObj->save();
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            //edit use as a common function
            $salePersonObj = $this->edit($id);
            //send data to common save function
            $this->storeData($request, $salePersonObj);
            return ['message' => 'Sales Team Member Updated Successfully'];
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function edit($id)
    {
        try {
            return SaleTeam::find($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function delete($id)
    {
        try {
            $salePersonObj = $this->edit($id);
            $salePersonObj->delete();
            return ['message' => 'Sales Team Member Deleted Successfully'];
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
