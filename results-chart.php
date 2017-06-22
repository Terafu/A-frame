<?php

    if (isset($_SESSION['kitchen'])) {        
        $thermalKitchen = 0;
        if($_SESSION['kitchen']['warmth-roof'] == "poly")
            $thermalKitchen += 12.5;
        elseif($_SESSION['kitchen']['warmth-roof'] == "rock")
            $thermalKitchen += 25;

        if($_SESSION['kitchen']['warmth-floor'] == "poly")
            $thermalKitchen += 12.5;
        elseif($_SESSION['kitchen']['warmth-floor'] == "rock")
            $thermalKitchen += 25;

        if($_SESSION['kitchen']['warmth-wall'] == "poly")
            $thermalKitchen += 12.5;
        elseif($_SESSION['kitchen']['warmth-wall'] == "rock")
            $thermalKitchen += 25;

        if($_SESSION['kitchen']['warmth-junctions'] == "poly")
            $thermalKitchen += 12.5;
        elseif($_SESSION['kitchen']['warmth-junctions'] == "rock")
            $thermalKitchen += 25;

        $soundKitchen = 0;
        if($_SESSION['kitchen']['sound-wall'] == "poly")
            $soundKitchen += 25;
        elseif($_SESSION['kitchen']['sound-wall'] == "rock")
            $soundKitchen += 50;

        if($_SESSION['kitchen']['sound-floor'] == "poly")
            $soundKitchen += 25;
        elseif($_SESSION['kitchen']['sound-floor'] == "rock")
            $soundKitchen += 50;

        $luxKitchen = 0;
        if ($_SESSION['kitchen']['lux'] == 150)
            $luxKitchen = 100;
        elseif ($_SESSION['kitchen']['lux'] == 100)
            $luxKitchen = 66;
        elseif ($_SESSION['kitchen']['lux'] == 50)
            $luxKitchen = 33;
        elseif ($_SESSION['kitchen']['lux'] == 0)
            $luxKitchen = 0;
        elseif ($_SESSION['kitchen']['lux'] == 200)
            $luxKitchen = 66;
        elseif ($_SESSION['kitchen']['lux'] == 250)
            $luxKitchen = 33;
        elseif ($_SESSION['kitchen']['lux'] == 300)
            $luxKitchen = 0;

        $ventilationKitchen = 0;
        if ($_SESSION['kitchen']['ventilation-ventilation'] == "natural-ventilation")
            $ventilationKitchen += 33;
        elseif ($_SESSION['kitchen']['ventilation-ventilation'] == "air-conditioner")
            $ventilationKitchen += 66;
        elseif ($_SESSION['kitchen']['ventilation-floor'] == "active-floor")
            $ventilationKitchen += 34;
    }

    if(isset($_SESSION['bedroom'])) {
        $thermalBedroom = 0;
        if($_SESSION['bedroom']['warmth-roof'] == "poly")
            $thermalBedroom += 12.5;
        elseif($_SESSION['bedroom']['warmth-roof'] == "rock")
            $thermalBedroom += 25;

        if($_SESSION['bedroom']['warmth-floor'] == "poly")
            $thermalBedroom += 12.5;
        elseif($_SESSION['bedroom']['warmth-floor'] == "rock")
            $thermalBedroom += 25;

        if($_SESSION['bedroom']['warmth-wall'] == "poly")
            $thermalBedroom += 12.5;
        elseif($_SESSION['bedroom']['warmth-wall'] == "rock")
            $thermalBedroom += 25;

        if($_SESSION['bedroom']['warmth-junctions'] == "poly")
            $thermalBedroom += 12.5;
        elseif($_SESSION['bedroom']['warmth-junctions'] == "rock")
            $thermalBedroom += 25;

        $soundBedroom = 0;
        if($_SESSION['bedroom']['sound-wall'] == "poly")
            $soundBedroom += 25;
        elseif($_SESSION['bedroom']['sound-wall'] == "rock")
            $soundBedroom += 50;

        if($_SESSION['bedroom']['sound-floor'] == "poly")
            $soundBedroom += 25;
        elseif($_SESSION['bedroom']['sound-floor'] == "rock")
            $soundBedroom += 50;

        $luxBedroom = 0;
        if ($_SESSION['bedroom']['lux'] == 150)
            $luxBedroom = 100;
        elseif ($_SESSION['bedroom']['lux'] == 100)
            $luxBedroom = 66;
        elseif ($_SESSION['bedroom']['lux'] == 50)
            $luxBedroom = 33;
        elseif ($_SESSION['bedroom']['lux'] == 0)
            $luxBedroom = 0;
        elseif ($_SESSION['bedroom']['lux'] == 200)
            $luxBedroom = 66;
        elseif ($_SESSION['bedroom']['lux'] == 250)
            $luxBedroom = 33;
        elseif ($_SESSION['bedroom']['lux'] == 300)
            $luxBedroom = 0;

        $ventilationBedroom = 0;
        if ($_SESSION['bedroom']['ventilation-ventilation'] == "natural-ventilation")
            $ventilationBedroom += 33;
        elseif ($_SESSION['bedroom']['ventilation-ventilation'] == "air-conditioner")
            $ventilationBedroom += 66;
        elseif ($_SESSION['bedroom']['ventilation-floor'] == "active-floor")
            $ventilationBedroom += 34;
    }

    if(isset($_SESSION['livingroom'])) {
        $thermalLivingroom = 0;
        if($_SESSION['livingroom']['warmth-roof'] == "poly")
            $thermalLivingroom += 12.5;
        elseif($_SESSION['livingroom']['warmth-roof'] == "rock")
            $thermalLivingroom += 25;

        if($_SESSION['livingroom']['warmth-floor'] == "poly")
            $thermalLivingroom += 12.5;
        elseif($_SESSION['livingroom']['warmth-floor'] == "rock")
            $thermalLivingroom += 25;

        if($_SESSION['livingroom']['warmth-wall'] == "poly")
            $thermalLivingroom += 12.5;
        elseif($_SESSION['livingroom']['warmth-wall'] == "rock")
            $thermalLivingroom += 25;

        if($_SESSION['livingroom']['warmth-junctions'] == "poly")
            $thermalLivingroom += 12.5;
        elseif($_SESSION['livingroom']['warmth-junctions'] == "rock")
            $thermalLivingroom += 25;

        $soundLivingroom = 0;
        if($_SESSION['livingroom']['sound-wall'] == "poly")
            $soundLivingroom += 25;
        elseif($_SESSION['livingroom']['sound-wall'] == "rock")
            $soundLivingroom += 50;

        if($_SESSION['livingroom']['sound-floor'] == "poly")
            $soundLivingroom += 25;
        elseif($_SESSION['livingroom']['sound-floor'] == "rock")
            $soundLivingroom += 50;

        $luxLivingroom = 0;
        if ($_SESSION['livingroom']['lux'] == 150)
            $luxLivingroom = 100;
        elseif ($_SESSION['livingroom']['lux'] == 100)
            $luxLivingroom = 66;
        elseif ($_SESSION['livingroom']['lux'] == 50)
            $luxLivingroom = 33;
        elseif ($_SESSION['livingroom']['lux'] == 0)
            $luxLivingroom = 0;
        elseif ($_SESSION['livingroom']['lux'] == 200)
            $luxLivingroom = 66;
        elseif ($_SESSION['livingroom']['lux'] == 250)
            $luxLivingroom = 33;
        elseif ($_SESSION['livingroom']['lux'] == 300)
            $luxLivingroom = 0;

        $ventilationLivingroom = 0;
        if ($_SESSION['livingroom']['ventilation-ventilation'] == "natural-ventilation")
            $ventilationLivingroom += 33;
        elseif ($_SESSION['livingroom']['ventilation-ventilation'] == "air-conditioner")
            $ventilationLivingroom += 66;
        elseif ($_SESSION['livingroom']['ventilation-floor'] == "active-floor")
            $ventilationLivingroom += 34;
    }
