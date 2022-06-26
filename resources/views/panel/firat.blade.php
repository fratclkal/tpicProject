<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deneme</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</head>
<body>

    <section style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Firat <a href="#" class="btn-success" data-toggle="modal" data-target="#firatModal">Ekle</a>
                        </div>
                        <div class="card-body">
                            <table id="firatTable" class="table">
                                <thead>
                                <tr>
                                    <th>İsim</th>
                                    <th>Başlık</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarihi</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($firat as $firats)
                                    <tr id="sid{{$firats -> id}}">
                                        <td>{{$firats -> name}}</td>
                                        <td>{{$firats -> title}}</td>
                                        <td>{{$firats -> start_date}}</td>
                                        <td>{{$firats -> finish_date}}</td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="updateFirat({{$firats -> id}})" class="btn btn-info">Güncelle</a>
                                            <a href="javascript:void(0)" onclick="deleteFirat({{$firats -> id}})" class="btn btn-danger">Sil</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Add Modal -->
    <div class="modal fade" id="firatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="firatForm" method="POST">

                        @csrf
                        <div class="form-group">
                            <label for="name">İsim: </label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="title">Başlık: </label>
                            <input type="text" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Başlangıç Tarihi: </label>
                            <input type="datetime-local" class="form-control" id="start_date">
                        </div>
                        <div class="form-group">
                            <label for="finish_date">Bitiş Tarihi: </label>
                            <input type="datetime-local" class="form-control" id="finish_date">
                        </div>


                    </form>
                    <button onclick="updateFirat()" type="submit" class="btn btn-primary">Ekle</button>
                </div>

            </div>
        </div>
    </div>


    <!--Update Modal -->
    <div class="modal fade" id="firatUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="firatUpdateForm" method="POST">

                        @csrf

                        <input type="hidden" id="id" name="id">

                        <div class="form-group">
                            <label for="name">İsim: </label>
                            <input type="text" class="form-control" id="name2">
                        </div>
                        <div class="form-group">
                            <label for="title">Başlık: </label>
                            <input type="text" class="form-control" id="title2">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Başlangıç Tarihi: </label>
                            <input type="datetime-local" class="form-control" id="start_date2">
                        </div>
                        <div class="form-group">
                            <label for="finish_date">Bitiş Tarihi: </label>
                            <input type="datetime-local" class="form-control" id="finish_date2">
                        </div>
                    </form>
                    <button onclick="updateFirat()" type="submit" class="btn btn-primary">Ekle</button>
                </div>

            </div>
        </div>
    </div>





    <script>
        $("#firatForm").submit(function (e){
           e.preventDefault();

           let name = $("#name").val();
           let title = $("#title").val();
           let start_date = $("#start_date").val();
           let finish_date = $("#finish_date").val();
           let _token = $("input[name = _token]").val();

           $.ajax({
              url: "{{route('add.firat')}}",
               type: "POST",
               data: {
                   name:name,
                   title:title,
                   start_date:start_date,
                   finish_date:finish_date,
                   _token:_token
               },
               success:function (response){
                  if (response){
                      $("#firatTable tbody").prepend('<tr><td>'+ response.name +'</td><td>'+ response.title +'</td><td>'+ response.start_date +'</td><td>'+ response.finish_date +'</td></tr>');
                      $("#firatForm")[0].reset();
                      $("#firatModal").modal('hide');
                  }
               },
               error: function (data){
                   alert('başarısız')
               }
           });
        });
    </script>


    <script>
        function updateFirat(id){
            $.get('/firat/' . id , function (firat){
               $("#id").val(firat.id);
                $("#name2").val(firat.name);
                $("#title2").val(firat.title);
                $("#start_date2").val(firat.start_date);
                $("#finish_date2").val(firat.finish_date);
                $("#firatUpdateModal").modal('toggle');

            });
        }

        $('#firatUpdateForm').submit(function (e){
            e.preventDefault();
            let id = $('#id').val();
            let name = $('#name2').val();
            let title = $('#title2').val();
            let start_date = $('#start_date2').val();
            let finish_date = $("#finish_date2").val();
            let _token = $('input[name = _token]').val();

            $.ajax({
               url:"{{route('update.firat')}}",
                type:"POST",
                data:{
                    id:id,
                    name:name,
                    title:title,
                    start_date:start_date,
                    finish_date:finish_date,
                    _token:_token
                },
                success:function (response){
                   $('#sid' + response.id + ' td:nth-child(1)').text(response.name);
                   $('#sid' + response.id + ' td:nth-child(2)').text(response.title);
                   $('#sid' + response.id + ' td:nth-child(3)').text(response.start_date);
                   $('#sid' + response.id + ' td:nth-child(4)').text(response.finish_date);
                   $('#firatUpdateModal').modal('toggle');
                   $('#firatUpdateForm')[0].reset();
                }
            });
        });
    </script>

    <script>
        function deleteFirat(id){
            if(confirm("Silmek İstediğinizden Emin misiniz ?")){
                $.ajax({
                    url:'/index/'+id,
                    type:'DELETE',
                    data:{
                        _token: $("input[name= _token]").val()
                    },
                    success:function (response){
                        $("#sid" + id).remove();
                    }
                });

            }
        }
    </script>

</body>
</html>
