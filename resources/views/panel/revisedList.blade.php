@extends('panel.layout.app')


@section('content')


    <!-- Create HTML -->

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form id="revised" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">İsim</label>
                                    <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="İsim">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Başlık</label>
                                    <input name="title" type="text" class="form-control" id="inputPassword4" placeholder="Başlık">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Revize Edilen</label>
                                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Kullanılan Malzemeler</label>
                                <input type="text" name="material_name" class="form-control" id="inputAddress2" placeholder="Kullanılan Malzemeler">
                            </div>

                            <div class="form-group">
                                <label for="date">Başlangıç Tarihi</label>
                                <input min="{{date('Y-m-d').'T'.date('H:i')}}" name="start_date" type="datetime-local" id="date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="date">Bitiş Tarihi</label>
                                <input name="finish_date" type="datetime-local" id="date" class="form-control">
                            </div>

                            <div class="custom-file">
                                <input multiple="true"  name="path[]" type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Resim seçiniz...</label>
                                <div class="invalid-feedback">Fotoğraf</div>
                            </div>
{{--                            <button type="submit" onclick="create()" class="btn btn-primary">Sign in</button>--}}
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="create()" class="btn btn-success">Ekle</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Update HTML -->

    <div class="modal fade bd-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form id="updateRevisedForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="hiddenID">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">İsim</label>
                                    <input type="text" name="name" class="form-control" id="updateName" placeholder="İsim">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Başlık</label>
                                    <input name="title" type="text" class="form-control" id="updateTitle" placeholder="Başlık">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Revize Edilen</label>
                                <textarea name="content" class="form-control" id="updateContent" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Kullanılan Malzemeler</label>
                                <input type="text" name="material_name" class="form-control" id="updateMaterial" placeholder="Kullanılan Malzemeler">
                            </div>

                            <div class="form-group">
                                <label for="date">Başlangıç Tarihi</label>
                                <input min="{{date('Y-m-d').'T'.date('H:i')}}" name="start_date" type="datetime-local" id="updateStartDate" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="date">Bitiş Tarihi</label>
                                <input name="finish_date" type="datetime-local" id="UpdateFinishDate" class="form-control">
                            </div>

                            <div class="custom-file">
                                <input multiple="true" name="path[]" type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Resim seçiniz...</label>
                                <div class="invalid-feedback">Fotoğraf</div>
                            </div>
                            {{--                            <button type="submit" onclick="create()" class="btn btn-primary">Sign in</button>--}}
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="updateRevised()" class="btn btn-success">Ekle</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Detail HTML -->

    <div class="modal fade bd-example-modal-lg" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form id="detailRevisedForm">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">İsim</label>
                                <label for="formGroupExampleInput" id="detailName"></label>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Başlık</label>
                                <label for="formGroupExampleInput" id="detailTitle"></label>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Revize Edilen</label>
                                <label for="exampleFormControlTextarea1" id="detailContent"></label>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Kullanılan Malzemeler</label>
                                <label for="exampleFormControlTextarea1" ></label>
                            </div>
                            <div class="form-group">
                                <p>
                                    <label for="date">Başlangıç Tarihi</label>
                                <!--<input disabled min="{{date('Y-m-d').'T'.date('H:i')}}" name="start_date" type="datetime-local" id="date"> -->
                                    <label for="date" id="detailStartDate"></label>
                                </p>
                                <p>
                                    <label for="date">Bitiş Tarihi</label>
                                    <!--  <input disabled name="finish_date" type="datetime-local" id="detailFinishDate"> -->
                                    <label for="date" id="detailFinishDate"></label>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Fotoğraf</label>
                                <input disabled name="path" type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Revize Edilenler</h2>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Ekle</button>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                        <tr>
                                            <th>Zaman</th>
                                            <th>Kişi</th>
                                            <th>Başlık</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($revised as $reviseds)
                                            <tr>
                                                <td>{{$reviseds -> start_date}}</td>
                                                <td>{{$reviseds -> name}}</td>
                                                <td>{{$reviseds -> title}}</td>
                                                <td><button onclick="getDetailRevised({{$reviseds -> id}})" type="button" class="btn btn-outline-primary">Detay</button>
                                                    <button onclick="getRevised({{$reviseds -> id}})" type="button" class="btn btn-outline-success">Güncelle</button>
                                                    <button onclick="deleteRevised({{$reviseds ->id}})" type="button" class="btn btn-outline-danger">Sil</button></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $(`meta[name="csrf-token"]`).attr('content')
                }
            });
        });
    </script>


    <!-- Create Revised -->
    <script>
        function create(){
            var formData = new FormData(document.getElementById('revised'));
            $.ajax({
                type: 'POST',
                url: '{{route('createRevised')}}',
                data:formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData:false,
                success: function (){

                    $("#exampleModal").modal("toggle");
                    window.location.reload();
                    $("#revised")[0].reset();

                },
                error: function (data){
                    alert('başarısız')
                }
            });
        }
    </script>

    <!-- Delete Revised -->

    <script>
        function deleteRevised(id){
            Swal.fire({
                icon: "warning",
                title:"Emin misiniz?",
                html: "Bu duyuruyu silmek istediğinize emin misiniz?",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: "Onayla",
                cancelButtonText: "İptal",
                cancelButtonColor: "#e30d0d"
            }).then((result)=>{
                if (result.isConfirmed){
                    var formData = new FormData();
                    formData.append('id',id);
                    formData.append('_token','{{csrf_token()}}');
                    $.ajax({
                        type: 'POST',
                        url: '{{route('delete.Revised')}}',
                        data:formData,
                        dataType: "json",
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function (){
                            $("#detailRevisedForm")[0].reset();
                            window.location.reload();
                        },
                        error: function (data){
                            alert('başarısız')
                        }
                    });
                }
            });
        }
    </script>



    <!-- Update Revised -->
    <script>
        function getRevised(id){
            var formData = new FormData();
            formData.append('id',id);
            formData.append('_token','{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{route('get.Revised')}}',
                data:formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData:false,
                success: function (data){
                    //window.location.reload();
                    console.log(data);
                    $('#updateName').val(data.revised.name);
                    $('#updateTitle').val(data.revised.title);
                    $('#updateContent').val(data.revised.content);
                    $('#updateMaterial').val(data.revised.material_name);
                    $('#updateStartDate').val(data.revised.start_date);
                    $('#updateFinishDate').val(data.revised.finish_date);
                    $('#hiddenID').val(data.revised.id);
                    $('#updateModal').modal('toggle');
                },
                error: function (data){
                    alert('başarısız')
                }
            });
        }
        function updateRevised(){
            var formData = new FormData(document.getElementById('updateRevisedForm'));
            //formData.append('id',id);
            formData.append('_token','{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{route('update.Revised')}}',
                data:formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData:false,
                success: function (){
                    window.location.reload();
                },
                error: function (data){
                    alert('başarısız')
                }
            });
        }
    </script>


    <!-- Detail Revised -->
    <script>
        function getDetailRevised(id){
            var formData = new FormData();
            formData.append('id',id);
            formData.append('_token','{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{route('get.Revised')}}',
                data:formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData:false,
                success: function (data){
                    //window.location.reload();
                    console.log(data);
                    $('#detailName').html(data.revised.name);
                    $('#detailTitle').html(data.revised.title);
                    $('#detailContent').html(data.revised.content);
                    $('#detailStartDate').html(data.revised.start_date);
                    $('#detailFinishDate').html(data.revised.start_date);
                    $('#detailModal').modal('toggle');
                },
                error: function (data){
                    alert('başarısız')
                }
            });
        }
    </script>

@endsection
