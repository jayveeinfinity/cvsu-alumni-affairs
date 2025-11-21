@extends('layouts.admin')

@section('title')
    Reports &sdot;
@endsection

@section('main-content-header')
<div class="content-header" style="background-image: url('{{ config('r2.endpoint') }}/images/backgrounds/bg-alumni.webp'); background-size: cover; background-position: 100% 60%; background-repeat: no-repeat;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a class="badge badge-primary float-sm-left mb-3" href="{{ route('admin.dashboard') }}"><i class="fas fa-arrow-alt-circle-left"></i> Back to admin dashboard</a>
                <br><br><br><br>
                <h1 class="m-0 text-white" style="text-shadow: 4px 4px 6px #838383;"><i class="fas fa-file-excel"></i> Reports</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb px-3 elevation-1 bg-white float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Reports</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main-content')
<div class="content">
    <div class="container-fluid">
        <div class="row pt-3">
            <!-- <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="w-100 card-title">Alumni Profiles (0)</h3>
                        <div class="w-100 d-flex flex-row-reverse" style="gap: 1rem;">
                            <button class="btn btn-outline-success" href="javascript:void(0)" data-click="importExcelFile"><i class="fas fa-file-excel" data-click="importExcelFile"></i> Export from excel</button>
                            <span class="btn btn-outline-success" style="display: none;" data-loading="import"><i class="fas fa-compact-disc fa-spin"></i> Importing...</span>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div> -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                        <h3 class="card-title">Alumni per status</h3>
                            <a href="javascript:void(0);" data-download="chart" data-id="graduatesChart">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="alumniPerStatus" height="400" width="625" style="display: block; width: 625px; height: 200px;" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script>
  var ctx = document.getElementById('alumniPerStatus').getContext('2d');
  var alumniPerStatus = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($chartData['labels']),
            datasets: [{
                    label: 'Alumni Status Count',
                    data: @json($chartData['counts']),
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1,
                }
            ]
        },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });

  document.addEventListener("click", (e) => {
    e = e || window.event;
    var target = e.target || e.srcElement;
    switch(target.dataset.download) {
      case "chart":
        downloadChartAsPDF(target.dataset.id);
        break;
    }
  });

  function downloadChartAsPDF(chartId) {
    const chartContainer = document.getElementById(chartId);
    
    // Use html2canvas to capture the chart as an image
    html2canvas(chartContainer, { scale: 1 }).then((canvas) => {
        const imgData = canvas.toDataURL('image/png');
        
        // Create a new PDF document
        const pdf = new jsPDF('portrait', 'mm', 'a4');

        // Add a header to the PDF
        const headerText = chartId == "graduatesIndustriesChart" ? "Graduates per industries" : "Graduates per year" ;
        pdf.setFontSize(16);
        pdf.text(headerText, 10, 20); 
        
        // Calculate width and height to fit the image on A4
        const pdfWidth = pdf.internal.pageSize.width;
        const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

        // Set position for the image below the header
        const imageYPosition = 30;

        // Add the image to the PDF
        pdf.addImage(imgData, 'PNG', 0, imageYPosition, pdfWidth, pdfHeight);

        // Save the PDF
        pdf.save(chartId + '-chart.pdf');
    });
  }
</script>
@endsection