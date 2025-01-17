@extends('Admin.Layout')
@section('content')
<script>
    function checkID() {
        var id = document.getElementById("idpro");
        var id_val = id.value;
        if (id_val == "") {
            id.classList.add("is-invalid");
            return false;
        } else {
            id.classList.remove("is-invalid");
            id.classList.add("is-valid");
            return true;
        }
    }

    function checkName() {
        var name_correct =
            /^[A-Za-z0-9\/@#$%^&*()\sAÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+$/;
        var name = document.getElementById("namepro");
        var name_val = document.getElementById("namepro").value;
        if (name_val == "" || name_correct.test(name_val) == false) {
            name.classList.add("is-invalid");
            return false;
        } else {
            name.classList.remove("is-invalid");
            name.classList.add("is-valid");
            return true;
        }
    }

    function checkCount() {
        var a = $("#countpro");
        var b = a.val();
        if (b <= 0) {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkCount() {
        var a = $("#countpro");
        var b = a.val();
        if (b <= 0 || !parseInt(b)) {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkGiaBanPro() {
        var a = $("#giabanpro");
        var b = a.val();
        if (b <= 0 || !parseInt(b)) {
            a.addClass("is-invalid");
            return false
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkGiaVonPro() {
        var a = $("#giavonpro");
        var b = a.val();
        if (b <= 0 || !parseInt(b)) {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkDanhMuc() {
        var a = $("#danhmucAddpro");
        var b = a.val();
        if (b === "Chọn danh mục") {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkTinhTrang() {
        var a = $("#tinhtrangAddpro");
        var b = a.val();
        if (b === "Chọn tình trạng") {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkImg() {
        var a = $("#imagepro");
        var b = a.val();
        if (b <= 0) {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function AddPro() {
        if (checkCount() == false || checkDanhMuc() == false || checkGiaBanPro() == false || checkGiaVonPro() == false || checkID() == false || checkImg() == false || checkName() == false || checkTinhTrang() == false) {
            alert("Vui lòng kiểm tra lại thông tin sản phẩm");
        } else {
            confirm("Thêm thành công !");

        }
    }
</script>

<div class="pagetitle">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 22px;">
            <li class="breadcrumb-item"><a href="{{ route('admin.product') }}">Quản lý sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
        </ol>
    </nav>
    <div style="background-color: white;padding:20px;border-radius:20px;box-shadow: 2px 2px 2px #FFCC99;">
        <!-- End Page Title -->
        <form method="post" id="AddProForm" action="{{ route('admin.createProduct') }}" enctype="multipart/form-data"
            class="row mt-4">
            @csrf
            <div class="form-group col-md-4">
                <label style="font-weight: bolder;" class="control-label">Tên sản phẩm</label>
                <input class="form-control" id="namepro" name="namepro" onclick="checkName()" onchange="checkName()"
                    type="text" required>
            </div>
            <div class="form-check ms-3">
                <label style="font-weight: bolder;" class="form-check-label">Sản phẩm hot</label>
                <input type="hidden" name="hotPro" value="0">
                <input type="checkbox" class="form-check-input" name="hotPro" value="1">
            </div>
            <div class="form-group col-md-4">
                <label style="font-weight: bolder;" class="control-label">Số lượng</label>
                <input class="form-control" onclick="checkCount()" onchange="checkCount()" name="countpro" id="countpro"
                    type="text" required>
            </div>
            <div class="form-group col-md-4">
                <label style="font-weight: bolder;" class="control-label mt-3">Giá bán(VND)</label>
                <input class="form-control" id="giabanpro" name="giabanpro" onclick="checkGiaBanPro()"
                    onchange="checkGiaBanPro()" type="text" required>
            </div>
            <div class="form-group  col-md-4">
                <label style="font-weight: bolder;" class="control-label mt-3">Giảm giá(%)</label>
                <input class="form-control" id="giavonpro" name="discount" type="text">
            </div>

            <div class="form-group col-md-3">
                <label style="font-weight: bolder;" class="control-label mt-3">Danh mục</label>
                <select class="form-control" onclick="checkDanhMuc()" onchange="checkDanhMuc()" id="danhmucAddpro"
                    required name="danhmucAddpro" required>
                    <option>Chọn danh mục</option>
                    @foreach ($category as $row )
                    <option>{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group ">
                <label style="font-weight: bolder;" class="control-label mt-3">Mô tả sản phẩm</label>
                <textarea id="mota" name="mota" class="form-control"> </textarea>
                <script type="text/javascript">
                    CKEDITOR.replace("mota");
                </script>
            </div>
            <div class="form-group col-md-12">
                <label style="font-weight: bolder;" class="control-label mt-3">Ảnh sản phẩm</label>
                <input class="form-control" multiple id="imagepro" name="imagepro[]" style="width:30%" type="file">
            </div>


            <button class="btn btn-success mt-4 ms-2" type="submit" id="buttonAddPro" style="width:10%" value="Thêm"
                name="addproduct"> Thêm
            </button>
        </form>

    </div>
</div>






<!-- ======= Footer ======= -->



<script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/translations/vi.js"> </script>
<style>
    .ck-editor__editable_inline {
        min-height: 250px;
        max-height: 450px;
    }
</style>
<script>
    ClassicEditor.create(document.querySelector('#mota'), {
            language: 'vi'
        })
        .then(editor => {})
        .catch(error => {
            console.error(error)
        });
</script>
@endsection