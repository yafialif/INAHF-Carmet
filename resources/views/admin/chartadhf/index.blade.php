@extends('admin.layouts.master')

@section('content')

     <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">ADHF Board</div>
        </div>
        <div class="portlet-body">
            <div class="row">
            <div class="col-md-6" id="">
            <canvas id="adhf_gender" style="width:100%;"></canvas>
            </div>
            <div class="col-md-6" id="">
            <canvas id="adhfRs" style="width:100%;"></canvas>
            </div>
            <div class="col-md-6" id="">
            <canvas id="age" style="width:100%;"></canvas>
            </div>
            <div class="col-md-6" id="">
            <canvas id="insurance" style="width:100%;"></canvas>
            </div>
            <div class="col-md-6" id="">
            <canvas id="education" style="width:100%;"></canvas>
            </div>

            </div>
        </div>
	</div>

@endsection
@section('javascript')

<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script>
  var base_url = window.location.origin;
var settings = {
  "url": base_url+"/api/chartadhf",
  "method": "GET",
  "timeout": 0,
  "headers": {
    "api_token": "0ac16a192f1869cc03db0e457b7d9441760f21cebb9e53e66032af23c4b2d8bc",
    "Content-Type": "application/json"
  },
};

$.ajax(settings).done(function (response) {
  console.log(response);
  const dataAdhfGender = response[0];

  new Chart(
    document.getElementById('adhf_gender'),
    {
      type: 'pie',
      data: {
        labels: dataAdhfGender.map(row => row.gender),
        datasets: [
          {
            label: 'Data Gender',
            data: dataAdhfGender.map(row => row.total),
            // borderColor: '#FF6384',
            backgroundColor: [
                        '#ff6384','#36a2eb'
    ]
          }
        ]
      }
    }
  );
  const dataRs = response[1];
new Chart(
    document.getElementById('adhfRs'),
    {
      type: 'bar',
      data: {
        labels: dataRs.map(row => row.name_of_rs),
        datasets: [
          {
            label: 'Patient in Hospital',
            data: dataRs.map(row => row.total),
            // borderColor: '#FF6384',
            backgroundColor: [
                        '#ff6384','#36a2eb'
            ]
          }
        ]
      },
      options: {
    scales: {
     yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
  },
    }
  );
//   Age
const age = response[2];
new Chart(
    document.getElementById('age'),
    {
      type: 'line',
      data: {
        labels: age.map(row => row.age),
        datasets: [
          {
            label: 'age',
            data: age.map(row => row.age),
            // borderColor: '#FF6384',
            // backgroundColor: [
            //             '#ff6384','#36a2eb'
            // ]
          }
        ]
      },
      options: {
    scales: {
     yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
  },
    }
  );

//   Insurance
const insurance = response[3];
new Chart(
    document.getElementById('insurance'),
    {
      type: 'bar',
      data: {
        labels: insurance.map(row => row.insurance),
        datasets: [
          {
            label: 'insurance',
            data: insurance.map(row => row.total),
            // borderColor: '#FF6384',
            backgroundColor: [
                        '#ff6384','#36a2eb'
            ]
          }
        ]
      },
      options: {
    scales: {
     yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
  },
    }
  );
//   Education
const education = response[4];

  new Chart(
    document.getElementById('education'),
    {
      type: 'pie',
      data: {
        labels: education.map(row => row.education),
        datasets: [
          {
            label: 'education',
            data: education.map(row => row.total),
            // borderColor: '#FF6384',
            backgroundColor: [
                        '#ff6384','#36a2eb'
    ]
          }
        ]
      }
    }
  );

});
  

</script>
@endsection