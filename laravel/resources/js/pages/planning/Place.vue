<template>
  <div class="place-container justify-content-center my-3">
    <div class="row m-0">
      <div class="col-md-7 my-2">
        <img
          class="w-100"
          v-if="places.length"
          :src="getSrc(places[placeIdList.indexOf(selectedPaceItemList.placeId)].images.right)"
        />
      </div>
      <div class="col-md-5 my-2 place-option">
        <div>
          <h3>Place</h3>
          <div>
            <div v-for="place in places" :key="place.id">
              <label>
                <input
                  type="radio"
                  name="place"
                  class="card-input-element"
                  :value="place.id"
                  v-model="selectedPaceItemList.placeId"
                  @change="selectPlace(place)"
                />
                <div class="card card-input">
                  <div class="card-body">
                    <h5 class="card-title">{{place.title}}</h5>
                    <p class="card-text">{{place.comment}}</p>
                  </div>
                </div>
              </label>
            </div>
          </div>
        </div>
        <div v-if="selectedPaceItemList.placeId && selectedPaceItemList.placeDetail">
          <div
            v-for="placeDetail in places[placeIdList.indexOf(selectedPaceItemList.placeId)].children"
            :key="placeDetail.id"
          >
            <h3>{{placeDetail.title}}</h3>
            <div v-for="placeDetailChild in placeDetail.children" :key="placeDetailChild.id">
              <label>
                <input
                  type="radio"
                  :name="'place-detail-child' + placeDetailChild.id"
                  class="card-input-element"
                  :value="placeDetailChild.id"
                  v-model="selectedPaceItemList.placeDetail[placeDetailChild.parent_id]"
                  @change="selectPlaceDetail(placeDetailChild)"
                />
                <div class="card card-input">
                  <div class="card-body plan-detail">
                    <h5 class="card-title float-left">{{placeDetailChild.title}}</h5>
                    <p class="float-right text-danger">+ {{placeDetailChild.price}} Ks</p>
                    <p></p>
                    <div
                      class="w-100"
                      v-if="placeDetailChild.is_customizable && selectedPaceItemList.placeDetail[placeDetailChild.parent_id] == placeDetailChild.id"
                    >
                      <ValidationProvider
                        :rules="`minmax:${placeDetailChild.validation_rules.min},${placeDetailChild.validation_rules.max}`"
                        v-slot="validationContext"
                      >
                        <b-form-input
                          name="placeDetailChild.title"
                          class="text-input"
                          :state="getValidationState(validationContext)"
                          v-model="selectedPaceItemList.placeCustom[placeDetailChild.parent_id][placeDetailChild.id]"
                        ></b-form-input>
                        <b-form-invalid-feedback
                          id="email-live-feedback"
                        >{{ validationContext.errors[0] }}</b-form-invalid-feedback>
                      </ValidationProvider>
                    </div>
                  </div>
                </div>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script src="../../services/planning/place.js">
</script>
<style scoped>
.place-container {
  height: 80vh;
}

.place-option {
  overflow: auto;
  height: 80vh;
}

.planning-input {
  width: 300px;
}

.day-input,
.text-input {
  width: 200px;
}

.card-body {
  padding: 1rem;
}

.card-body:hover {
  background-color: azure;
}

.plan-detail {
  width: 300px;
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

input:focus {
  box-shadow: 0 0 1px 1px #2ecc71;
}
</style>