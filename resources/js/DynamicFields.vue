<template>
  Subjects & Grades
  <div class="row mt-2" v-for="key in count" :key="key">
    <div class="col">
      <input :name="'subject_'+key" type="text" class="form-control" placeholder="Subject">
    </div>
    <div class="col">
      <input :name="'letter_grade_'+key" type="text" class="form-control" placeholder="Letter Grade">
    </div>
    <div class="col">
      <input :name="'grade_point_'+key" type="number" class="form-control" placeholder="Grade Point">
    </div>
  </div>
  <div class="py-1"></div>
  <div class="d-flex justify-content-between">
    <button type="button" class="btn btn-success py-0" @click="addField"><strong style="font-size:12px;"> <i class="fa-solid fa-plus"></i> Add Field </strong></button>
    <button type="button" class="btn btn-danger py-0" @click="removeField"> <strong style="font-size:12px;"> <i class="fa-solid fa-minus"></i> Remove Field </strong></button>
  </div>
  <input type="hidden" name="count" :value="count">
</template>
<script>
export default {
  name: "Dynamic-Fields",
  data() {
    return {
      count: 1,
    };
  },
  methods: {
    addField() {
      this.count++;
    },
    removeField() {
      this.count--;
    },
  },
};
</script>
