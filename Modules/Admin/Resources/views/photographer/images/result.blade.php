<div class="table-responsive">
    <table class="table table-sm">
        <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody id="tag_container">
        @forelse($searchResults as $item)
            <tr>
                <td><img src="{{asset('media/thumb/'.$item->thumbnail)}}" class="thumb_image"></td>
                <td>{{$item->title}}</td>
                <td>
                    <a class="dropdown-item" href="{{route('admin.photographer.images.status',$item->id)}}">
                        <i data-feather="edit-2" class="mr-50"></i>
                        <span>
                            @if($item->status == null)
                                Approve
                            @else
                               Un Approve
                            @endif
                        </span>
                    </a>
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
