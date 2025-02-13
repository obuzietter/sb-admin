<ul class="list-group" id="categoryList">
    @foreach ($categories as $category)
        <li class="list-group-item my-2" data-id="{{ $category->id }}"
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
                            <li class="list-group-item">
                                <i class="fa-solid fa-file"></i>
                                {{ $subcategory->name }}
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </li>
    @endforeach
</ul>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Sortable.create(document.getElementById('categoryList'), {
            animation: 150, // ms, animation speed moving items when sorting, `0` — without animation
            // Element dragging ended
            onEnd: function( /**Event*/ evt) {
                var itemEl = evt.item; // dragged HTMLElement
                console.log(itemEl.getAttribute('data-id'));
                console.log(evt.oldIndex);
                evt.oldIndex; // element's old index within old parent
                console.log(evt.newIndex);              
                evt.newIndex; // element's new index within new parent
                
            },
        });
    });
</script>
