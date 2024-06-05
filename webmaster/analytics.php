<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="robots" content="noindex" />
        <title></title>
        <script src="script/components-initialization.js" type="text/javascript"></script>
        <script>
            if(sessionStorage.getItem("fullname") === null){
                //alert("");
            }
        </script>
    </head>
    <body>
        <?php
            include('../config/database/connection.php');

            function totalVisits($link)
            {
                $query = "SELECT * FROM visitor";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
            function uniqueVisits($link)
            {
                $query = "SELECT DISTINCT ip FROM visitor";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
            function Transactions($link)
            {
                $query = "SELECT DISTINCT id FROM purchase";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return 0 + mysqli_num_rows($result);
                }
            }
            function Revenue($link)
            {
                $revenue = 0.00;

                $query = "SELECT SUM(item.price) AS revenue FROM purchase INNER JOIN item ON item.id LIKE purchase.itemID";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return $revenue + mysqli_fetch_assoc($result)['revenue'];
                }
            }
            function sixthMonth()
            {
                $month = date('M y');
                return $month;
            }
            function fifthMonth()
            {
                $month = date('M y', strtotime('-1 month', time()));
                return $month;
            }
            function fourthMonth()
            {
                $month = date('M y', strtotime('-2 month', time()));
                return $month;
            }
            function thirdMonth()
            {
                $month = date('M y', strtotime('-3 month', time()));
                return $month;
            }
            function secondMonth()
            {
                $month = date('M y', strtotime('-4 month', time()));
                return $month;
            }
            function firstMonth()
            {
                $month = date('M y', strtotime('-5 month', time()));
                return $month;
            }
            function totalOfCustomersOnSixthMonth($link)
            {
                $query = "SELECT * FROM account WHERE DATE_FORMAT(added, '%b %y') = '".sixthMonth()."'";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
            function totalOfCustomersOnFifthMonth($link)
            {
                $query = "SELECT * FROM account WHERE DATE_FORMAT(added, '%b %y') = '".fifthMonth()."'";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
            function totalOfCustomersOnFourthMonth($link)
            {
                $query = "SELECT * FROM account WHERE DATE_FORMAT(added, '%b %y') = '".fourthMonth()."'";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
            function totalOfCustomersOnThirdMonth($link)
            {
                $query = "SELECT * FROM account WHERE DATE_FORMAT(added, '%b %y') = '".thirdMonth()."'";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
            function totalOfCustomersOnSecondMonth($link)
            {
                $query = "SELECT * FROM account WHERE DATE_FORMAT(added, '%b %y') = '".secondMonth()."'";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
            function totalOfCustomersOnFirstMonth($link)
            {
                $query = "SELECT * FROM account WHERE DATE_FORMAT(added, '%b %y') = '".  firstMonth()."'";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
            function newVisits($link)
            {
                $query = "SELECT ip, COUNT(ip) FROM visitor GROUP BY ip HAVING COUNT(ip) = 1";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
            function returningVisits($link)
            {
                $query = "SELECT ip, COUNT(ip) FROM visitor GROUP BY ip HAVING COUNT(ip) > 1";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
            function Streams($link)
            {
                $query = "SELECT * FROM streams";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
            function Countries($link)
            {
                $query = "SELECT DISTINCT country FROM streams";
                $result = mysqli_query($link, $query);

                if($result)
                {
                    return mysqli_num_rows($result);
                }
                else
                {
                    return 0;
                }
            }
        ?>
        <div class="container analytics grey-text">
            <h4>Dashboard</h4>
            <div class="row">
                <div class="col l8">
                    <div class="row">
                        <div class="col s6 m3 l3">
                            <div class="card-panel">
                                <h5 class="center"><?php echo(totalVisits($link));?></h5>
                                <span class="title">Visits</span>
                            </div>
                        </div>
                        <div class="col s6 m3 l3">
                            <div class="card-panel">
                                <h5 class="center"><?php echo(uniqueVisits($link));?></h5>
                                <span>Unique Visits</span>
                            </div>
                        </div>
                        <div class="col s6 m3 l3">
                            <div class="card-panel">
                                <h5 class="center"><?php echo(Transactions($link));?></h5>
                                <span>Transactions</span>
                            </div>
                        </div>
                        <div class="col s6 m3 l3">
                            <div class="card-panel">
                                <h5 class="center"><?php echo("R".Revenue($link));?></h5>
                                <span>Revenue</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 m3 l3">
                            <div class="card-panel">
                                <h5 class="center"><?php echo(Streams($link));?></h5>
                                <span>Streams</span>
                            </div>
                        </div>
                        <div class="col s6 m3 l3">
                            <div class="card-panel">
                                <h5 class="center"><?php echo(Countries($link));?></h5>
                                <span>Countries</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 l4">
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card-panel">
                                <span>Our Customers</span><br><br>
                                <canvas id="myChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 l8">
                    
                </div>
                <div class="col s12 m12 l4">
                    <div class="card-panel">
                        <span>Customers per month</span><br><br>
                        <canvas id="lineChart" height="200px"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <script>
        var lineCtx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['<?php echo(firstMonth());?>', '<?php echo(secondMonth());?>', '<?php echo(thirdMonth());?>', '<?php echo(fourthMonth());?>', '<?php echo(fifthMonth());?>', '<?php echo(sixthMonth());?>'],
                datasets: [{
                    label: 'Customers',
                    fill: false,
                    data: [<?php echo(totalOfCustomersOnFirstMonth($link));?>, <?php echo(totalOfCustomersOnSecondMonth($link));?>, <?php echo(totalOfCustomersOnThirdMonth($link));?>, <?php echo(totalOfCustomersOnFourthMonth($link));?>, <?php echo(totalOfCustomersOnFifthMonth($link));?>, <?php echo(totalOfCustomersOnSixthMonth($link));?>],
                    borderColor: "#EF5411",
                    backgroundColor: "rgba(239,84,17,0.4)"
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                },
                legend: {
                    position: 'left',
                    display: false,
                    labels: {
                        borderColor: "#EF5411"
                    }
                }
            }
        });

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['New','Returning'],
                datasets:[{
                    data: [
                        <?php echo(newVisits($link));?>,
                        <?php echo(returningVisits($link));?>
                    ],
                    backgroundColor:["#5D8FF5","#59A888"],
                    borderWidth:1
                }]
            },
            options:{
                cutoutPercentage: 80,
                legend: {display: true, position: 'right'},
                tooltips: {enabled: true}
            }
        });
        </script>
    </body>
</html>