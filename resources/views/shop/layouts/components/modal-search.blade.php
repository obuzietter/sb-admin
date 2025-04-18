<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
               <form action="{{ route('product.search') }}" method="GET" class="input-group w-75 mx-auto d-flex">
                @csrf
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" name="search" placeholder="keywords" aria-describedby="search-icon-1">
                    <button type="submit" class="btn p-0 border-0 shadow-none"><span id="search-icon-1" class="input-group-text p-3 px-4 d-inline-block"><i class="fa fa-search"></i></span></button>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>