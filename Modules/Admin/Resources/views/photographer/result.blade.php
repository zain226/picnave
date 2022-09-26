<div class="table-responsive">
    <table class="table table-sm">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="tag_container">
        @forelse($searchResults as $item)
            <tr>
                <td><img src="{{asset($item->image)}}" class="thumb_image"></td>
                <td>{{$item->name}}</td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin.photographers.show',$item->id)}}">
                                <i data-feather="edit-2" class="mr-50"></i>
                                <span>Show</span>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="6">No records were found right now!</td>
            </tr>
        @endforelse

        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-6 text-left seach-result-info">
        <p>Showing {{ $searchResults->firstItem() }} to {{ $searchResults->lastItem() }}
            of {{ $searchResults->total() }} entries</p>
    </div>
    <div class="col-lg-6 text-right seach-result-info">
        {{--        {{ $searchResults->links('vendor.pagination.custom') }}--}}
        {{ $searchResults->onEachSide(5)->links() }}
    </div>
</div>
