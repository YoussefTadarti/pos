<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeasurieRequest;
use App\Models\Admin;
use App\Models\Treasurie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeasurieController extends Controller
{
    public function index()
    {
        $data = Treasurie::select('*')->orderBy('id', 'desc')->paginate(PAGINATION_COUNT);


        return view('admin.treasuries.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.treasuries.create');
    }

    public function store(TeasurieRequest $req)
    {
        try {
            // check data
            $com_code = auth()->user()->com_code;
            $name = Treasurie::where('name', $req->name)->where('com_code', $com_code)->get();
            $company_principal = Treasurie::where('is_master', 1)->where('com_code', $com_code)->get();

            if ($name->count() === 0) {
                $data['name'] = $req->name;

                if ($company_principal->count()) {
                    if ($req->is_master === "1") {
                        return  redirect()->back()->with(['error' => 'عفوا هناك خزانة رئيسية بالفعل'])->withInput();
                    }
                }
                $data['is_master'] = $req->is_master;
                $data['last_exchange'] = $req->last_exchange;
                $data['last_collect'] = $req->last_collect;
                $data['com_code'] = auth()->user()->com_code;
                $data['active'] = $req->active;
                $data['date'] = date('Y-m-d');
                $data['added_by'] = auth()->id();
                $data['created_at'] = date('Y-m-d H:i:s');
                Treasurie::create($data);
            } else {
                return  redirect()->back()->with(['error' => 'عفواً هذا الإسم موجد'])->withInput();
            }




            return  redirect()->route('admin.treasuries')->with(['success' => "تم إظافة الخزانة بنجاح"]);
        } catch (\Exception $exception) {
            return  redirect()->route('admin.treasuries.create')->with(['error' => 'عفوا حدث خطأ ما' . $exception->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = Treasurie::where('id', $id)->first();

        return view('admin.treasuries.edit', ['data' => $data]);
    }

    public function update($id, TeasurieRequest $req)
    {
        try {
            // check data
            $com_code = auth()->user()->com_code;
            $name = Treasurie::where('name', $req->name)->where('com_code', $com_code)->where('id', '!=', $id)->get();
            $treasurie_principal = Treasurie::where('is_master', 1)->where('com_code', $com_code)->where('id', '!=', $id)->get();

            if ($name->count() === 0) {
                $data['name'] = $req->name;

                if ($treasurie_principal->count()) {
                    if ($req->is_master === "1") {
                        return  redirect()->back()->with(['error' => 'عفوا هناك خزانة رئيسية بالفعل'])->withInput();
                    }
                }
                $data['is_master'] = $req->is_master;
                $data['last_exchange'] = $req->last_exchange;
                $data['last_collect'] = $req->last_collect;
                $data['active'] = $req->active;
                $data['updated_by'] = auth()->id();
                $data['updated_at'] = date('Y-m-d H:i:s');
                Treasurie::where('com_code', $com_code)->where('id', $id)->update($data);
            } else {
                return  redirect()->back()->with(['error' => 'عفواً هذا الإسم موجد'])->withInput();
            }

            return  redirect()->route('admin.treasuries')->with(['success' => "تم تعديل الخزانة بنجاح"]);
        } catch (\Exception $exception) {
            return  redirect()->route('admin.treasuries.create')->with(['error' => 'عفوا حدث خطأ ما']);
        }
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query != '') {
                $data = DB::table('treasuries')
                    ->where('name', 'LIKE', "%" . $query . "%")
                    ->orderBy('id', 'desc')
                    ->get();
            } else {
                $data = DB::table('treasuries')
                    ->orderBy('id', 'desc')
                    ->get();
            }

            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= `<tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>`;
                }
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }
    public function ajax_search(Request $request)
    {

        if ($request->ajax()) {
            $search_by_name = $request->search_by_name;
            $data = Treasurie::where('name', 'LIKE', "%{$search_by_name}%")->orderBy('id', 'desc')->paginate(PAGINATION_COUNT);
            return view('admin.treasuries.ajax_search', ['data' => $data]);
        }
    }
}
