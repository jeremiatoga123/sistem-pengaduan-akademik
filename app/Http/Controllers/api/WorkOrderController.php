<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function getWorkOrders(Request $request)
    {
            $start_date = $request->get('date').' 00:00:00';
            $end_date = $request->get('date').' 23:59:59';

            if ($request->get('daterange') == 'month') {
                $start_date = date("Y-m-01 H:i:s", strtotime($request->get('date').' 00:00:00'));
                $end_date = date("Y-m-t H:i:s", strtotime($request->get('date').' 23:59:59'));
            } elseif ($request->get('daterange') == 'year') {
                $start_date = date("Y-01-01 H:i:s", strtotime($request->get('date').'-01-01 00:00:00'));
                $end_date = date("Y-12-t H:i:s", strtotime($request->get('date').'-12-31 23:59:59'));
            }

            $data['work_orders'] = WorkOrder::orderBy('id', 'desc')->whereBetween('date_generate', [$start_date, $end_date])->with(['asset', 'workOrderStatus', 'maintenanceType', 'scheduleMaintenance'])->get();
            
            return response()->json([
                'success' => true,
                'message' => 'Show work orders',
                'data' => $data['work_orders'],
            ], 200);
    }
}
