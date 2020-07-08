<template>
  <div class="place-container justify-content-center my-3">
    <div class="row m-0">
      <div class="col-md-7 my-2">
        <img class="w-100" src="../../../image/shan.jpeg" />
      </div>
      <div class="col-md-5 my-2 place-option">
        <div>
          <h3>Place</h3>
          <div>
            <div v-for="place in places" :key="place.id">{{place.title}}</div>
            <label>
              <input type="radio" name="place" class="card-input-element" />
              <div class="card card-input">
                <div class="card-body">
                  <h5 class="card-title">Shan</h5>
                  <p
                    class="card-text"
                  >Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </label>
            <label>
              <input type="radio" name="place" class="card-input-element" />
              <div class="card card-input">
                <div class="card-body">
                  <h5 class="card-title">Mandalay</h5>
                  <p
                    class="card-text"
                  >Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </label>
            <label>
              <input type="radio" name="place" class="card-input-element" />
              <div class="card card-input">
                <div class="card-body">
                  <h5 class="card-title">Bagan</h5>
                  <p
                    class="card-text"
                  >Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </label>
          </div>
        </div>
        <div>
          <h3>Plannings</h3>
          <div>
            <div class="card-body">
              <div class="card-text d-flex planning-input">
                <h5>Members</h5>
                <div class="w-100">
                  <b-form-input
                    class="member-input float-right"
                    placeholder="Enter number of members"
                  ></b-form-input>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="card-body">
              <div class="card-text d-flex planning-input">
                <h5>Days</h5>
                <div class="w-100">
                  <b-form-input class="day-input float-right" placeholder="Enter number of days"></b-form-input>
                </div>
              </div>
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
.member-input {
  width: 200px;
}

.card-body {
  padding: 1rem;
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