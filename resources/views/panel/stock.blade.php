@extends('panel.layout.app')

@section('content')

    <!-- Update-Stock -->

    <div style="overflow: scroll" class="modal fade bd-example-modal-lg" id="update_product_modal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #E5E8E8;">
                <h5 class="modal-title" style="font-weight: bold; font-size: 25px !important; ">Stok Güncelle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #F8F9F9; padding: 30px;">
                <form id="update_stock">
                    <input type="hidden" name="id" id="update_id">
                    <div class="row mb-2">
                        <div class="form-group col-12">
                            <label for="brand_update" style="text-decoration: underline;">Ürün Adı</label>
                            <select name="brand" id="brand_update" class="form-control">
                                <option>Lütfen Marka seçiniz...</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                            <small id="nameHelp" class="form-text text-muted">Marka adını seçiniz.</small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-6">
                            <label for="name_update" style="text-decoration: underline;">Ürün Adı</label>
                            <input type="text" name="name" id="name_update" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">Ürün adını giriniz.</small>
                        </div>

                        <div class="form-group col-6">
                            <label for="no_update" style="text-decoration: underline;">Ürün Kodu</label>
                            <input type="text" name="no" id="no_update" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">Ürün kodunu giriniz.</small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-6">
                            <label for="name_update" style="text-decoration: underline;">Raf</label>
                            <input type="text" name="shelf" id="shelf_update" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">Raf adını giriniz.</small>
                        </div>

                        <div class="form-group col-6">
                            <label for="no_update" style="text-decoration: underline;">Stok</label>
                            <input type="text" name="stock" id="stock_update" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">STOK adını giriniz.</small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-6">
                            <label for="name_update" style="text-decoration: underline;">Birim</label>
                            <input type="text" name="unit" id="unit_update" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">BİRİM adını giriniz.</small>
                        </div>

                        <div class="form-group col-6">
                            <label for="no_update" style="text-decoration: underline;">Depo</label>
                            <input type="text" name="warehouse" id="warehouse_update" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">DEPO adını giriniz.</small>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <div class="modal-footer" style="background-color: #E5E8E8;">
                <button type="button" onclick="updateStock()" class="btn btn-primary">Kaydet</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>

    <!-- Create-Stock -->

    <div style="overflow: scroll" class="modal fade bd-example-modal-lg" id="create_product_modal"  role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #E5E8E8;">
                <h5 class="modal-title" style="font-weight: bold; font-size: 25px !important; ">Stok Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #F8F9F9;">
                <form id="create_stock">
                    <div class="row mb-2">
                        <div class="form-group col-12">
                            <label for="name_update" style="text-decoration: underline;">Marka Adı</label>
                            <select name="brand" id="brand" class="form-control">
                                <option>Lütfen marka seçiniz...</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                            <small id="nameHelp" class="form-text text-muted">Marka adını seçiniz.</small>
                        </div>
                    </div>
                    <div class="row mb-2">

                        <div class="form-group col-6">
                            <label for="name_update" style="text-decoration: underline;">Ürün Adı</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">Ürün adını giriniz.</small>
                        </div>

                        <div class="form-group col-6">
                            <label for="no_update" style="text-decoration: underline;">Ürün Kodu</label>
                            <input type="text" name="no" id="no" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">Ürün kodunu giriniz.</small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-6">
                            <label for="name_update" style="text-decoration: underline;">Raf</label>
                            <input type="text" name="shelf" id="shelf" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">Raf adını giriniz.</small>
                        </div>

                        <div class="form-group col-6">
                            <label for="no_update" style="text-decoration: underline;">Stok</label>
                            <input type="text" name="stock" id="stock" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">Stok sayınızı giriniz.</small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-6">
                            <label for="name_update" style="text-decoration: underline;">Birim</label>
                            <input type="text" name="unit" id="unit" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">Birim adını giriniz.</small>
                        </div>

                        <div class="form-group col-6">
                            <label for="no_update" style="text-decoration: underline;">Depo</label>
                            <input type="text" name="warehouse" id="warehouse" class="form-control">
                            <small id="nameHelp" class="form-text text-muted">Depo adını giriniz.</small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background-color: #E5E8E8;">
                <button type="button" onclick="createStock()" class="btn btn-success">Kaydet</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>

    <!-- Brands-Create -->

    <div style="overflow: scroll" class="modal fade bd-example-modal-lg" id="create_brand_modal"  role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #E5E8E8;">
                    <h5 class="modal-title" style="font-weight: bold; font-size: 25px !important; ">Stok Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #F8F9F9;">
                    <form id="create_brand">
                        <div class="row mb-2">
                            <div class="form-group col-6">
                                <label for="name_update" style="text-decoration: underline;">Marka - Model Ekle</label>
                                <input type="text" name="brand_name" id="brand_name" class="form-control">
                                <small id="nameHelp" class="form-text text-muted">Marka adını giriniz.</small>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="background-color: #E5E8E8;">
                    <button type="button" onclick="createBrand()" class="btn btn-success">Kaydet</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Ambar Takip</h2>
                            <button type="button"  class="btn btn-success" data-toggle="modal" data-target="#create_product_modal"><i class="fas fa-plus"></i> Ekle</button>
                            <button type="button"  class="btn btn-success" data-toggle="modal" data-target="#create_brand_modal"><i class="fas fa-plus"></i> Marka Ekle </button>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <table id="stockTable" class="display nowrap dataTable cell-border" style="width:100%">
                                    <thead>
                                    <th>Marka-Model</th>
                                    <th>Malzeme Adı</th>
                                    <th>Parça Numarası</th>
                                    <th>Raf Numarası</th>
                                    <th>Adet</th>
                                    <th>Birim</th>
                                    <th>Stok Yeri</th>
                                    <th>Güncelle</th>
                                    <th>Sil</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        function getInfo(id){
            var name = $('#name_update');
            var no = $('#no_update');
            var shelf = $('#shelf_update');
            var stock = $('#stock_update');
            var warehouse = $('#warehouse_update');
            var unit = $('#unit_update');
            var brand = $('#brand_update');
            $.ajax({
                type: 'GET',
                url: '{{route('product.get')}}',
                data: {id:id},
                success: function (data){
                    name.val(data.product.product_name);
                    no.val(data.product.product_no);
                    shelf.val(data.product.shelf);
                    stock.val(data.product.stock);
                    unit.val(data.product.unit);
                    warehouse.val(data.product.warehouse);
                    brand.val(data.product.brand_id);


                    $('#update_id').val(data.product.id);
                    $('#update_product_modal').modal('toggle');

                },
                error: function (data){
                    var errors = '';
                    for(datas in data.responseJSON.errors){
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',
                        html: 'Bir hata oluştu.\n'+errors,
                    });
                }
            });
        }

        function updateStock(){
            var formData = new FormData(document.getElementById('update_stock'));
            $.ajax({
                type: 'POST',
                url: '{{route('product.update')}}',
                data:formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData:false,
                success: function (){
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        html: 'Stok başarıyla güncellendi!'
                    });
                    $("#update_stock")[0].reset();

                    $('#update_product_modal').modal("toggle");
                    table.ajax.reload();

                },
                error: function (){
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',
                        html: 'Bilinmeyen bir hata oluştu.'
                    });

                }
            });
        }

        function createStock(){
            var formData = new FormData(document.getElementById('create_stock'));

            $.ajax({
                type: 'POST',
                url: '{{route('product.create')}}',
                data:formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData:false,
                success: function (){
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        html: 'Stok başarıyla oluşturuldu!'
                    });
                    $("#create_stock")[0].reset();
                    $('#create_product_modal').modal("toggle");
                    table.ajax.reload();

                },
                error: function (data){
                    var errors = '';
                    for(datas in data.responseJSON.errors){
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',
                        html: 'Bilinmeyen bir hata oluştu.\n'+errors,
                    });
                }
            });
        }

        function deleteStock(id){
            Swal.fire({
                icon: "warning",
                title:"Emin misiniz?",
                html: "Bu stoğu silmek istediğinize emin misiniz?",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: "Onayla",
                cancelButtonText: "İptal",
                cancelButtonColor: "#e30d0d"
            }).then((result)=>{
                if (result.isConfirmed){
                    $.ajax({
                        type: 'GET',
                        url: '{!! route('product.delete') !!}',
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function (){
                            Swal.fire({
                                icon: "success",
                                title:"Başarılı",
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                            table.ajax.reload();
                        },
                        error: function (){
                            Swal.fire({
                                icon: "error",
                                title:"Hata!",
                                html: "<div id=\"validation-errors\"></div>",
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                            $.each(data.responseJSON.errors, function(key,value) {
                                $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div>');
                            });
                        }
                    });
                }
            });
        }

        function createBrand(){
            var formData = new FormData(document.getElementById('create_brand'));

            $.ajax({
                type: 'POST',
                url: '{{route('brand.create')}}',
                data:formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData:false,
                success: function (){
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        html: 'Marka başarıyla oluşturuldu!'
                    });
                    $("#create_brand")[0].reset();
                    $('#create_brand_modal').modal("toggle");
                    table.ajax.reload();

                },
                error: function (data){
                    var errors = '';
                    for(datas in data.responseJSON.errors){
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',
                        html: 'Bilinmeyen bir hata oluştu.\n'+errors,
                    });
                }
            });
        }


        table = $('#stockTable').DataTable( {
            order: [
                [0,'DESC']
            ],
            processing: true,
            serverSide: true,

            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Turkish.json"
            },

            scrollX:true,
            type:'GET',
            scrollY:true,
            ajax: '{!!route('product.fetch')!!}',
            columns: [
                {data: 'marka'},
                {data: 'product_name'},
                {data: 'product_no'},
                {data: 'shelf'},
                {data: 'stock'},
                {data: 'unit'},
                {data: 'warehouse'},
                {data: 'updateButton'},
                {data: 'deleteButton'},
            ]
        } );

    </script>


@endsection
