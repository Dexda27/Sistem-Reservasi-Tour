<link rel="stylesheet" href="<?=base_url('assets/vendor/libs/bs-stepper/bs-stepper.css');?>">
<?php echo $this->session->flashdata('notif'); ?>
<form id="wizard-property-listing-form" method="POST" action="<?=base_url('Reservation/createProgram/');?>"> 
  <div class="container-xxl flex-grow-1 container-p-y">  
    <div id="wizard-property-listing" class="bs-stepper vertical mt-2 linear">
      <div class="bs-stepper-header">
        <div class="step" > 
          <span class="step-trigger" style="cursor: default;">
            <span class="bs-stepper-circle"><i class="ti ti-bookmarks ti-sm"></i></span>
            <span class="bs-stepper-label">
              <span class="bs-stepper-title">Create Paket Program</span>
              <span class="bs-stepper-subtitle">Isi Form Program</span>
            </span>
          </span> 
        </div>
        <div class="line"></div>
        <div class="step" >
          <div class="form-group">
            <label class="form-label" for="nama_program">Nama Program</label>
            <input type="text" id="nama_program" name="nama_program" class="form-control" placeholder="City Highlights Tour" autocomplete="off">
          </div>
        </div>
        <div class="line"></div>
        <div class="step">
          <div class="form-group">
            <label class="form-label" for="deskripsi">Deskripsi</label>
            <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="A comprehensive tour ..." autocomplete="off">
          </div> 
        </div>
        <div class="line"></div>
        <div class="step">
          <div class="form-group">
            <label class="form-label" for="durasi">Durasi</label>
            <input type="number" id="durasi" name="durasi" class="form-control" placeholder="4" autocomplete="off">
          </div>
        </div>
        <div class="line"></div>
        <div class="step mt-2">
          <div class="form-group"> 
            <div class="d-flex justify-content-around">
              <button class="btn btn-sm btn-danger btn-next waves-effect waves-light">
                <span class="align-middle d-sm-inline-block d-none me-sm-1">reset</span>  
              </button>
              <button class="btn btn-sm btn-primary btn-next waves-effect waves-light">
                <span class="align-middle d-sm-inline-block d-none me-sm-1">submit</span>  
              </button>
            </div>
          </div>
        </div> 
      </div>
      <div class="bs-stepper-content">
        <div id="personal-details" class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
          <div class="row mb-2"> 
            <div class="col-6"></div>
            <div class="col-6">
              <div class="form-group"> 
                <label class="form-label" for="search">Search</label>
                <input type="text" id="search" class="form-control" placeholder="example : transport...." autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row g-3">
            <?php foreach ($produks as $produk): ?>
              <div class="col-sm-6">
                <div class="mb-md-0 mb-2">
                  <div class="form-check custom-option custom-option-basic">
                    <label class="form-check-label custom-option-content" for="customCheckTemp3-<?=$produk->id;?>">
                      <input class="form-check-input" type="checkbox" value="<?=$produk->id;?>" name="produks[]" id="customCheckTemp3-<?=$produk->id;?>">
                      <span class="custom-option-header">
                        <span class=" mb-0">
                          <span class="h6"><?=$produk->nama_produk;?></span>
                          <small class="badge bg-label-warning" style="font-size: 10px;"><?=$produk->tipe_produk;?></small>
                        </span>
                        <span class="text-muted">Rp.<?=$produk->harga;?></span>
                      </span>
                      <span class="custom-option-body">
                        <small class="option-text"><?=$produk->deskripsi;?></small>
                      </span>
                    </label>
                  </div>
                </div> 
              </div>
            <?php endforeach ?> 
          </div>
        </div> 
      </div>
    </div>
  </div>
</form>

<script>
  $(document).ready(function(){
    $('#search').on('input', function() {
        var searchValue = $(this).val();
        var selectedProducts = $('input[name="produks[]"]:checked').map(function() {
            return $(this).val();
        }).get();

        $.ajax({
            type: 'POST',
            url: '<?=base_url('Reservation/searchProduk/');?>',
            data: {search: searchValue},
            dataType: 'json',
            success: function(response) {
                var productsHtml = '';
                $.each(response, function(index, produk) {
                    var checked = selectedProducts.includes(produk.id.toString()) ? 'checked' : '';
                    productsHtml += '<div class="col-sm-6">' +
                                    '<div class="mb-md-0 mb-2">' +
                                    '<div class="form-check custom-option custom-option-basic">' +
                                    '<label class="form-check-label custom-option-content" for="customCheckTemp3-' + produk.id + '">' +
                                    '<input class="form-check-input" type="checkbox" value="' + produk.id + '" name="produks[]" id="customCheckTemp3-' + produk.id + '" ' + checked + '>' +
                                    '<span class="custom-option-header">' +
                                    '<span class=" mb-0">' +
                                    '<span class="h6">' + produk.nama_produk + '</span>' +
                                    '<small class="badge bg-label-warning" style="font-size: 10px;">' + produk.tipe_produk + '</small>' +
                                    '</span>' +
                                    '<span class="text-muted">Rp.' + produk.harga + '</span>' +
                                    '</span>' +
                                    '<span class="custom-option-body">' +
                                    '<small class="option-text">' + produk.deskripsi + '</small>' +
                                    '</span>' +
                                    '</label>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                });
                $('#wizard-property-listing .row.g-3').html(productsHtml);
            }
        });
    });
});

</script>