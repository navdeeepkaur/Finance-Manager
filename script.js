$(document).ready(function(){
  $.ajax({
    url: "http://localhost/finance/charts.php",
    method: "GET",
    data:{action:'fetch'},
		dataType:"JSON",
    success:
    function(data)
    {
    console.log(data);
    var category = [];
    var amount = [];
    var colors=[];
    var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };
    for(var i in data)
    {
        category.push(data[i].category);
        amount.push(data[i].amount);
        colors.push(dynamicColors());
    }
    var chartdata = {
    labels: category,
    datasets : [
    {
        label: 'Category',
        backgroundColor: colors,
        data: amount
    },
  ],

    options:{
      legend: {
        display:true,
      position: 'right'
    },
  },
    };
    var ctx = $("#mycanvas");
    var barGraph = new Chart(ctx, {
        type: 'doughnut',
        data: chartdata,
      });
    },
        error: function(data) {
        console.log(data);
    }
  });
});

 $(document).ready(function(){
  $.ajax({
    url: "http://localhost/finance/charts1.php",
    method: "GET",
    data:{action:'fetch'},
		dataType:"JSON",
    success:
    function(data)
    {
      console.log(data);
    var date = [];
    var amount2 = [];
    var colors=[];
    var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };
    for(var i in data)
    {
        date.push(data[i].date);
        amount2.push(data[i].amount2);
        colors.push(dynamicColors());
    }
    console.log(date);
    console.log(amount2);
    var chartdata = {
    labels: date,
    datasets : [
    {
        label:'date',
        backgroundColor: colors,
        data: amount2,
    },
  ],
    };
    var options={
    plugins: {
      legend: {
        display: false
      }
    },
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
};
    var ctx = $("#mycanvas2");
    var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: options,
      });
    },
        error: function(data) {
        console.log(data);
    }
  });
});


$(document).ready(function(){
  $.ajax({
    url: "http://localhost/finance/charts2.php",
    method: "GET",
    data:{action:'fetch'},
		dataType:"JSON",
    success:
    function(data)
    {
      console.log(data);
    var months = [];
    var amount3 = [];
    var colors=[];
    var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };
    for(var i in data)
    {
        var d=new Date();
        d.setMonth(data[i].months-1);
        months.push(d.toLocaleString([], { month: 'long' }));
        amount3.push(data[i].amount3);
        colors.push(dynamicColors());
    }


    var chartdata = {
    labels: months,
    datasets : [
    {
        label: 'Month',
        backgroundColor: colors,
        data: amount3
    },
  ],
  legend: {
  display: true,
  position: 'right'
},
    };

     var options={
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
};
    var ctx = $("#mycanvas1");
    var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: options,
      });
    },
        error: function(data) {
        console.log(data);
    }
  });
});


$(document).ready(function(){
  $.ajax({
    url: "http://localhost/finance/charts3.php",
    method: "GET",
    data:{action:'fetch'},
		dataType:"JSON",
    success:
    function(data)
    {
    console.log(data);
    var category = [];
    var amount = [];
    var colors=[];
    var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };
    for(var i in data)
    {
        category.push(data[i].category);
        amount.push(data[i].amount);
        colors.push(dynamicColors());
    }
    var chartdata = {
    labels: category,
    datasets : [
    {
        label: 'Category',
        backgroundColor: colors,
        data: amount
    },
  ],
  legend: {
  display: true,
  position: 'right'
},
    };

    var ctx = $("#mycanvas4");
    var barGraph = new Chart(ctx, {
        type: 'doughnut',
        data: chartdata,
      });
    },
        error: function(data) {
        console.log(data);
    }
  });
});


function off() {
  document.getElementById('form-container').style.display = "none";
}

function show() {
  document.getElementById('form-container').style.display = "inline";
}
