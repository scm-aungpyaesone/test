<template>
  <div class="row m-0">
    <div class="col-md-7 my-2">
      <img
        class="w-100"
        v-if="selectedCarItems.carBrand.images"
        :src="getSrc(selectedCarItems.carBrand.images.right)"
      />
      <div v-if="!carBrands.length">There is no selected Car Type.</div>
    </div>
    <div>
      <div>
          <!-- <div>{{getDraftCarTotalPrice}}</div> -->
        <h3>Car Type</h3>
        <div>
          <div v-for="carType in carTypes" :key="carType.id">
            <label>
              <input
                type="radio"
                name="carType"
                class="card-input-element"
                :value="carType.id"
                v-model="selectedCarItems.carType.id"
                @change="selectCarType(carType)"
              />
              <div class="card card-input">
                <div class="card-body">
                  <h5 class="card-title">{{carType.title}}</h5>
                  <p class="card-text">{{carType.comment}}</p>
                </div>
              </div>
            </label>
          </div>
        </div>
      </div>
      <div v-if="carBrands.length">
        <h3>Car Brand</h3>
        <div>
          <div v-for="carBrand in carBrands" :key="carBrand.id">
            <label>
              <input
                type="radio"
                name="carBrand"
                class="card-input-element"
                :value="carBrand.id"
                v-model="selectedCarItems.carBrand.id"
                @change="selectCarBrand(carBrand)"
              />
              <div class="card card-input">
                <div class="card-body">
                  <h5 class="card-title">{{carBrand.title}}</h5>
                  <p class="float-right text-danger">+ $ {{carBrand.price}}</p>
                </div>
              </div>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script src="../../services/planning/car.js"></script>
<style scoped>
.card-body {
  padding: 1rem;
}

.card-body:hover {
  background-color: azure;
}

.card-text {
  font-size: 14px;
}
.card-input-element {
  display: none;
}

.card-input:hover {
  cursor: pointer;
}

.card-input-element:checked + .card-input {
  box-shadow: 0 0 1px 1px #2ecc71;
}
</style>