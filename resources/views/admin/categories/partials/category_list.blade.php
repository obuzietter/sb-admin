<ul class="list-group" id="categoryList">
    @forelse ($categories as $category)
        <li class="list-group-item my-2" data-id="{{ $category->id }}" data-name="{{ $category->name }}"
            style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
            <div class="d-flex justify-content-between" style="cursor: grab">
                {{-- category name --}}
                <a href="#category-{{ $category->id }}" data-bs-toggle="collapse" class="text-decoration-none">
                    <i class="fa-solid fa-folder"></i>
                    {{ $category->name }}
                </a>
                {{-- move icon --}}
                <i class="fa-solid fa-arrows-alt"></i>
            </div>

            {{-- Collapsible Subcategories --}}
            <div class="collapse mt-2" id="category-{{ $category->id }}">
                <ul class="list-group ms-3">
                    @foreach ($subcategories as $subcategory)
                        @if ($subcategory->parent_id == $category->id)
                            <li style="list-style: none">
                                <i class="fa-solid fa-file"></i>
                                {{ $subcategory->name }}
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </li>
    @empty
        <li class="list-group-item text-primary">No categories found</li>
    @endforelse
</ul>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Sortable.create(document.getElementById('categoryList'), {
            animation: 150, // ms, animation speed moving items when sorting, `0` — without animation
            // Element dragging ended
            onEnd: function( /**Event*/ evt) {
               
                updateCategoryOrder();

            },
        });
    });

    // Function to update category order
    function updateCategoryOrder(item, index) {
        let order = [];
        document.querySelectorAll('#categoryList .list-group-item').forEach((item, index) => {
            order.push({
                id: item.getAttribute('data-id'),
                order: index
            });
        });
        // console.log(order);
        order.forEach((item, index) => {
            console.log(' ID: ' + item.id + ' Order: ' + item.order);
            // console.log(item.order);
        });

        // ajax to update category order



        fetch('{{ route('admin.categories.updateOrder') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    order: order

                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                if (data.success) {
                    // show success message
                    document.querySelector('#alert-success span').textContent = data.message;
                    document.querySelector('#alert-success').classList.remove('d-none');
                    document.querySelector('#alert-success').classList.add('d-block');
                    setTimeout(() => {
                        document.querySelector('#alert-success').classList.remove('d-block');
                        document.querySelector('#alert-success').classList.add('d-none');
                    }, 3000);
                } else {
                    // show error message
                    document.querySelector('#alert-danger span').textContent = data.message;
                    document.querySelector('#alert-danger').classList.remove('d-none');
                    document.querySelector('#alert-danger').classList.add('d-block');
                    setTimeout(() => {
                        document.querySelector('#alert-danger').classList.remove('d-block');
                        document.querySelector('#alert-danger').classList.add('d-none');
                    }, 3000);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });





    }
</script>
