<form action="{{ route('Task.index') }}" class="mt-3 ">
    @csrf
    <div class="input-group mb-4">
        <button class="input-group-text btn" style="background-color: antiquewhite"><i
                class="bi bi-search text-dark"></i></button>
        <input type="text" name="keyword" @if (request()->has('keyword')) value={{ request()->keyword }} @endif
            class="form-control " placeholder="Search">
        @if (request()->has('keyword'))
            <a class="btn btn-outline-danger" href="{{ route('Task.index') }}"><i class="bi bi-x"></i></a>
        @endif
    </div>
</form>

{{-- add task button just for task --}}
<a href="{{ route('Task.create') }}" class="btn btn-outline-secondary  d-md-inline-block d-sm-block mt-sm-2 ">Add
    task</a>
<a href="{{ route('Task.index') }}" class=" btn text-dark d-md-inline-block d-sm-block mt-sm-2"
    style="background-color: antiquewhite">All task</a>
<a href="{{ route('home') }}" class="btn btn-info d-md-inline-block d-sm-block mt-sm-2 ">
    <i class="bi bi-house "></i> Home</a>


<div class="list-group list-group-flush text-lg-left mb-3">
    <span class="list-group-item border-0 disabled d-none d-lg-block  ">
        <small>Tasks</small>
    </span>
    <a href="{{ route('task.upcoming') }}" class="list-group-item border-0 list-group-item-action  ">
        <i class="bi bi-fast-forward "></i>
        <span class="d-md-inline d-sm-block">Upcoming</span>
    </a>
    <a href="{{ route('task.today') }}" class="list-group-item border-0 list-group-item-action ">
        <i class="bi bi-list-check"></i>
        <span class=" d-md-inline d-sm-block">Today</span>
    </a>
    <a href="{{ route('task.calendar') }}" class="list-group-item border-0 list-group-item-action ">
        <i class="bi bi-calendar3 "></i>
        <span class=" d-md-inline d-sm-block">Calendar</span>
    </a>
    <a href="{{ route('Note.create') }}" class="list-group-item border-0 list-group-item-action">
        <i class="bi bi-sticky-fill "></i>
        <span class=" d-md-inline d-sm-block">Sticky Wall</span>
    </a>

</div>

<div class="list-group list-group-flush text-md-left mb-3 relative " style="height:200px;
overflow-y: scroll;">
    <span class="list-group-item border-0 disabled d-none d-lg-block   ">
        <small>Category</small>
    </span>
    @forelse (App\Models\Category::where('user_id',Auth::id())->get() as $category)
        <div class="list-group-item border-0 list-group-item-action 
                    d-inline-block ">
            <a href="{{ route('Category.show', $category->id) }}" class="btn p-0">
                <i class="bi {{ $category->icon }}"></i>
                <span class="text-decoration-none d-lg-inline">{{ $category->category }}</span>
            </a>
            <form action="{{ route('Category.destroy', $category->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn"><i class="bi bi-trash"></i></button>
            </form>

        </div>


    @empty
        Add some Category
    @endforelse


    <button class="btn btn-info list-group-item " data-bs-toggle="modal" data-bs-target="#category">
        <i class="bi bi-plus"></i>
        Add New Category
    </button>




</div>

<div class="modal" id="category">
    <div class=" ">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Category:</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Category.store') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="category" placeholder="Category Name" required>

                        <div class="icon-menu">
                            <select id="icon-select" name="icon" class="form-select mt-3" required>
                                <option value="bi-fast-forward text-info">
                                    forward
                                </option>
                                <option value="bi-list-check text-seondary">list</option>
                                <option value="bi-sticky-fill text-warning">stickyNote</option>
                                <option value="bi-music-note-beamed text-primary">music</option>
                                <option value="bi-facebook text-primary">facebook</option>
                                <option value="bi-journals text-info">Journal</option>
                                <option value="bi bi-hearts text-danger">Heart</option>
                            </select>
                            <div class="selected-icon"></div>
                        </div>


                        <button class="btn btn-info mt-3">
                            add
                        </button>


                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const iconSelect = document.getElementById('icon-select');
        const selectedIcon = document.querySelector('.selected-icon');

        iconSelect.addEventListener('change', function() {
            const selectedValue = iconSelect.value;
            selectedIcon.innerHTML = `<i class="bi ${selectedValue}"></i>`;
        });

    });
</script>
