<script>
                CKEDITOR.replace('description', CKEDITORGlobalOptions); 

    // delete
    function btnDeleteItem(target, title) {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus: ' + title + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batalkan',
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                swAlertDialog('success', 'Berhasil menghapus data');
                $.get(target, () => location.reload());
            }
        })
    }

    // multi delete
    function actionMultiDeleteItems() {
        var id = [];
        $('.delete-checkbox:checked').each(function() {
            id.push(parseInt($(this).val()));
        });
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus semua data terpilih?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batalkan'
        }).then((result) => {
            if (result.isConfirmed) {
                swAlertDialog('success', 'Berhasil menghapus data terpilih');
                $.get("{{ route($prefixRoute.'multi_delete') }}", { id: id }, () => location.reload());
            }
        })
    }

    // update status
    function actionChangeStatusItem(url, id) {
        let sts = document.getElementById('status' + id).checked ? 1 : 0;
        $.get(url, { sts: sts }, function(res) {
            swAlertDialog(res.status, res.message);
            if (res.status == 'success') location.reload();
        }, 'json');
    }
 
    // save data
    function saveData() {
        let hasEmptyRequiredForm = false;
        $('#formData .form-control[required]:visible').each(function() {
            if (!$(this).val()) hasEmptyRequiredForm = true;
        });
        if (hasEmptyRequiredForm) {
            return swAlertDialog('error', 'Silakan isi semua formulir');
        }

        const jsonData = {};
        $('#formData .form-control').each(function() {
            let key = $(this).attr('name');
            jsonData[key] = $(this).val().trim();
        });
        jsonData['description'] = CKEDITOR.instances['description'].getData()
        $.ajax({
            type: "POST",
            url: "{{ route($prefixRoute.'create') }}",
            data: jsonData,
            dataType: 'json',
            beforeSend: function() {
                $('#submit').prop('disabled', true);
                $('#loading').removeClass('hidden');
                $('#simpan').addClass('hidden');
            },
            success: function(res) {
                if (res.status == 'success') {
                    swAlertDialog('success', 'Data berhasil disimpan');
                    location.reload();
                } else {
                    swAlertDialog('error', res.message);
                    $('#submit').prop('disabled', false);
                    $('#loading').addClass('hidden');
                    $('#simpan').removeClass('hidden');
                }
            }
        });
    }

    // edit
    function btnEditItem(url, id) {
        $.get(url, function(res) {
            if (res.status == 'success') {
                $.each(res.data[0], function(name, val) {
                    $(`#formData .form-control[name='${name}']`).val(val);
                    if (name === 'image' && val) {
                        $('#formData #holder img').attr('src', "{{ url('/') }}/" + val);
                    }
                });
                $('#data_id').val(id);
                CKEDITOR.instances['description'].setData(res.data[0]['description']);
                $('#modalForm').modal('toggle');
            } else {
                swAlertDialog('error', res.message);
            }
        }, 'json');
    }

    function openForm() {
        $('#formData .form-control').val('');
        $('#statusForm').val("active");
        $('#data_id').val(0);
        $('#formData #holder img').attr('src', "{{ asset('assets/img/noimage.jpg') }}");
        $('#modalForm').modal('toggle');
    }

    function onlyNumberKey(evt) {
        var ASCIICode = evt.which ? evt.which : evt.keyCode;
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) return false;
        return true;
    }
</script>


<script>
  const stars = document.querySelectorAll("#star-rating .star");
const ratingInput = document.getElementById("rating");
const ratingResult = document.getElementById("rating-result");
function highlightStars(count) {
  stars.forEach((s, i) => {
    if (i < count) {
      // bintang sesuai rating → emas
      s.classList.add("fa-star");
      s.classList.remove("fa-star-o");
      s.style.color = "gold";
    } else {
      // sisanya abu transparan
      s.classList.add("fa-star");
      s.classList.remove("fa-star-o");
      s.style.color = "#6f6f6f17"; 
    }
  });
  ratingResult.textContent = count > 0 ? count : "";
}


stars.forEach(star => {
  star.addEventListener("click", function () {
    const val = parseInt(this.dataset.value);
    ratingInput.value = val;
    highlightStars(val);
  });
});

// Input manual → update bintang
ratingInput.addEventListener("input", function () {
  let val = parseInt(this.value) || 0;
  if (val < 0) val = 0;
  if (val > 5) val = 5;
  this.value = val;  
  highlightStars(val);
});

// Saat halaman load langsung highlight sesuai value input
document.addEventListener("DOMContentLoaded", function () {
  const val = parseInt(ratingInput.value) || 0;
  highlightStars(val);
});

// Kalau form pakai modal Bootstrap, tambahkan juga listener ini
$('#modalForm').on('shown.bs.modal', function () {
  const val = parseInt(ratingInput.value) || 0;
  highlightStars(val);
});

</script>