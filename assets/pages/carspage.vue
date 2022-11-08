<template>
  <!-- Breadcrumb -->
  <div class="bg-light">
    <div class="container py-4">
      <div class="row">
        <div class="col-sm">
          <h4 class="mb-0">All car</h4>
        </div>
        <!-- End Col -->

        <div class="col-sm-auto">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="../demo-shop/index.html">Shop</a>
              </li>
              <li class="breadcrumb-item">
                <a href="../demo-shop/products-grid.html">car</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Grid</li>
            </ol>
          </nav>
          <!-- End Breadcrumb -->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Card Grid -->
  <div class="container content-space-t-1 content-space-t-md-2 content-space-b-2 content-space-b-lg-3">
    <div class="row">
      <div class="col-lg-3">
        <sidebar/>
      </div>
      <!-- End Col -->

      <div class="col-lg-9">
        <div class="row align-items-center mb-5">
          <div class="col-sm mb-3 mb-sm-0">
            <h6 class="mb-0">110,000+ car</h6>
          </div>

          <div class="col-sm-auto">
            <div class="d-sm-flex justify-content-sm-end align-items-center">
              <!-- Select -->
              <div class="mb-2 mb-sm-0 me-sm-2">
                <select class="form-select form-select-sm">
                  <option value="Relevance" selected="">Relevance</option>
                  <option value="mostRecent">Most recent</option>
                </select>
              </div>
              <!-- End Select -->

              <!-- Select -->
              <div class="mb-2 mb-sm-0 me-sm-2">
                <select class="form-select form-select-sm">
                  <option value="alphabeticalOrderSelect1" selected="">A-to-Z</option>
                  <option value="alphabeticalOrderSelect2">Z-to-A</option>
                </select>
              </div>
              <!-- End Select -->

              <!-- Nav -->
              <ul class="nav nav-segment">
                <li class="nav-item">
                  <a class="nav-link active" href="#">
                    <i class="bi-grid-fill"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="bi-list"></i>
                  </a>
                </li>
              </ul>
              <!-- End Nav -->
            </div>
          </div>
        </div>
        <!-- End Row -->
        <!-- Catalog -->
          <catalog/>

        <!-- End Catalog -->

      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->
  </div>
  <!-- End Card Grid -->

</template>

<script>
import catalog from '../components/catalog';
import sidebar from "../components/sidebar";

export default {
 components: {
   catalog,
   sidebar,
 }
}
</script>