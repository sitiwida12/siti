@extends('dashboard.seller.layout.header')
@section('contents')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pendapatan (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if ($pbulan[0] !== null)
                                                    Rp. {{$pbulan[0]}}
                                                @else
                                                    Rp. 0
                                                @endif
                                               
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if ($ptahun[0] !== null)
                                                    Rp. {{$ptahun[0]}}
                                                @else
                                                    Rp. 0
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Products
                                            </div>
                                            
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                @if ($tproduk[0] == null)
                                                    0
                                                @else
                                                    {{$tproduk[0]['TotalProduk']}}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Delivery</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if ($pendingsend[0] !== null)

                                                    {{$pendingsend[0]}}

                                                @else

                                                    0

                                                @endif
                                        </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pendapatan Saya</h6>
                                   
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                      
                                        <canvas id="myChart" style="width: inherit; height:inherit;"></canvas>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection
@section('setjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script> 
        // function dataset(){ 



        const kon = {!! $coba !!};
        let getdata = [];
        let gettotal = []; 

        $.each(kon, function(key, val) {
            // console.log(val['earnMonth']);
            // getdata +="'"+ val['earnMonth'] + "'" + ":" + val['TotalSales'] +",";
            getdata.push(val['earnMonth']);
            gettotal.push(val['TotalSales']);
            // console.log(Object.assign(getdata,gettotal));
            // gettotal.push(val['TotalSales']);
        });

        console.log(gettotal);
        let key = getdata;
        let v = gettotal;
        const obj = {};

        key.forEach((element, index) => {
            obj["'"+element+"'"] = v[index];
        });

        // const res = ard.reduce((ard,hh)=> (hh[ard]=ard,hh),{});
        // const res =  Object.assign({}, ["a","b","c"].map(key,) => ({[key]: })));
        console.log(obj);
        // console.log(JSON.stringify( {!! $coba !!} ));
        return obj;
        // // return getdata.slice(0, -1);


        // };



    

</script>
<script>

  const labels = [
    'January', 
    'February', 
    'March', 
    'April', 
    'May', 
    'June', 
    'July', 
    'August', 
    'September', 
    'October', 
    'November', 
    'December'
  ];

  function datagraph() {
    

    const kon = {!! $coba !!};
        let getdata = [];
        let gettotal = []; 
        
        $.each(kon, function(key, val) {
           
            getdata.push(val['earnMonth']);
            gettotal.push(parseInt(val['TotalSales']));
           
        });

        console.log(gettotal);
        let key = getdata;
        let v = gettotal;
        const obj = {};

        key.forEach((element, index) => {
            obj[element] = v[index];
        });

        // console.log(obj);
  
        return obj;
  };

  function getYear() {
    const d = new Date();
    let year = d.getFullYear();

    return year;
  }


  const data = {
    labels: labels,
    datasets: [{
      label: getYear(),
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data:  datagraph() 
    }]
  };


    //   const data = {
    //     labels: labels,
    //     datasets: [{
    //       label: 'My First dataset',
    //       backgroundColor: 'rgb(255, 99, 132)',
    //       borderColor: 'rgb(255, 99, 132)',
    //       data: {
    //                 'January': 20, 
    //                 'June' : 10, 
    //                 'September': 30},
    //     }]
    //   };







  const config = {
    type: 'line',
    data: data,
    options: {}
  };
</script>
<script>
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
</script>
@endsection