<div class="container-fluid ">
    <div class="row">
        <div class="col-12 p-2">
            <h6>Order Status:</h6>
            <table class="text-center">
                <thead>
                <tr>
                    <th>In Process</th>
                    <th>Accepted</th>
                    <th>Picked Up</th>
                    <th>Delivered</th>
                    <th>Canceled</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="count-text-sm animated zoomIn" id="OrderInProcess">Order In Process</td>
                    <td class="count-text-sm animated zoomIn" id="OrderAccepted">Order Accepted</td>
                    <td class="count-text-sm animated zoomIn" id="OrderPicked">Order Picked Up</td>
                    <td class="count-text-sm animated zoomIn" id="OrderDelivered">Order Delivered</td>
                    <td class="count-text-sm animated zoomIn" id="OrderCanceled">Order Delivered</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white  card m-0 count-card p-4">
                <canvas id="myChart2" class="chart-height-340"></canvas>
            </div>
        </div>
    </div>
</div>



<script>
    OrderChartData();
    function OrderChartData(){
        let xValues = [];
        let yValues = [];
        axios.get("/OrderByDate").then((res)=>{

            if(res.status===200){
                res.data.forEach(function(item,index){
                    xValues.push(item.date)
                    yValues.push(item.total)
                });
                CreateOrderChart(xValues,yValues)
            }

            else{
                ErrorToast("Something Went Wrong")
            }

        }).catch((err)=>{
            ErrorToast("Something Went Wrong")
        })
    }


    function CreateOrderChart(xValues,yValues){
        Chart.defaults.font.size = 9;
        new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    label: "Last 15 Days",
                    bezierCurve : false,
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(171, 0, 125, 1)",
                    borderColor: "rgba(171, 0, 125, 1)",
                    data: yValues
                }]
            },
            options: {
                legend: {display: false},
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }
        });
    }


</script>