?>

<script>
    $(function () {
        if ($(".active").attr("id") == "kitchen") {
            var myChart = Highcharts.chart('container', {
                chart: {
                    type: 'bar',
                },

                title:{
                    text:''
                },

                xAxis: {
                    categories: ['Warmth', 'Light', 'Sound', 'Ventilation'],
                },        

                plotOptions: {
                    series: {
                        colorByPoint: true,
                        colors: ['#e95b52', '#f0b911', '#8987c0', '#63bc9b'],
                    },
                },

                yAxis: {
                    title: {text: 'Percentage of Multi-Comfort experience'},
                    min: 0,
                    max: 100,
                    minTickInterval: 5,
                },

                series: [{
                    showInLegend: false,
                    name: 'Percentage of Multi-Comfort experience',
                    data: [<?php echo $thermalKitchen ?>, <?php echo $luxKitchen ?>, <?php echo $soundKitchen ?>, <?php echo $ventilationKitchen ?>],
                }],

                credits: {
                    enabled: false,
                },
            });
        }

        else if ($(".active").attr("id") == "bedroom") {
            var myChart = Highcharts.chart('container', {
                chart: {
                    type: 'bar',
                },

                title:{
                    text:''
                },

                xAxis: {
                    categories: ['Warmth', 'Light', 'Sound', 'Ventilation'],
                },        

                plotOptions: {
                    series: {
                        colorByPoint: true,
                        colors: ['#e95b52', '#f0b911', '#8987c0', '#63bc9b'],
                    },
                },

                yAxis: {
                    title: {text: 'Percentage of Multi-Comfort experience'},
                    min: 0,
                    max: 100,
                    minTickInterval: 5,
                },

                series: [{
                    showInLegend: false,
                    name: 'Percentage of Multi-Comfort experience',
                    data: [<?php echo $thermalBedroom ?>, <?php echo $luxBedroom ?>, <?php echo $soundBedroom ?>, <?php echo $ventilationBedroom ?>],
                }],

                credits: {
                    enabled: false,
                },
            });
        }

        else if ($(".active").attr("id") == "livingroom") {
            var myChart = Highcharts.chart('container', {
                chart: {
                    type: 'bar',
                },

                title:{
                    text:''
                },

                xAxis: {
                    categories: ['Warmth', 'Light', 'Sound', 'Ventilation'],
                },        

                plotOptions: {
                    series: {
                        colorByPoint: true,
                        colors: ['#e95b52', '#f0b911', '#8987c0', '#63bc9b'],
                    },
                },

                yAxis: {
                    title: {text: 'Percentage of Multi-Comfort experience'},
                    min: 0,
                    max: 100,
                    minTickInterval: 5,
                },

                series: [{
                    showInLegend: false,
                    name: 'Percentage of Multi-Comfort experience',
                    data: [<?php echo $thermalLivingroom ?>, <?php echo $luxLivingroom ?>, <?php echo $soundLivingroom ?>, <?php echo $ventilationLivingroom ?>],
                }],

                credits: {
                    enabled: false,
                },
            });
        }

        
    });

    $("li").on("click", function() {

        $("li").removeClass("active");

        $(this).addClass("active");

        $(function () {
            if ($(".active").attr("id") == "kitchen") {
                var myChart = Highcharts.chart('container', {
                    chart: {
                        type: 'bar',
                    },

                    title:{
                        text:''
                    },

                    xAxis: {
                        categories: ['Warmth', 'Light', 'Sound', 'Ventilation'],
                    },        

                    plotOptions: {
                        series: {
                            colorByPoint: true,
                            colors: ['#e95b52', '#f0b911', '#8987c0', '#63bc9b'],
                        },
                    },

                    yAxis: {
                        title: {text: 'Percentage of Multi-Comfort experience'},
                        min: 0,
                        max: 100,
                        minTickInterval: 5,
                    },

                    series: [{
                        showInLegend: false,
                        name: 'Percentage of Multi-Comfort experience',
                        data: [<?php echo $thermalKitchen ?>, <?php echo $luxKitchen ?>, <?php echo $soundKitchen ?>, <?php echo $ventilationKitchen ?>],
                    }],

                    credits: {
                        enabled: false,
                    },
                });
            }

            else if ($(".active").attr("id") == "bedroom") {
                var myChart = Highcharts.chart('container', {
                    chart: {
                        type: 'bar',
                    },

                    title:{
                        text:''
                    },

                    xAxis: {
                        categories: ['Warmth', 'Light', 'Sound', 'Ventilation'],
                    },        

                    plotOptions: {
                        series: {
                            colorByPoint: true,
                            colors: ['#e95b52', '#f0b911', '#8987c0', '#63bc9b'],
                        },
                    },

                    yAxis: {
                        title: {text: 'Percentage of Multi-Comfort experience'},
                        min: 0,
                        max: 100,
                        minTickInterval: 5,
                    },

                    series: [{
                        showInLegend: false,
                        name: 'Percentage of Multi-Comfort experience',
                        data: [<?php echo $thermalBedroom ?>, <?php echo $luxBedroom ?>, <?php echo $soundBedroom ?>, <?php echo $ventilationBedroom ?>],
                    }],

                    credits: {
                        enabled: false,
                    },
                });
            }

            else if ($(".active").attr("id") == "livingroom") {
                var myChart = Highcharts.chart('container', {
                    chart: {
                        type: 'bar',
                    },

                    title:{
                        text:''
                    },

                    xAxis: {
                        categories: ['Warmth', 'Light', 'Sound', 'Ventilation'],
                    },        

                    plotOptions: {
                        series: {
                            colorByPoint: true,
                            colors: ['#e95b52', '#f0b911', '#8987c0', '#63bc9b'],
                        },
                    },

                    yAxis: {
                        title: {text: 'Percentage of Multi-Comfort experience'},
                        min: 0,
                        max: 100,
                        minTickInterval: 5,
                    },

                    series: [{
                        showInLegend: false,
                        name: 'Percentage of Multi-Comfort experience',
                        data: [<?php echo $thermalLivingroom ?>, <?php echo $luxLivingroom ?>, <?php echo $soundLivingroom ?>, <?php echo $ventilationLivingroom ?>],
                    }],

                    credits: {
                        enabled: false,
                    },
                });
            }            
        });
    });
</script>