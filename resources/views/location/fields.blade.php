{{--Datatables--}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css"/>

<!-- Tanggal Field -->
<div class="form-group col-sm-4">
    <label for="kodelokasi">Kode Lokasi:</label>
    <div class="form-group input-group">
        <input type="search" class="form-control" placeholder="Masukan kode lokasi" id="inputLokasi">
        <span class="input-group-append">
                    <button type="submit" class="btn btn-primary" id="btnSearchLoc" onclick="searchLokasi()"><i class="fas fa-search"></i></button>
                  </span>
    </div>
</div>

<div class="form-group col-sm-4">
    <label for="barcode">Barcode:</label>
    <div class="form-group input-group">
        <input type="search" class="form-control" placeholder="Masukan kode barcode" id="inputBarcode">
        <span class="input-group-append">
                    <button type="submit" class="btn btn-primary" id="btnSearchBarcode" onclick="searchBarcode()"><i class="fas fa-search" ></i></button>
                  </span>
    </div>
</div>

