@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">News List</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.news.create') }}">Add news</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->categories->map(fn($item) => $item->title)->implode(',') }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->description }}</td>
                    <td>{{ $news->created_at }}</td>
                    <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">change</a> &nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $news->id }}" style="color: red;">delete</a> </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="7">No notes</td>
                    </tr>
                @endforelse
                <tr></tr>
            </tbody>
        </table>

        {{ $newsList->links() }}
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                    const id = this.getAttribute('rel');
                    if(confirm(`confirm the deletion of the entry #ID = ${id}`)) {
                        send(`/admin/news/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert("deletion canceled");
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush