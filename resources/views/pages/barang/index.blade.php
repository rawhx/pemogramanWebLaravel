<!DOCTYPE html>
<html lang="en">
  @include('components.head')
  <body>
    <div class="wrapper">
        @include('components.navigation', ['activePage' => 'barang'])
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Produk | Barang</h3>
                <h6 class="op-7 mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, dolorem?</h6>
              </div>
            </div>  
            <div class="row">
              <div class="col-12" id="form" style="display: none">
                <div class="card">
                  <form id="formBarang">
                    <div class="card-header">
                      <div class="card-title">Form</div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="barang_nama" id="barang_nama" placeholder="Masukkkan nama kategori">
                      </div>
                      <div class="form-group">
                        <label for="nama">Harga</label>
                        <input type="text" class="form-control" name="barang_harga" id="barang_harga" placeholder="Masukkkan nama kategori">
                      </div>
                      <div class="form-group">
                        <label for="nama">Kategori</label>
                        <select class="form-select form-control" name="barang_kategori" id="barang_kategori" style="width: 100%;"></select>
                      </div>
                    </div>
                    <div class="card-action">
                      <button id="submitBarang" class="btn btn-success">Submit</button>
                      <button type="button" class="btn btn-danger" onclick="onCancel()">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-12" id="dataView">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="card-title">Data</div>
                      <button class="btn btn-primary" onclick="openForm()">
                        <i class="fas fa-plus-square" style="font-size: 20px"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="data" class="display table table-striped table-hover w-full">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th style="width: 140px">Aksi</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        @include('components.footer')
      </div>
    </div>
    @include('pages.barang.javascript')
    
    @include('components.javascript')   
  </body>
</html>
