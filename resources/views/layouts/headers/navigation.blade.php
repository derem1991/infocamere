<div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">{{$title ?? ''}}</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        {{ Breadcrumbs::render(Request::segment(1))}}  <!-- breadcrumb con la prima parte della radice -->
    </nav>
</div>