<?php

namespace App\Http\Controllers;

use App\SiteMap;
use App\Stats;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ProcessController
 * @package App\Http\Controllers
 */
class ProcessController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        ini_set('max_execution_time', 0);
        $start_time = microtime(TRUE);
        $request->validate([
            'file' => 'required|file'
        ]);
        $extensions = array("xls","xlsx","xlm","xla","xlc","xlt","xlw","csv");

        $result = array($request->file('file')->getClientOriginalExtension());
        $fileSize = $request->file('file')->getSize();

        if(! in_array($result[0],$extensions)){
            return redirect()->back()->withErrors(['File type is invalid. ']);
        }

        $type = $request->input('type');
        $sortedData = [];
        $excelFile = Excel::load($request->file('file')->getRealPath(), function ($reader) use ($type, $sortedData, $request, $fileSize, $start_time) {
            $originalData = $reader->toArray();
            $newData = [];
            foreach ($originalData as $key => $row) {
                $status = get_array_key_null('status', $row);
                if ($status == 'denied' || $status == 'Denied' || $status == 'Pending' )
                {
                    continue;
                }

                // update title
                $name = get_array_key_null('name', $row);
                $subject = get_array_key_null('subject', $row);
                $item_title = get_array_key_null('item_title', $row);
                $description = '';
                if ($name != null && $name != '')
                {
                    if ($name != 'PayPal'){
                        $description .= $name;
                    }
                }
                if ($subject != null && $subject != '')
                {
                    if ($description != '') {
                        $description .= ' - ' . $subject;
                    } else {
                        $description .= $subject;
                    }

                }
                if ($item_title != null && $item_title != '')
                {
                    if ($description != '') {
                        $description .= ' - ' . $item_title;
                    } else {
                        $description .= $item_title;
                    }

                }
                if (get_array_key_null('type', $row) == 'Reversal of General Account Hold')
                {
                    continue;
                }
                switch (get_array_key_null('type', $row))
                {
                    case 'Debit Card Cash Back Bonus':
                        $description = 'Debit Card Cash Back Bonus';
                        break;
                    case 'Buyer Credit Payment Withdrawal - Transfer To BML':
                        $description = 'Payment toward loan from Bill Me Later';
                        break;
                    case 'Bank Deposit to PP Account (Obselete)':
                        $description = 'Loan from PayPals Bill Me Later';
                        break;
                    case 'BML Credit - Transfer from BML':
                        $description = 'Loan from PayPals Bill Me Later';
                        break;
                    case 'Payment Reversal':
                        $description = 'PayPal Payment Reversal';
                        break;
                    case 'Reversal of ACH Deposit':
                        $description = 'Reversal of ACH Deposit';
                        break;
                    case 'General Payment':
                        $description = 'Payment to '. $description;
                        break;
                    case 'Other':
                        $description = 'Unknown';
                        break;
                }

                if ($description != '') {
                    $row['description'] = $description;
                }

                $row['transaction_date'] = get_array_key_null('date', $row);
                $row['cleared_date'] = get_array_key_null('date', $row);
                unset($row['time']);
                if (get_array_key_null('reference_txn_id', $row) == null || get_array_key_null('reference_txn_id', $row) == '')
                {
                    $newData[] = $row;
                } else {
                    // search for this id on previous array and update it
//                    $newData[] = $row;
                    foreach ($newData as $key => $oldRow) {
                        if ($oldRow['transaction_id'] == get_array_key_null('reference_txn_id', $row)) {
                            $newData[$key]['status'] = $status;
                            $newData[$key]['date'] = get_array_key_null('date', $row);
                            $newData[$key]['cleared_date'] = get_array_key_null('date', $row);
//                            $newData[$key]['description'] = get_array_key_null('description', $row);
                        }
                    }

                }



            }

            foreach ($newData as $key => $data)
            {
                $sortedData[$key]['status'] = get_array_key_null('status', $data);
                $sortedData[$key]['transaction_date'] = get_array_key_null('transaction_date', $data)
                    ? Carbon::parse(get_array_key_null('transaction_date', $data))->format('Y-m-d') : '';
                $sortedData[$key]['cleared_date'] = get_array_key_null('cleared_date', $data)
                    ? Carbon::parse(get_array_key_null('cleared_date', $data))->format('Y-m-d') : '';
                $sortedData[$key]['description'] = get_array_key_null('description', $data);
                $sortedData[$key]['gross'] = get_array_key_null('gross', $data) ?? get_array_key_null('amount', $data);
            }

            $end_time = microtime(TRUE);
            $timeUsed = $end_time - $start_time;
            Stats::create([
                'ip' => $request->server('REMOTE_ADDR'),
                'user_agent' => $request->server('HTTP_USER_AGENT'),
                'download_format' => $type,
                'uploaded_size' => $fileSize,
                'time_used' => $timeUsed
            ]);

            $newFileName = 'PayPal-proceed-import-'.date('Y-m-d');
            Excel::create($newFileName, function($excel) use ($sortedData) {

                $excel->sheet('PayPal Import', function($sheet) use ($sortedData)
                {
                    $sheet->fromArray($sortedData);
                });

            })->download($type);
        });
        return redirect()->back()->with('message', 'Success');
    }


}

