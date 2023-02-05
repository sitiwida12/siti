<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/cart/cart.css') }}">
    
    <title>Keranjang Belanja</title>
</head>
<body>
    <div class="brand-logo">
        <div class="container">
            <h2>Keranjang Belanja</h2>
        </div>
    </div>

    <section>
        <div class="container">
            <table  class="table table-borderless">
                <thead>
                    <tr>
                        <th class="col">Produk</th>
                        <th class="col">Harga Satuan</th>
                        <th class="col">Kuantitas</th>
                        <th class="col">Total Harga</th>
                        <th class="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle">
                        <td><img src="https://cf.shopee.co.id/file/9c6b39c6c0581c282b5affc876e5eebe" alt="..." class="img-thumbnail" width="10%">celana Polkadot</td>
                        <td>Rp. 150.000</td>
                        <td><button id="down" onclick="updateSpinner(this);" >-</button><input id="content" value="1" min="1" type="text" style="width:30px" /><button id="up" onclick="updateSpinner(this);">+</button></td>
                        <td>Rp. 150.000</td>
                        <td><button type="button" class="btn btn-danger btn-sm">Hapus</button></td>

                    </tr>
                </tbody>
            </table>

        </div>
    </section>


    {{-- check out --}}
    <div class="checkout-nav fixed-bottom bg-warning p-3">
        <div class="container-fluid ">
            <span>Total</span> 
            <h4 class="fw-bold">Rp. 150.000</h4>
            <button class="cobtn float-end">Check Out</button>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('/assets/js/cart/cart.js') }}"></script>

    <script>
//         function updateSpinner(obj)
// {
//     var contentObj = document.getElementById("content");
//     var value = parseInt(contentObj.value);
//     if(obj.id == "down") {
//         value--;
//     } else {
//         value++;
//     }
//     contentObj.value = value;
// } 
    </script>
</body>
</html>