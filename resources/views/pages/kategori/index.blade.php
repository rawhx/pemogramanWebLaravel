<!DOCTYPE html>
<html lang="en">
  @include('components.head')
  <body>
    <div class="wrapper">
        @include('components.navigation', ['activePage' => 'kategori'])
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Produk | Kategori</h3>
                <h6 class="op-7 mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, dolorem?</h6>
              </div>
            </div>  
            <div class="row">
              <div class="col-12 col-lg-6">
                <div class="card">
                  <form id="formKategori">
                    <div class="card-header">
                      <div class="card-title">Form</div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="kategori_nama" id="kategori_nama" placeholder="Masukkkan nama kategori">
                      </div>
                    </div>
                    <div class="card-action">
                      <button id="submitKategori" class="btn btn-success">Submit</button>
                      <button type="button" class="btn btn-danger" onclick="onCancel()">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Data</div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="data" class="display table table-striped table-hover w-full">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th style="width: 180px">Aksi</th>
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
    @include('pages.kategori.javascript')
    
    @include('components.javascript')   
  </body>
</html>
