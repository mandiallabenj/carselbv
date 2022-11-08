<template>
  <loading v-show="cars.length === 0"/>
  <div class="row row-cols-sm-2 row-cols-md-3 mb-10">
  <div class="col mb-4" v-for="car in cars" :key="car['@id']">
    <!-- Card -->
    <div class="card card-bordered shadow-none h-100">
      <div class="card-pinned">
        <img style="height: 170px" class="card-img-top w-100" :alt="car.title" :src="'/uploads/' + car.carFilename" alt="Image Description">
      </div>
      <div class="card-body">
        <h6 style="font-size: 12px" class="card-title  position-relative">
          <a href="#" class="text-dark text-uppercase"> {{ car.title }} </a>

          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                         New
                                     </span>

        </h6>
        <h5 style="font-size: 13px" class="card-subtitle my-1">
          UGX {{ car.price }}
        </h5>
        <div class="card-text" style="font-size: 12px;">
          <div class="d-flex flex-column">
            <div class="d-flex justify-content-between flex-wrap">
              <div>
                <p class="me-3"> <i class="bi bi-car-front"></i> {{ car.make }} {{ car.modelyear }}</p>
              </div>

              <div>
                <p class="me-1">
                  <i class="bi bi-geo-alt"></i> {{ car.location }}
                </p>
              </div>
            </div>
            <div class="d-flex justify-content-between flex-wrap">
              <div>
                <span style="background:#D2f4EA;" class="pe-1 badge rounded-pill text-secondary"><small>Negotiable </small> </span>
              </div>
              <div>
                <small>Uploaded 11 days ago </small>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between my-3">
          <div>
            <button class="btn btn-sm btn-outline-secondary">
              <i class="bi bi-telephone"></i>
              Contact Seller
            </button>
          </div>
          <div>
            <button class="btn btn-sm">
              <i class="bi bi-heart"></i>
            </button>
          </div>
        </div>


      </div>

    </div>
    <!-- End Card -->
  </div>
    <!-- Pagination -->
    <nav aria-label="Page navigation my-4">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">
                    <i class="bi-chevron-double-left small"></i>
                  </span>
          </a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">
                    <i class="bi-chevron-double-right small"></i>
                  </span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- End Pagination -->
  </div>
</template>

<script>
import axios from 'axios';
import Loading from "./loading";

export default {
  name: 'catalog',
  components: {Loading},
  data(){
    return {
      cars: [],
    };
  },
  async created() {
    const  response = await axios.get('/api/cars');
    this.cars = response.data['hydra:member'];
  },
  computed: {

  }
}
</script>