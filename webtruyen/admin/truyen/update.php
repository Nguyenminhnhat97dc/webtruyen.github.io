<?php
  $content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Update Truyện</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                                <div class="box-body">
                                  <div class="form-group">
                                    <label for="exampleInputName1">Tên Truyện</label>
                                    <input type="text" class="form-control" id="TenTruyen" placeholder="Enter Name">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Thể Loại</label>
                                    <input type="text" class="form-control" id="TheLoai" placeholder="Enter Thể Loại">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng Thái </label>
                                    <input type="text" class="form-control" id="TrangThai" placeholder="Trạng Thái Truyện">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName1">Giới Thiệu</label>
                                    <input type="text" class="form-control" id="GioiThieu" placeholder="Giới Thiệu">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName1">Tác Giả</label>
                                    <input type="text" class="form-control" id="TacGia" placeholder="Enter Tác Giả">
                                  </div>
                                    <label for="exampleInputName1">Link Ảnh</label>
                                    <input type="text" class="form-control" id="Anh" placeholder="Ảnh Truyện">
                                  </div>
                              </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="UpdatePhim()" value="Update"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
              
              include "../master.php";
?>

<script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "../api/truyen/read_single.php?id=<?php echo $_GET['id']; ?>",
            dataType: 'json',
            success: function(data) {
               $('#TenTruyen').val(data['TenTruyen']);
                $('#TheLoai').val(data['TheLoai']);
                $('#TrangThai').val(data['TrangThai']);
                $('#GioiThieu').val(data['GioiThieu']);
                $('#TacGia').val(data['TacGia']);
                $('#Anh').val(data['HinhAnh']);

            },
            error: function (result) {
                console.log(result);
            },
        });
    });
    function UpdatePhim(){
        $.ajax(
        {
            type: "POST",
            url: '../api/truyen/update.php',
            dataType: 'json',
            data: {
                IdTruyen: <?php echo $_GET['id']; ?>,
                TenTruyen: $("#TenTruyen").val(),
                TheLoai: $("#TheLoai").val(),        
                TrangThai: $("#TrangThai").val(),
                GioiThieu: $("#GioiThieu").val(),
                TacGia: $("#TacGia").val(),
                Anh: $("#Anh").val(),
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Updated Phim!");
                    window.location.href = '../truyen';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>