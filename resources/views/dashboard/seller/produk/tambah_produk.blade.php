@extends('dashboard.seller.layout.header')
@section('mycss')
<link rel="stylesheet" href="assets/css/dashboard/produk/tbh-produk.css">
{{-- <link rel="stylesheet" href="assets/dist/css/demo.css">
<link rel="stylesheet" href="assets/dist/css/dropify.min.css"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="/assets/jqte/jquery-te-1.4.0.css">
@endsection
@section('contents')
    {{-- Main Content --}}


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

        </div>

        <!-- Content Row -->

        <div class="row">
            <form method="POST" action="/dashboard/produk" class="d-block w-100" enctype="multipart/form-data">

                @csrf
               

                {{-- <input type="file" name="gambar" id="gambar" class="my-pond"> --}}
                <div class="row">

                    <div style="width: 200px" class="my-3 mx-3">
                        <input type="file" name="images1" id="input-file-french-2" class="dropify-fr " data-height="150" />
                    </div>
                    <div style="width: 200px" class="my-3 me-3">
                        <input type="file" name="images2" id="input-file-french-2" class="dropify-fr " data-height="150" />
                    </div>
                    <div style="width: 200px" class="my-3 mx-3">
                        <input type="file" name="images3" id="input-file-french-2" class="dropify-fr " data-height="150" />
                    </div>
                </div>
                {{-- foto --}}


             

                <div class="form-group">
                    <label for="judul_produk">Judul Produk</label>
                    <input type="text" class="form-control" name="judul_produk" placeholder="Judul Produk">
                    
                </div>
                <div class="row my-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="harga">Harga Barang</label>
                            <input type="text" name="harga" class="form-control" name="harga" placeholder="Harga"  class="w-100">
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Stok Barang</label>
                        <input type="number" name="stock" id="" class="form-control w-100">
                    </div>
                    <div class="col">
                        <label for="">Berat barang (gram)</label>
                        <input type="number" name="weight" id="" class="form-control w-100">
                    </div>

                </div>

                <input name="deskripsi_produk" type="text" class="j" name="deskripsi_produk" placeholder="Deskripsi Produk">

                <button type="submit" class="btn btn-primary w-100 my-2">Tambah Produk</button>

            </form>
        </div>

        

    </div>
    <!-- /.container-fluid -->

</div>
{{-- End of Main Content --}}
@endsection

@section('setjs')

{{-- <script src="{{ asset('/js/dashboard/tbh_produk.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/assets/jqte/jquery-te-1.4.0.min.js"></script>




<script>

// $(document).ready(function() {
//   $('#summernote').summernote({
//     toolbar: [
//             // [groupName, [list of button]]
//             ['style', ['bold', 'italic', 'underline', 'clear']],
//             ['font', ['strikethrough', 'superscript', 'subscript']],
//             ['para', ['ul', 'ol', 'paragraph']]
//         ],
//     placeholder: 'Deskripsi Produk',
//     spellCheck: true,
//     height: 300,                
//     minHeight: 300,            
//     maxHeight: null,            
//     focus: true 
//   });
// });
$(document).ready(function() {
$('.j').jqte({
        indent: false,
		
 });

 
	
	// settings of status
	// var jqteStatus = true;
	// $(".status").click(function()
	// {
	// 	jqteStatus = jqteStatus ? false : true;
	// 	$('.jqte-test').jqte({"status" : jqteStatus})
	// });

});

</script>
<script>
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Upload Gambar',
                replace: 'Reupload Gambar',
                remove:  'Hapus',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>



@endsection