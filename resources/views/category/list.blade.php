<table class="table table-responsive-sm table-responsive-md table-responsive-lg table-hover table-bordered">
    <thead class="text-center">
    <th>#</th>
    <th>Title</th>
    <th>Owner</th>
    <th>Controls</th>
    <th>Created_at</th>
    </thead>
    <tbody>
    @forelse(\App\Category::with('user')->get() as $category)
        <tr class="text-center">
            <td>{{ $category->id }}</td>
            <td class="text-capitalize text-nowrap">{{ $category->title }}</td>
            <td class="text-capitalize text-nowrap">{{ $category->user->name }}</td>
            <td class="text-nowrap">
                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-outline-info">edit</a>
                <form action="{{ route('category.destroy',$category->id) }}" class="d-inline-block" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete {{$category->title}} Category?')">Delete</button>
                </form>
            </td>
            <td class="text-nowrap">
                <i class="feather-calendar"></i>
                <span>{{ $category->created_at->format('d-m-Y') }}</span>
                <br>
                <i class="feather-clock"></i>
                <span>{{ $category->created_at->format('h:i A') }}</span>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">There is no category.</td>
        </tr>
    @endforelse
    </tbody>
</table>
