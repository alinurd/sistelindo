<form class="form" id="formData">
                            <input type="hidden" name="id" id="data_id" class="form-control" value="0">

  <div class="row g-2 mb-3">
    <div class="col-md-6 col-12">
      <label for="sort" id="label-sort" class="form-label">Sort</label>
      <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control"
        id="sort" name="sort" autocomplete="off" required />
    </div> 
    <div class="col-md-6 col-12">
      <label for="status" id="label-status" class="form-label">Status</label>
      <select name="status" class="form-control" id="status" required>
        <option value="">- Pilih Status -</option>
    <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select>
    </div>
  </div>

   
       
<div class="mb-3">
                <label for="titleEN" id="label-titleEN" class="form-label">Title</label>
                <input type="text" class="form-control" id="titleEN" name="title" required />
            </div>

       <div class="row g-1 mb-3">
  <div class="col-md-2 col-12">
    <label for="rating" id="label-rating" class="form-label">Rating</label>
    <input type="number" min="1" max="5" class="form-control" id="rating" name="rating" required />
  </div>
  <div class="col-md-10 col-12 d-flex align-items-center">
    <label for="result" id="label-result" class="form-label me-3">Result</label>
    <div id="star-rating">
      <i class="fa fa-star-o star" data-value="1"></i>
      <i class="fa fa-star-o star" data-value="2"></i>
      <i class="fa fa-star-o star" data-value="3"></i>
      <i class="fa fa-star-o star" data-value="4"></i>
      <i class="fa fa-star-o star" data-value="5"></i>
    </div>
  </div>
</div> 

<div class="col-md-3 col-12">
    <label for="date" id="label-date" class="form-label">Date</label>
    <input type="date"  class="form-control" id="date" name="date" required />
  </div>

  <div class="mb-3">
    <label for="description" id="label-description" class="form-label"></label>
    <textarea name="description" id="description" class="form-control"></textarea>
  </div>

  <!-- Featured Image -->
  <div class="row">
    <div class="col mb-3">
      <div class="border rounded p-2">
        <label id="label-featured" class="form-label mb-1"></label>
        <div class="d-flex flex-column flex-md-row justify-content-evenly align-items-center">
          <div id="holder" class="mb-1 mb-md-0">
            <img src="{{ asset('assets/img/noimage.jpg') }}" style="height: 110px;" alt="Featured Image">
          </div>
          <div>
            <small id="featured-note" class="text-muted"></small>
            <div class="input-group">
              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                <i class="menu-icon tf-icons ti ti-photo"></i> <span id="btn-choose"></span>
              </a>
              <input id="thumbnail" class="form-control bg-secondary-subtle" type="text" name="image" readonly>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>

  <!-- Action -->
  <div class="row">
    <div class="col-12 text-right">
      <div class="btn-group float-end ps-2" role="group">
        <button type="button" id="submit" onclick="saveData()" class="btn btn-outline-primary">
          <div id="simpan">
            <i data-feather="save" class="me-1"></i> <span id="btn-save"></span>
          </div>
          <div id="loading" class="hidden">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span id="btn-loading"></span>
          </div>
        </button>
        <button type="reset" class="btn btn-outline-danger">
          <i data-feather="refresh-cw" class="me-1"></i> <span id="btn-reset"></span>
        </button>
      </div>
    </div>
  </div>
</form>

<script>
const lang = {
  en: {
    sort: "Sort",
    status: "Status",
    category: "Category",
    description: "Description",
    featured: "Featured Image",
    featuredNote: "Please upload an image sized 400 x 400 pixels",
    choose: "Choose",
    save: "Save",
    reset: "Reset",
    loading: "Loading...",

    placeholder: {
      sort: "Enter sort number",
      category: "Enter category name",
      description: "Enter description"
    }
  },
  id: {
    sort: "Urutan",
    status: "Status",
    category: "Kategori",
    description: "Deskripsi",
    featured: "Gambar Utama",
    featuredNote: "Silakan unggah gambar berukuran 400 x 400 pixel",
    choose: "Pilih",
    save: "Simpan",
    reset: "Reset",
    loading: "Memuat...",

    placeholder: {
      sort: "Masukkan nomor urut",
      category: "Masukkan nama kategori",
      description: "Masukkan deskripsi"
    }
  }
};

function setLang(l) {
  // Label
  // document.getElementById("label-sort").innerText = lang[l].sort;
  // document.getElementById("label-status").innerText = lang[l].status;
  // document.getElementById("label-category").innerText = lang[l].category;
  document.getElementById("label-description").innerText = lang[l].description;
  document.getElementById("label-featured").innerText = lang[l].featured;

  // Placeholder
  // document.getElementById("sort").placeholder = lang[l].placeholder.sort;
  // document.getElementById("category").placeholder = lang[l].placeholder.category;
  document.getElementById("description").placeholder = lang[l].placeholder.description;

  // Featured image
  document.getElementById("featured-note").innerText = lang[l].featuredNote;
  document.getElementById("btn-choose").innerText = lang[l].choose;

  // Action button
  document.getElementById("btn-save").innerText = lang[l].save;
  document.getElementById("btn-reset").innerText = lang[l].reset;
  document.getElementById("btn-loading").innerText = lang[l].loading;

  // Aktifkan tombol bahasa
  document.getElementById("btn-en").classList.remove("active");
  document.getElementById("btn-id").classList.remove("active");
  document.getElementById("btn-" + l).classList.add("active");
}

// default bahasa Indonesia
setLang("en");
</script>
 


<style>

 #star-rating .star {
    font-size: 28px;
    color: #9f1616;
    cursor: pointer;
    margin-right: 5px;
    transition: color 0.2s;
  }
  #star-rating .star.selected {
    color: gold;
  }
</style>