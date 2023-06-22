  @if ($data->isNotEmpty())
      <table class="table table-bordered">
          <thead class="thead-custom">
              <tr>
                  <th scope="col">رقم الخزنة</th>
                  <th scope="col">اسم الخزنة</th>
                  <th scope="col">نوع</th>
                  <th scope="col">المصاريف</th>
                  <th scope="col">المداخيل</th>
                  <th scope="col">الحالة</th>
                  <th scope="col">إجراءات</th>

              </tr>
          </thead>
          <tbody>
              @foreach ($data as $info)
                  <tr>
                      <th scope="row">{{ $info->id }}</td>
                      <td>{{ $info->name }}</td>
                      <td>{{ $info->is_master ? 'رئيسية' : 'فرعية' }}</td>
                      <td>{{ $info->last_exchange }}</td>
                      <td>{{ $info->last_collect }}</td>
                      <td>{{ $info->active ? 'مفعلة' : 'مغلقة' }}</td>
                      <td>
                          <button class="btn btn-primary">
                              <a class="text-light" href="{{ route('admin.treasuries.edit', $info->id) }}">تعديل</a>
                          </button>
                          <button class="btn btn-info">
                              <a class="text-light" href="">المزيد</a>
                          </button>
                      </td>
                  </tr>
              @endforeach

          </tbody>
      </table>


      <div class=" col-md-12 mt-3 d-flex justify-content-center" id="ajax_pagination_in_search">
          {{ $data->links() }}
      </div>
  @else
      <div class="alert alert-danger">
          لاتوجد بيانات حاليا

      </div>
  @endif
