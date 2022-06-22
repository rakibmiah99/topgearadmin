<div class="container-fluid m-0 px-2 ">
    <div class="row px-2 pb-2">
        <div class="col-md-2 p-1 d-none text-center">
            <div class="bg-white d-none  card count-card p-4">
                <h2 class="m-0 count-text animated zoomIn p-0" id="Visitors">..</h2>
                <p class="m-2 count-sub-text p-0">Visitor</p>
            </div>
        </div>
        <div class="col-md-2 p-1 text-center">
            <div class="bg-white card  count-card p-4">
                <h2 class="m-0 count-text animated zoomIn p-0" id="otp">..</h2>
                <p class="m-2 count-sub-text p-0">OTP</p>
            </div>
        </div>
        <div class="col-md-2  d-none p-1 text-center">
            <div class="bg-white card  count-card p-4">
                <h2 class="m-0 count-text animated zoomIn p-0" id="notification">..</h2>
                <p class="m-2 count-sub-text p-0"> Notification </p>
            </div>
        </div>
        <div class="col-md-2 p-1 text-center">
            <div class="bg-white card  count-card p-4">
                <h2 class="m-0 count-text animated zoomIn p-0" id="product">..</h2>
                <p class="m-2 count-sub-text p-0">Product</p>
            </div>
        </div>
        <div class="col-md-2 p-1 text-center">
            <div class="bg-white card  count-card p-4">
                <h2 class="m-0 count-text animated zoomIn p-0" id="user">..</h2>
                <p class="m-2 count-sub-text p-0">User's</p>
            </div>
        </div>
        <div class="col-md-2 p-1 text-center">
            <div class="bg-white card count-card p-4">
                <h2 class="m-0 count-text animated zoomIn  p-0" id="image">..</h2>
                <p class="m-2 count-sub-text p-0">Gallery</p>
            </div>
        </div>
        <div class="col-md-2 p-1 text-center">
            <div class="bg-white card  count-card p-4">
                <h2 class="m-0 count-text animated zoomIn p-0" id="blog">..</h2>
                <p class="m-2 count-sub-text p-0"> Blog</p>
            </div>
        </div>
        <div class="col-md-2 p-1 text-center">
            <div class="bg-white card count-card p-4">
                <h3 class="m-0 count-text animated zoomIn p-0" id="service">..</h3>
                <p class="m-2 count-sub-text p-0">Service</p>
            </div>
        </div>
    </div>

    <div class="row">
       <div class="col-md-12">
           <div class="bg-white  card m-0 count-card p-4">
               <canvas id="myChart" class="chart-height-340"></canvas>
           </div>
       </div>
   </div>


</div>

<script>

    VisitorChartData();
    function VisitorChartData(){
        let xValues = [];
        let yValues = [];
        axios.get("/VisitorByDate").then((res)=>{

            if(res.status===200){
                res.data.forEach(function(item,index){
                    xValues.push(item.date)
                    yValues.push(item.total)
                });
                CreateVisitorChart(xValues,yValues)
            }

            else{
                ErrorToast("Something Went Wrong")
            }

        }).catch((err)=>{
            ErrorToast("Something Went Wrong")
        })
    }

    function CreateVisitorChart(xValues,yValues){




        Chart.defaults.font.size = 9;
        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    label: "Last 15 Days",
                    bezierCurve : false,
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "rgb(255,208,241)",
                    borderColor: "rgba(171, 0, 125, 1)",
                    data: yValues
                }]
            },
            options: {
                legend: {display: false}
            }
        });
    }


</script>
