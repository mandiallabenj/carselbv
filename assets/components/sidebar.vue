<template>
  <!-- Navbar -->
  <div class="navbar-expand-lg mb-5">
    <!-- Navbar Toggle -->
    <div class="d-grid">
      <button type="button" class="navbar-toggler btn btn-white mb-3 collapsed" data-bs-toggle="collapse" data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenu">
                <span class="d-flex justify-content-between align-items-center">
                  <span class="text-dark">Filter</span>

                  <span class="navbar-toggler-default">
                    <i class="bi-list"></i>
                  </span>

                  <span class="navbar-toggler-toggled">
                    <i class="bi-x"></i>
                  </span>
                </span>
      </button>
    </div>
    <!-- End Navbar Toggle -->

    <!-- Navbar Collapse -->
    <div id="navbarVerticalNavMenu" class="navbar-collapse collapse" style="">
      <div class="w-100">
        <!-- Form -->
        <form>
          <div class="border-bottom pb-4 mb-4">
            <h5>Make</h5>

            <div class="d-grid gap-2">
              <!-- Checkboxes -->
              <div v-for="carMakeItem in carMakeList" :key="carMakeItem['@id']" class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="menCheckbox" checked="">
                <label class="form-check-label d-flex" for="menCheckbox"><a class="text-secondary" href="/car/list/make/${carMakeItem.id}"> {{ carMakeItem.carMake }} </a> <span class="ms-auto">(73)</span></label>
              </div>
              <!-- End Checkboxes -->
            </div>
          </div>

          <div class="border-bottom pb-4 mb-4">
            <h5>Brand</h5>

            <div class="d-grid gap-2">
              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="adidasCheckbox">
                <label class="form-check-label d-flex" for="adidasCheckbox">Adidas <span class="ms-auto">(16)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="newBalanceCheckbox">
                <label class="form-check-label d-flex" for="newBalanceCheckbox">New Balance <span class="ms-auto">(8)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="nikeCheckbox">
                <label class="form-check-label d-flex" for="nikeCheckbox">Nike <span class="ms-auto">(35)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="fredPerryCheckbox">
                <label class="form-check-label d-flex" for="fredPerryCheckbox">Fred Perry <span class="ms-auto">(5)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="tnfCheckbox">
                <label class="form-check-label d-flex" for="tnfCheckbox">The North Face <span class="ms-auto">(1)</span></label>
              </div>
              <!-- End Checkboxes -->
            </div>

            <!-- View More - Collapse -->
            <div class="collapse" id="collapseBrand">
              <div class="d-grid gap-2">
                <!-- Checkboxes -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="gucciCheckbox">
                  <label class="form-check-label d-flex" for="gucciCheckbox">Gucci <span class="ms-auto">(5)</span></label>
                </div>
                <!-- End Checkboxes -->

                <!-- Checkboxes -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="mangoCheckbox">
                  <label class="form-check-label d-flex" for="mangoCheckbox">Mango <span class="ms-auto">(1)</span></label>
                </div>
                <!-- End Checkboxes -->
              </div>
            </div>
            <!-- End View More - Collapse -->

            <!-- Link -->
            <a class="link-sm link-collapse" href="#collapseBrand" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseBrand">
              <span class="link-collapse-default">View more</span>
              <span class="link-collapse-active">View less</span>
            </a>
            <!-- End Link -->
          </div>

          <div class="border-bottom pb-4 mb-4">
            <h5>Size</h5>

            <div class="d-grid gap-2">
              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="sizeSCheckbox" checked="">
                <label class="form-check-label d-flex" for="sizeSCheckbox">S <span class="ms-auto">(27)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="sizeMCheckbox">
                <label class="form-check-label d-flex" for="sizeMCheckbox">M <span class="ms-auto">(18)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="sizeLCheckbox" checked="">
                <label class="form-check-label d-flex" for="sizeLCheckbox">L <span class="ms-auto">(0)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="sizeXLCheckbox">
                <label class="form-check-label d-flex" for="sizeXLCheckbox">XL <span class="ms-auto">(1)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="sizeXXLCheckbox">
                <label class="form-check-label d-flex" for="sizeXXLCheckbox">XXL <span class="ms-auto">(2)</span></label>
              </div>
              <!-- End Checkboxes -->
            </div>
          </div>

          <div class="border-bottom pb-4 mb-4">
            <h5>Category</h5>

            <div class="d-grid gap-2">
              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="tshirtCheckbox" checked="">
                <label class="form-check-label d-flex" for="tshirtCheckbox">T-shirt <span class="ms-auto">(73)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="shoesCheckbox">
                <label class="form-check-label d-flex" for="shoesCheckbox">Shoes <span class="ms-auto">(0)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="accessoriesCheckbox" checked="">
                <label class="form-check-label d-flex" for="accessoriesCheckbox">Accessories <span class="ms-auto">(51)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="topsCheckbox" checked="">
                <label class="form-check-label d-flex" for="topsCheckbox">Tops <span class="ms-auto">(5)</span></label>
              </div>
              <!-- End Checkboxes -->

              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="bottomCheckbox">
                <label class="form-check-label d-flex" for="bottomCheckbox">Bottom <span class="ms-auto">(11)</span></label>
              </div>
              <!-- End Checkboxes -->
            </div>

            <!-- View More - Collapse -->
            <div class="collapse" id="collapseCategory">
              <div class="d-grid gap-2">
                <!-- Checkboxes -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="shortsCheckbox">
                  <label class="form-check-label d-flex" for="shortsCheckbox">Shorts <span class="ms-auto">(6)</span></label>
                </div>
                <!-- End Checkboxes -->

                <!-- Checkboxes -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="hatsCheckbox">
                  <label class="form-check-label d-flex" for="hatsCheckbox">Hats <span class="ms-auto">(3)</span></label>
                </div>
                <!-- End Checkboxes -->

                <!-- Checkboxes -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="socksCheckbox">
                  <label class="form-check-label d-flex" for="socksCheckbox">Socks <span class="ms-auto">(8)</span></label>
                </div>
                <!-- End Checkboxes -->
              </div>
            </div>
            <!-- End View More - Collapse -->

            <!-- Link -->
            <a class="link-sm link-collapse" href="#collapseCategory" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseCategory">
              <span class="link-collapse-default">View more</span>
              <span class="link-collapse-active">View less</span>
            </a>
            <!-- End Link -->
          </div>

          <div class="border-bottom pb-4 mb-4">
            <h5>Rating</h5>

            <div class="d-grid gap-2">
              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label">
                          <span class="d-flex gap-1">
                            {% for i in 1..5 %}
                                <i class="bi bi-star-fill text-warning"></i>
                              {% endfor %}
                            (3)
                          </span>
                </label>
              </div>
              <!-- End Checkboxes -->
              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label">
                          <span class="d-flex gap-1">
                            {% for i in 1..4 %}
                                <i class="bi bi-star-fill text-warning"></i>
                            {% endfor %}
                            (43)
                          </span>
                </label>
              </div>
              <!-- End Checkboxes -->
              <!-- Checkboxes -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label">
                          <span class="d-flex gap-1">
                            {% for i in 1..3 %}
                                <i class="bi bi-star-fill text-warning"></i>
                            {% endfor %}
                            (3)
                          </span>
                </label>
              </div>
              <!-- End Checkboxes -->


            </div>
          </div>

          <div class="d-grid">
            <button type="button" class="btn btn-white btn-transition">Clear all</button>
          </div>
        </form>
        <!-- End Form -->
      </div>
    </div>
    <!-- End Navbar Collapse -->
  </div>
  <!-- End Navbar -->
</template>


<script>

import axios from "axios";

export default {
  name: "sidebar",
  data(){
    return{
      carMakeList:[],
    };
  },
  async created(){
    const response = await axios.get('/api/car_makes');
    this.carMakeList = response.data['hydra:member'];
  }

}
</script>