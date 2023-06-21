<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin_panel_settings_Request;
use App\Models\Admin;
use App\Models\Admin_panel_setting;
use Exception;
use Illuminate\Http\Request;

class Admin_panel_settingsController extends Controller
{
    public function index()
    {
        $data = Admin_panel_setting::where('com_code', auth()->user()->com_code)->first();

        if (isset($data)) {
            if ($data['updated_by'] > 0 and $data['updated_by'] != null)
                $data["updated_by_admin"] = Admin::where("id", $data["updated_by"])->value('name');
        }

        return view('admin.admin_panel_settings.index', ['data' => $data]);
    }
    public function edit()
    {
        $data = Admin_panel_setting::where('com_code', auth()->user()->com_code)->first();
        return view('admin.admin_panel_settings.edit', ['data' => $data]);
    }
    public function update(Admin_panel_settings_Request $req)
    {

        try {
            $data = Admin_panel_setting::where('com_code', auth()->user()->com_code)->first();
            $data->system_name = $req->system_name;
            $data->address = $req->address;
            $data->phone = $req->phone;
            $data->updated_by = auth()->user()->id;
            $data->updated_at = date('Y-m-d H:i:s');


            $oldphotoName = $data->photo;
            if ($req->has('photo')) {
                $req->validate([
                    'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
                ]);

                $the_file_name = uploadImage('assets/admin/uploads', $req->photo);

                $data->photo = $the_file_name;
                if (file_exists('assets/admin/uploads/' . $oldphotoName) and !empty($oldphotoName)) {
                    unlink('assets/admin/uploads/' . $oldphotoName);
                }
            }




            $data->save();
            return redirect()->route('admin.adminpanelsettingEdit')->with(['success' => "تم تعديل البيانات بنجاح"]);
        } catch (\Exception $exception) {
            return redirect()->route('admin.adminpanelsettingEdit')->with(['error' => 'عفوا حدث خطأ ما' . $exception->getMessage()]);
        }
    }
}
