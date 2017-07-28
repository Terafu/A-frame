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

    if (isset($_SESSION['advice-kitchen'])) {        
        $thermalKitchenAdvice = 0;
        if($_SESSION['advice-kitchen']['warmth-roof'] == "poly")
            $thermalKitchenAdvice += 12.5;
        elseif($_SESSION['advice-kitchen']['warmth-roof'] == "rock")
            $thermalKitchenAdvice += 25;

        if($_SESSION['advice-kitchen']['warmth-floor'] == "poly")
            $thermalKitchenAdvice += 12.5;
        elseif($_SESSION['advice-kitchen']['warmth-floor'] == "rock")
            $thermalKitchenAdvice += 25;

        if($_SESSION['advice-kitchen']['warmth-wall'] == "poly")
            $thermalKitchenAdvice += 12.5;
        elseif($_SESSION['advice-kitchen']['warmth-wall'] == "rock")
            $thermalKitchenAdvice += 25;

        if($_SESSION['advice-kitchen']['warmth-junctions'] == "poly")
            $thermalKitchenAdvice += 12.5;
        elseif($_SESSION['kitchen']['warmth-junctions'] == "rock")
            $thermalKitchenAdvice += 25;

        $soundKitchenAdvice = 0;
        if($_SESSION['advice-kitchen']['sound-wall'] == "poly")
            $soundKitchenAdvice += 25;
        elseif($_SESSION['kitchen']['sound-wall'] == "rock")
            $soundKitchenAdvice += 50;

        if($_SESSION['advice-kitchen']['sound-floor'] == "poly")
            $soundKitchenAdvice += 25;
        elseif($_SESSION['kitchen']['sound-floor'] == "rock")
            $soundKitchenAdvice += 50;

        $luxKitchenAdvice = 0;
        if ($_SESSION['advice-kitchen']['lux'] == 150)
            $luxKitchenAdvice = 100;
        elseif ($_SESSION['kitchen']['lux'] == 100)
            $luxKitchenAdvice = 66;
        elseif ($_SESSION['kitchen']['lux'] == 50)
            $luxKitchenAdvice = 33;
        elseif ($_SESSION['kitchen']['lux'] == 0)
            $luxKitchenAdvice = 0;
        elseif ($_SESSION['kitchen']['lux'] == 200)
            $luxKitchenAdvice = 66;
        elseif ($_SESSION['kitchen']['lux'] == 250)
            $luxKitchenAdvice = 33;
        elseif ($_SESSION['kitchen']['lux'] == 300)
            $luxKitchenAdvice = 0;

        $ventilationKitchenAdvice = 0;
        if ($_SESSION['advice-kitchen']['ventilation-ventilation'] == "natural-ventilation")
            $ventilationKitchenAdvice += 33;
        elseif ($_SESSION['advice-kitchen']['ventilation-ventilation'] == "air-conditioner")
            $ventilationKitchenAdvice += 66;
        elseif ($_SESSION['advice-kitchen']['ventilation-floor'] == "active-floor")
            $ventilationKitchenAdvice += 34;
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

    if(isset($_SESSION['advice-bedroom'])) {
        $thermalBedroomAdvice = 0;
        if($_SESSION['advice-bedroom']['warmth-roof'] == "poly")
            $thermalBedroomAdvice += 12.5;
        elseif($_SESSION['advice-bedroom']['warmth-roof'] == "rock")
            $thermalBedroomAdvice += 25;

        if($_SESSION['advice-bedroom']['warmth-floor'] == "poly")
            $thermalBedroomAdvice += 12.5;
        elseif($_SESSION['advice-bedroom']['warmth-floor'] == "rock")
            $thermalBedroomAdvice += 25;

        if($_SESSION['advice-bedroom']['warmth-wall'] == "poly")
            $thermalBedroomAdvice += 12.5;
        elseif($_SESSION['advice-bedroom']['warmth-wall'] == "rock")
            $thermalBedroomAdvice += 25;

        if($_SESSION['advice-bedroom']['warmth-junctions'] == "poly")
            $thermalBedroomAdvice += 12.5;
        elseif($_SESSION['advice-bedroom']['warmth-junctions'] == "rock")
            $thermalBedroomAdvice += 25;

        $soundBedroomAdvice = 0;
        if($_SESSION['advice-bedroom']['sound-wall'] == "poly")
            $soundBedroomAdvice += 25;
        elseif($_SESSION['advice-bedroom']['sound-wall'] == "rock")
            $soundBedroomAdvice += 50;

        if($_SESSION['advice-bedroom']['sound-floor'] == "poly")
            $soundBedroomAdvice += 25;
        elseif($_SESSION['advice-bedroom']['sound-floor'] == "rock")
            $soundBedroomAdvice += 50;

        $luxBedroomAdvice = 0;
        if ($_SESSION['advice-bedroom']['lux'] == 150)
            $luxBedroomAdvice = 100;
        elseif ($_SESSION['advice-bedroom']['lux'] == 100)
            $luxBedroomAdvice = 66;
        elseif ($_SESSION['advice-bedroom']['lux'] == 50)
            $luxBedroomAdvice = 33;
        elseif ($_SESSION['advice-bedroom']['lux'] == 0)
            $luxBedroomAdvice = 0;
        elseif ($_SESSION['advice-bedroom']['lux'] == 200)
            $luxBedroomAdvice = 66;
        elseif ($_SESSION['advice-bedroom']['lux'] == 250)
            $luxBedroomAdvice = 33;
        elseif ($_SESSION['advice-bedroom']['lux'] == 300)
            $luxBedroomAdvice = 0;

        $ventilationBedroomAdvice = 0;
        if ($_SESSION['advice-bedroom']['ventilation-ventilation'] == "natural-ventilation")
            $ventilationBedroomAdvice += 33;
        elseif ($_SESSION['advice-bedroom']['ventilation-ventilation'] == "air-conditioner")
            $ventilationBedroomAdvice += 66;
        elseif ($_SESSION['advice-bedroom']['ventilation-floor'] == "active-floor")
            $ventilationBedroomAdvice += 34;
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

    if(isset($_SESSION['advice-livingroom'])) {
        $thermalLivingroomAdvice = 0;
        if($_SESSION['advice-livingroom']['warmth-roof'] == "poly")
            $thermalLivingroomAdvice += 12.5;
        elseif($_SESSION['advice-livingroom']['warmth-roof'] == "rock")
            $thermalLivingroomAdvice += 25;

        if($_SESSION['advice-livingroom']['warmth-floor'] == "poly")
            $thermalLivingroomAdvice += 12.5;
        elseif($_SESSION['advice-livingroom']['warmth-floor'] == "rock")
            $thermalLivingroomAdvice += 25;

        if($_SESSION['advice-livingroom']['warmth-wall'] == "poly")
            $thermalLivingroomAdvice += 12.5;
        elseif($_SESSION['advice-livingroom']['warmth-wall'] == "rock")
            $thermalLivingroomAdvice += 25;

        if($_SESSION['advice-livingroom']['warmth-junctions'] == "poly")
            $thermalLivingroomAdvice += 12.5;
        elseif($_SESSION['advice-livingroom']['warmth-junctions'] == "rock")
            $thermalLivingroomAdvice += 25;

        $soundLivingroomAdvice = 0;
        if($_SESSION['advice-livingroom']['sound-wall'] == "poly")
            $soundLivingroomAdvice += 25;
        elseif($_SESSION['advice-livingroom']['sound-wall'] == "rock")
            $soundLivingroomAdvice += 50;

        if($_SESSION['advice-livingroom']['sound-floor'] == "poly")
            $soundLivingroomAdvice += 25;
        elseif($_SESSION['advice-livingroom']['sound-floor'] == "rock")
            $soundLivingroomAdvice += 50;

        $luxLivingroomAdvice = 0;
        if ($_SESSION['advice-livingroom']['lux'] == 150)
            $luxLivingroomAdvice = 100;
        elseif ($_SESSION['advice-livingroom']['lux'] == 100)
            $luxLivingroomAdvice = 66;
        elseif ($_SESSION['advice-livingroom']['lux'] == 50)
            $luxLivingroomAdvice = 33;
        elseif ($_SESSION['advice-livingroom']['lux'] == 0)
            $luxLivingroomAdvice = 0;
        elseif ($_SESSION['advice-livingroom']['lux'] == 200)
            $luxLivingroomAdvice = 66;
        elseif ($_SESSION['advice-livingroom']['lux'] == 250)
            $luxLivingroomAdvice = 33;
        elseif ($_SESSION['advice-livingroom']['lux'] == 300)
            $luxLivingroomAdvice = 0;

        $ventilationLivingroomAdvice = 0;
        if ($_SESSION['advice-livingroom']['ventilation-ventilation'] == "natural-ventilation")
            $ventilationLivingroomAdvice += 33;
        elseif ($_SESSION['advice-livingroom']['ventilation-ventilation'] == "air-conditioner")
            $ventilationLivingroomAdvice += 66;
        elseif ($_SESSION['advice-livingroom']['ventilation-floor'] == "active-floor")
            $ventilationLivingroomAdvice += 34;
    }

?>

<script>
    var dataTableKitchen = [<?php if(isset($thermalKitchen)) echo $thermalKitchen; else echo "0" ?>, <?php if(isset($luxKitchen)) echo $luxKitchen; else echo "0" ?>, <?php if(isset($soundKitchen)) echo $soundKitchen; else echo "0" ?>, <?php if(isset($ventilationKitchen)) echo $ventilationKitchen; else echo "0" ?>, <?php if(isset($thermalKitchenAdvice)) echo $thermalKitchenAdvice - $thermalKitchen; else echo "0" ?>, <?php if(isset($luxKitchenAdvice)) echo $luxKitchenAdvice - $luxKitchen; else echo "0" ?>, <?php if(isset($soundKitchenAdvice)) echo $soundKitchenAdvice - $soundKitchen; else echo "0" ?>, <?php if(isset($ventilationKitchenAdvice)) echo $ventilationKitchenAdvice - $ventilationKitchen; else echo "0" ?>, <?php if(isset($thermalKitchenAdvice)) echo $thermalKitchenAdvice; else echo "0" ?>, <?php if(isset($luxKitchenAdvice)) echo $luxKitchenAdvice; else echo "0" ?>, <?php if(isset($soundKitchenAdvice)) echo $soundKitchenAdvice; else echo "0" ?>, <?php if(isset($ventilationKitchenAdvice)) echo $ventilationKitchenAdvice; else echo "0" ?>];

    var dataTableBedroom = [<?php if(isset($thermalBedroom)) echo $thermalBedroom; else echo "0" ?>, <?php if(isset($luxBedroom)) echo $luxBedroom; else echo "0" ?>, <?php if(isset($soundBedroom)) echo $soundBedroom; else echo "0" ?>, <?php if(isset($ventilationBedroom)) echo $ventilationBedroom; else echo "0" ?>, <?php if(isset($thermalBedroomAdvice)) echo $thermalBedroomAdvice - $thermalBedroom; else echo "0" ?>, <?php if(isset($luxBedroomAdvice)) echo $luxBedroomAdvice - $luxBedroom; else echo "0" ?>, <?php if(isset($soundBedroomAdvice)) echo $soundBedroomAdvice - $soundBedroom; else echo "0" ?>, <?php if(isset($ventilationBedroomAdvice)) echo $ventilationBedroomAdvice - $ventilationBedroom; else echo "0" ?>, <?php if(isset($thermalBedroomAdvice)) echo $thermalBedroomAdvice; else echo "0" ?>, <?php if(isset($luxBedroomAdvice)) echo $luxBedroomAdvice; else echo "0" ?>, <?php if(isset($soundBedroomAdvice)) echo $soundBedroomAdvice; else echo "0" ?>, <?php if(isset($ventilationBedroomAdvice)) echo $ventilationBedroomAdvice; else echo "0" ?>];

    var dataTableLivingroom = [<?php if(isset($thermalLivingroom)) echo $thermalLivingroom; else echo "0" ?>, <?php if(isset($luxLivingroom)) echo $luxLivingroom; else echo "0" ?>, <?php if(isset($soundLivingroom)) echo $soundLivingroom; else echo "0" ?>, <?php if(isset($ventilationLivingroom)) echo $ventilationLivingroom; else echo "0" ?>, <?php if(isset($thermalLivingroomAdvice)) echo $thermalLivingroomAdvice - $thermalLivingroom; else echo "0" ?>, <?php if(isset($luxLivingroomAdvice)) echo $luxLivingroomAdvice - $luxLivingroom; else echo "0" ?>, <?php if(isset($soundLivingroomAdvice)) echo $soundLivingroomAdvice - $soundLivingroom; else echo "0" ?>, <?php if(isset($ventilationLivingroomAdvice)) echo $ventilationLivingroomAdvice; else echo "0" ?>, <?php if(isset($thermalLivingroomAdvice)) echo $thermalLivingroomAdvice; else echo "0" ?>, <?php if(isset($luxLivingroomAdvice)) echo $luxLivingroomAdvice; else echo "0" ?>, <?php if(isset($soundLivingroomAdvice)) echo $soundLivingroomAdvice; else echo "0" ?>, <?php if(isset($ventilationLivingroomAdvice)) echo $ventilationLivingroomAdvice; else echo "0" ?>];

    var pdfKitchen = [<?php if (isset($_SESSION['kitchen'])) echo '"'.$_SESSION['kitchen']['warmth-roof'].'"'; ?>, <?php if (isset($_SESSION['kitchen'])) echo '"'.$_SESSION['kitchen']['warmth-wall'].'"'; ?>, <?php if (isset($_SESSION['kitchen'])) echo '"'.$_SESSION['kitchen']['warmth-floor'].'"'; ?>, <?php if (isset($_SESSION['kitchen'])) echo '"'.$_SESSION['kitchen']['warmth-junctions'].'"'; ?>, <?php if (isset($_SESSION['kitchen'])) echo '"'.$_SESSION['kitchen']['sound-floor'].'"'; ?>, <?php if (isset($_SESSION['kitchen'])) echo '"'.$_SESSION['kitchen']['sound-wall'].'"'; ?>, <?php if (isset($_SESSION['kitchen'])) echo '"'.$_SESSION['kitchen']['lux'].'"'; ?>, <?php if (isset($_SESSION['kitchen'])) echo '"'.$_SESSION['kitchen']['ventilation-ventilation'].'"'; ?>, <?php if (isset($_SESSION['kitchen'])) echo '"'.$_SESSION['kitchen']['ventilation-floor'].'"'; ?>];

    var pdfBedroom = [<?php if (isset($_SESSION['bedroom'])) echo '"'.$_SESSION['bedroom']['warmth-roof'].'"'; ?>, <?php if (isset($_SESSION['bedroom'])) echo '"'.$_SESSION['bedroom']['warmth-wall'].'"'; ?>, <?php if (isset($_SESSION['bedroom'])) echo '"'.$_SESSION['bedroom']['warmth-floor'].'"'; ?>, <?php if (isset($_SESSION['bedroom'])) echo '"'.$_SESSION['bedroom']['warmth-junctions'].'"'; ?>, <?php if (isset($_SESSION['bedroom'])) echo '"'.$_SESSION['bedroom']['sound-floor'].'"'; ?>, <?php if (isset($_SESSION['bedroom'])) echo '"'.$_SESSION['bedroom']['sound-wall'].'"'; ?>, <?php if (isset($_SESSION['bedroom'])) echo '"'.$_SESSION['bedroom']['lux'].'"'; ?>, <?php if (isset($_SESSION['bedroom'])) echo '"'.$_SESSION['bedroom']['ventilation-ventilation'].'"'; ?>, <?php if (isset($_SESSION['bedroom'])) echo '"'.$_SESSION['bedroom']['ventilation-floor'].'"'; ?>];

    var pdfLivingroom = [<?php if (isset($_SESSION['livingroom'])) echo '"'.$_SESSION['livingroom']['warmth-roof'].'"'; ?>, <?php if (isset($_SESSION['livingroom'])) echo '"'.$_SESSION['livingroom']['warmth-wall'].'"'; ?>, <?php if (isset($_SESSION['livingroom'])) echo '"'.$_SESSION['livingroom']['warmth-floor'].'"'; ?>, <?php if (isset($_SESSION['livingroom'])) echo '"'.$_SESSION['livingroom']['warmth-junctions'].'"'; ?>, <?php if (isset($_SESSION['livingroom'])) echo '"'.$_SESSION['livingroom']['sound-floor'].'"'; ?>, <?php if (isset($_SESSION['livingroom'])) echo '"'.$_SESSION['livingroom']['sound-wall'].'"'; ?>, <?php if (isset($_SESSION['livingroom'])) echo '"'.$_SESSION['livingroom']['lux'].'"'; ?>, <?php if (isset($_SESSION['livingroom'])) echo '"'.$_SESSION['livingroom']['ventilation-ventilation'].'"'; ?>, <?php if (isset($_SESSION['livingroom'])) echo '"'.$_SESSION['livingroom']['ventilation-floor'].'"'; ?>];

    $(function () {
        if ($(".active").attr("id") == "kitchen") {
            <?php

                if(isset($_SESSION["advice-kitchen"])) {
                    echo    'var myChart = Highcharts.chart("chartContainer", {
                                chart: {
                                    type: "bar",
                                },

                                title:{
                                    text:""
                                },

                                tooltip: { 
                                        enabled: false 
                                    },

                                xAxis: {
                                    categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                },        

                                plotOptions: {
                                    series: {
                                        colorByPoint: true,
                                        colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b", "#e58a84", "#e3c97b", "#deddf2", "#a8ddc9"],
                                        stacking: "normal",
                                        events: {
                                            legendItemClick: function () {

                                                if (this.visible) {
                                                    this.chart.series[0].update({
                                                        data: [{y:dataTableKitchen[8], color: "#e58a84"}, {y:dataTableKitchen[9], color: "#e3c97b"}, {y:dataTableKitchen[10], color: "#deddf2"}, {y:dataTableKitchen[11], color: "#a8ddc9"}],
                                                    });
                                                }

                                                else {
                                                    this.chart.series[0].update({
                                                        data: [{y:dataTableKitchen[4], color: "#e58a84"}, {y:dataTableKitchen[5], color: "#e3c97b"}, {y:dataTableKitchen[6], color: "#deddf2"}, {y:dataTableKitchen[7], color: "#a8ddc9"}],
                                                    });
                                                }
                                            }
                                        }
                                    },
                                },

                                yAxis: {
                                    title: {text: "Percentage of Multi-Comfort experience"},
                                    min: 0,
                                    max: 100,
                                    minTickInterval: 5,
                                },

                                legend: {
                                    reversed: true
                                },

                                series: [{
                                    name: "Recommendations based on your answers to the questions",
                                    data: [{y:dataTableKitchen[4], color: "#e58a84"}, {y:dataTableKitchen[5], color: "#e3c97b"}, {y:dataTableKitchen[6], color: "#deddf2"}, {y:dataTableKitchen[7], color: "#a8ddc9"}],
                                }, {
                                    name: "Your choices",
                                    data: [{y:dataTableKitchen[0], color: "#e95b52"}, {y:dataTableKitchen[1], color: "#f0b911"}, {y:dataTableKitchen[2], color: "#8987c0"}, {y:dataTableKitchen[3], color: "#63bc9b"}],
                                }],

                                credits: {
                                    enabled: false,
                                },
                            });';

                    echo    '$("#pdf").empty();';

                    echo    '$("#pdf").append(\'<table><colgroup><col class="warmthColor"/><col class="luxColor"/><col class="soundColor"/><col class="ventilationColor"/></colgroup><tr><th>WARMTH</th><th>LUX</th><th>SOUND</th><th>VENTILATION</th></tr><tr><td><a href="pdf/\'+pdfKitchen[0]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfKitchen[0]+\'.pdf</a></td><td><a href="pdf/\'+pdfKitchen[6]+\'.pdf" target="_blank" class="luxColorHover">\'+pdfKitchen[6]+\'.pdf</a></td><td><a href="pdf/\'+pdfKitchen[4]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfKitchen[4]+\'.pdf</a></td><td><a href="pdf/\'+pdfKitchen[7]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfKitchen[7]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfKitchen[1]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfKitchen[1]+\'.pdf</a></td><td></td><td><a href="pdf/\'+pdfKitchen[5]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfKitchen[5]+\'.pdf</a></td><td><a href="pdf/\'+pdfKitchen[8]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfKitchen[8]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfKitchen[2]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfKitchen[2]+\'.pdf</a></td><td></td><td></td><td></td></tr><tr><td><a href="pdf/\'+pdfKitchen[3]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfKitchen[3]+\'.pdf</a></td><td></td><td></td><td></td></tr></table>\')';
                }

                else {
                    echo    'var myChart = Highcharts.chart("chartContainer", {
                                chart: {
                                    type: "bar",
                                },

                                title:{
                                    text:""
                                },

                                xAxis: {
                                    categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                },        

                                plotOptions: {
                                    series: {
                                        colorByPoint: true,
                                        colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b"],
                                    },
                                },

                                yAxis: {
                                    title: {text: "Percentage of Multi-Comfort experience"},
                                    min: 0,
                                    max: 100,
                                    minTickInterval: 5,
                                },

                                series: [{
                                    showInLegend: false,
                                    name: "Percentage of Multi-Comfort experience",
                                    data: [dataTableKitchen[0], dataTableKitchen[1], dataTableKitchen[2], dataTableKitchen[3]],
                                }],

                                credits: {
                                    enabled: false,
                                },
                            });';

                    echo    '$("#pdf").empty()';
                }
            ?>
        }

        else if ($(".active").attr("id") == "bedroom") {

            <?php

                if(isset($_SESSION["advice-bedroom"])) {
                    echo    'var myChart = Highcharts.chart("chartContainer", {
                                chart: {
                                    type: "bar",
                                },

                                title:{
                                    text:""
                                },

                                tooltip: { 
                                        enabled: false 
                                    },

                                xAxis: {
                                    categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                },        

                                plotOptions: {
                                    series: {
                                        colorByPoint: true,
                                        colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b"],
                                        stacking: "normal",
                                        events: {
                                            legendItemClick: function () {

                                                if (this.visible) {
                                                    this.chart.series[0].update({
                                                        data: [{y:dataTableBedroom[8], color: "#e58a84"}, {y:dataTableBedroom[9], color: "#e3c97b"}, {y:dataTableBedroom[10], color: "#deddf2"}, {y:dataTableBedroom[11], color: "#a8ddc9"}],
                                                    });
                                                }

                                                else {
                                                    this.chart.series[0].update({
                                                        data: [{y:dataTableBedroom[4], color: "#e58a84"}, {y:dataTableBedroom[5], color: "#e3c97b"}, {y:dataTableBedroom[6], color: "#deddf2"}, {y:dataTableBedroom[7], color: "#a8ddc9"}],
                                                    });
                                                }
                                            }
                                        }
                                    },
                                },

                                yAxis: {
                                    title: {text: "Percentage of Multi-Comfort experience"},
                                    min: 0,
                                    max: 100,
                                    minTickInterval: 5,
                                },

                                legend: {
                                    reversed: true
                                },

                                series: [{
                                    name: "Recommendations based on your answers to the questions",
                                    data: [{y:dataTableBedroom[4], color: "#e58a84"}, {y:dataTableBedroom[5], color: "#e3c97b"}, {y:dataTableBedroom[6], color: "#deddf2"}, {y:dataTableBedroom[7], color: "#a8ddc9"}],
                                }, {
                                    name: "Your choices",
                                    data: [{y:dataTableBedroom[0], color: "#e95b52"}, {y:dataTableBedroom[1], color: "#f0b911"}, {y:dataTableBedroom[2], color: "#8987c0"}, {y:dataTableBedroom[3], color: "#63bc9b"}],
                                }],

                                credits: {
                                    enabled: false,
                                },
                            });';

                    echo    '$("#pdf").empty();';

                    echo    '$("#pdf").append(\'<table><colgroup><col class="warmthColor"/><col class="luxColor"/><col class="soundColor"/><col class="ventilationColor"/></colgroup><tr><th>WARMTH</th><th>LUX</th><th>SOUND</th><th>VENTILATION</th></tr><tr><td><a href="pdf/\'+pdfBedroom[0]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfBedroom[0]+\'.pdf</a></td><td><a href="pdf/\'+pdfBedroom[6]+\'.pdf" target="_blank" class="luxColorHover">\'+pdfBedroom[6]+\'.pdf</a></td><td><a href="pdf/\'+pdfBedroom[4]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfBedroom[4]+\'.pdf</a></td><td><a href="pdf/\'+pdfBedroom[7]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfBedroom[7]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfBedroom[1]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfBedroom[1]+\'.pdf</a></td><td></td><td><a href="pdf/\'+pdfBedroom[5]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfBedroom[5]+\'.pdf</a></td><td><a href="pdf/\'+pdfBedroom[8]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfBedroom[8]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfBedroom[2]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfBedroom[2]+\'.pdf</a></td><td></td><td></td><td></td></tr><tr><td><a href="pdf/\'+pdfBedroom[3]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfBedroom[3]+\'.pdf</a></td><td></td><td></td><td></td></tr></table>\')';
                }

                else {
                    echo    'var myChart = Highcharts.chart("chartContainer", {
                                chart: {
                                    type: "bar",
                                },

                                title:{
                                    text:""
                                },

                                xAxis: {
                                    categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                },        

                                plotOptions: {
                                    series: {
                                        colorByPoint: true,
                                        colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b"],
                                    },
                                },

                                yAxis: {
                                    title: {text: "Percentage of Multi-Comfort experience"},
                                    min: 0,
                                    max: 100,
                                    minTickInterval: 5,
                                },

                                series: [{
                                    showInLegend: false,
                                    name: "Percentage of Multi-Comfort experience",
                                    data: [dataTableBedroom[0], dataTableBedroom[1], dataTableBedroom[2], dataTableBedroom[3]],
                                }],

                                credits: {
                                    enabled: false,
                                },
                            });';
                    echo    '$("#pdf").empty()';
                }
            ?>           
        }

        else if ($(".active").attr("id") == "livingroom") {

            <?php
                if(isset($_SESSION["advice-livingroom"])) {

                    echo    'var myChart = Highcharts.chart("chartContainer", {
                                chart: {
                                    type: "bar",
                                },

                                title:{
                                    text:""
                                },

                                tooltip: { 
                                        enabled: false 
                                    },

                                xAxis: {
                                    categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                },        

                                plotOptions: {
                                    series: {
                                        colorByPoint: true,
                                        colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b"],
                                        stacking: "normal",
                                        events: {
                                            legendItemClick: function () {

                                                if (this.visible) {
                                                    this.chart.series[0].update({
                                                        data: [{y:dataTableLivingroom[8], color: "#e58a84"}, {y:dataTableLivingroom[9], color: "#e3c97b"}, {y:dataTableLivingroom[10], color: "#deddf2"}, {y:dataTableLivingroom[11], color: "#a8ddc9"}],
                                                    });
                                                }

                                                else {
                                                    this.chart.series[0].update({
                                                        data: [{y:dataTableLivingroom[4], color: "#e58a84"}, {y:dataTableLivingroom[5], color: "#e3c97b"}, {y:dataTableLivingroom[6], color: "#deddf2"}, {y:dataTableLivingroom[7], color: "#a8ddc9"}],
                                                    });
                                                }
                                            }
                                        }
                                    },
                                },

                                yAxis: {
                                    title: {text: "Percentage of Multi-Comfort experience"},
                                    min: 0,
                                    max: 100,
                                    minTickInterval: 5,
                                },

                                legend: {
                                    reversed: true
                                },

                                series: [{
                                    name: "Recommendations based on your answers to the questions",
                                    data: [{y:dataTableLivingroom[4], color: "#e58a84"}, {y:dataTableLivingroom[5], color: "#e3c97b"}, {y:dataTableLivingroom[6], color: "#deddf2"}, {y:dataTableLivingroom[7], color: "#a8ddc9"}],
                                }, {
                                    name: "Your choices",
                                    data: [{y:dataTableLivingroom[0], color: "#e95b52"}, {y:dataTableLivingroom[1], color: "#f0b911"}, {y:dataTableLivingroom[2], color: "#8987c0"}, {y:dataTableLivingroom[3], color: "#63bc9b"}],
                                }],

                                credits: {
                                    enabled: false,
                                },
                            });';

                    echo    '$("#pdf").empty();';

                    echo    '$("#pdf").append(\'<table><colgroup><col class="warmthColor"/><col class="luxColor"/><col class="soundColor"/><col class="ventilationColor"/></colgroup><tr><th>WARMTH</th><th>LUX</th><th>SOUND</th><th>VENTILATION</th></tr><tr><td><a href="pdf/\'+pdfLivingroom[0]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfLivingroom[0]+\'.pdf</a></td><td><a href="pdf/\'+pdfLivingroom[6]+\'.pdf" target="_blank" class="luxColorHover">\'+pdfLivingroom[6]+\'.pdf</a></td><td><a href="pdf/\'+pdfLivingroom[4]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfLivingroom[4]+\'.pdf</a></td><td><a href="pdf/\'+pdfLivingroom[7]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfLivingroom[7]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfLivingroom[1]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfLivingroom[1]+\'.pdf</a></td><td></td><td><a href="pdf/\'+pdfLivingroom[5]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfLivingroom[5]+\'.pdf</a></td><td><a href="pdf/\'+pdfLivingroom[8]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfLivingroom[8]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfLivingroom[2]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfLivingroom[2]+\'.pdf</a></td><td></td><td></td><td></td></tr><tr><td><a href="pdf/\'+pdfLivingroom[3]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfLivingroom[3]+\'.pdf</a></td><td></td><td></td><td></td></tr></table>\')';
                }

                else {

                    echo    'var myChart = Highcharts.chart("chartContainer", {
                                chart: {
                                    type: "bar",
                                },

                                title:{
                                    text:""
                                },

                                xAxis: {
                                    categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                },        

                                plotOptions: {
                                    series: {
                                        colorByPoint: true,
                                        colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b"],
                                    },
                                },

                                yAxis: {
                                    title: {text: "Percentage of Multi-Comfort experience"},
                                    min: 0,
                                    max: 100,
                                    minTickInterval: 5,
                                },

                                series: [{
                                    showInLegend: false,
                                    name: "Percentage of Multi-Comfort experience",
                                    data: [dataTableLivingroom[0], dataTableLivingroom[1], dataTableLivingroom[2], dataTableLivingroom[3]],
                                }],

                                credits: {
                                    enabled: false,
                                },
                            });';
                    echo    '$("#pdf").empty()';
                }
            ?>
        }        
    });

    $("li").on("click", function() {

        $("li").removeClass("active");

        $(this).addClass("active");
        $(function () {
            if ($(".active").attr("id") == "kitchen") {
                <?php

                    if(isset($_SESSION["advice-kitchen"])) {
                        echo    'var myChart = Highcharts.chart("chartContainer", {
                                    chart: {
                                        type: "bar",
                                    },

                                    title:{
                                        text:""
                                    },

                                    tooltip: { 
                                            enabled: false 
                                        },

                                    xAxis: {
                                        categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                    },        

                                    plotOptions: {
                                        series: {
                                            colorByPoint: true,
                                            colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b", "#e58a84", "#e3c97b", "#deddf2", "#a8ddc9"],
                                            stacking: "normal",
                                            events: {
                                                legendItemClick: function () {

                                                    if (this.visible) {
                                                        this.chart.series[0].update({
                                                            data: [{y:dataTableKitchen[8], color: "#e58a84"}, {y:dataTableKitchen[9], color: "#e3c97b"}, {y:dataTableKitchen[10], color: "#deddf2"}, {y:dataTableKitchen[11], color: "#a8ddc9"}],
                                                        });
                                                    }

                                                    else {
                                                        this.chart.series[0].update({
                                                            data: [{y:dataTableKitchen[4], color: "#e58a84"}, {y:dataTableKitchen[5], color: "#e3c97b"}, {y:dataTableKitchen[6], color: "#deddf2"}, {y:dataTableKitchen[7], color: "#a8ddc9"}],
                                                        });
                                                    }
                                                }
                                            }
                                        },
                                    },

                                    yAxis: {
                                        title: {text: "Percentage of Multi-Comfort experience"},
                                        min: 0,
                                        max: 100,
                                        minTickInterval: 5,
                                    },

                                    legend: {
                                        reversed: true
                                    },

                                    series: [{
                                        name: "Recommendations based on your answers to the questions",
                                        data: [{y:dataTableKitchen[4], color: "#e58a84"}, {y:dataTableKitchen[5], color: "#e3c97b"}, {y:dataTableKitchen[6], color: "#deddf2"}, {y:dataTableKitchen[7], color: "#a8ddc9"}],
                                    }, {
                                        name: "Your choices",
                                        data: [{y:dataTableKitchen[0], color: "#e95b52"}, {y:dataTableKitchen[1], color: "#f0b911"}, {y:dataTableKitchen[2], color: "#8987c0"}, {y:dataTableKitchen[3], color: "#63bc9b"}],
                                    }],

                                    credits: {
                                        enabled: false,
                                    },
                                });';

                        echo    '$("#pdf").empty();';

                        echo    '$("#pdf").append(\'<table><colgroup><col class="warmthColor"/><col class="luxColor"/><col class="soundColor"/><col class="ventilationColor"/></colgroup><tr><th>WARMTH</th><th>LUX</th><th>SOUND</th><th>VENTILATION</th></tr><tr><td><a href="pdf/\'+pdfKitchen[0]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfKitchen[0]+\'.pdf</a></td><td><a href="pdf/\'+pdfKitchen[6]+\'.pdf" target="_blank" class="luxColorHover">\'+pdfKitchen[6]+\'.pdf</a></td><td><a href="pdf/\'+pdfKitchen[4]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfKitchen[4]+\'.pdf</a></td><td><a href="pdf/\'+pdfKitchen[7]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfKitchen[7]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfKitchen[1]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfKitchen[1]+\'.pdf</a></td><td></td><td><a href="pdf/\'+pdfKitchen[5]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfKitchen[5]+\'.pdf</a></td><td><a href="pdf/\'+pdfKitchen[8]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfKitchen[8]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfKitchen[2]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfKitchen[2]+\'.pdf</a></td><td></td><td></td><td></td></tr><tr><td><a href="pdf/\'+pdfKitchen[3]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfKitchen[3]+\'.pdf</a></td><td></td><td></td><td></td></tr></table>\')';
                    }

                    else {
                        echo    'var myChart = Highcharts.chart("chartContainer", {
                                    chart: {
                                        type: "bar",
                                    },

                                    title:{
                                        text:""
                                    },

                                    xAxis: {
                                        categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                    },        

                                    plotOptions: {
                                        series: {
                                            colorByPoint: true,
                                            colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b"],
                                        },
                                    },

                                    yAxis: {
                                        title: {text: "Percentage of Multi-Comfort experience"},
                                        min: 0,
                                        max: 100,
                                        minTickInterval: 5,
                                    },

                                    series: [{
                                        showInLegend: false,
                                        name: "Percentage of Multi-Comfort experience",
                                        data: [dataTableKitchen[0], dataTableKitchen[1], dataTableKitchen[2], dataTableKitchen[3]],
                                    }],

                                    credits: {
                                        enabled: false,
                                    },
                                });';
                        echo    '$("#pdf").empty()';
                    }
                ?>
            }

            else if ($(".active").attr("id") == "bedroom") {

                <?php

                    if(isset($_SESSION["advice-bedroom"])) {
                        echo    'var myChart = Highcharts.chart("chartContainer", {
                                    chart: {
                                        type: "bar",
                                    },

                                    title:{
                                        text:""
                                    },

                                    tooltip: { 
                                            enabled: false 
                                        },

                                    xAxis: {
                                        categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                    },        

                                    plotOptions: {
                                        series: {
                                            colorByPoint: true,
                                            colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b"],
                                            stacking: "normal",
                                            events: {
                                                legendItemClick: function () {

                                                    if (this.visible) {
                                                        this.chart.series[0].update({
                                                            data: [{y:dataTableBedroom[8], color: "#e58a84"}, {y:dataTableBedroom[9], color: "#e3c97b"}, {y:dataTableBedroom[10], color: "#deddf2"}, {y:dataTableBedroom[11], color: "#a8ddc9"}],
                                                        });
                                                    }

                                                    else {
                                                        this.chart.series[0].update({
                                                            data: [{y:dataTableBedroom[4], color: "#e58a84"}, {y:dataTableBedroom[5], color: "#e3c97b"}, {y:dataTableBedroom[6], color: "#deddf2"}, {y:dataTableBedroom[7], color: "#a8ddc9"}],
                                                        });
                                                    }
                                                }
                                            }
                                        },
                                    },

                                    yAxis: {
                                        title: {text: "Percentage of Multi-Comfort experience"},
                                        min: 0,
                                        max: 100,
                                        minTickInterval: 5,
                                    },

                                    legend: {
                                        reversed: true
                                    },

                                    series: [{
                                        name: "Recommendations based on your answers to the questions",
                                        data: [{y:dataTableBedroom[4], color: "#e58a84"}, {y:dataTableBedroom[5], color: "#e3c97b"}, {y:dataTableBedroom[6], color: "#deddf2"}, {y:dataTableBedroom[7], color: "#a8ddc9"}],
                                    }, {
                                        name: "Your choices",
                                        data: [{y:dataTableBedroom[0], color: "#e95b52"}, {y:dataTableBedroom[1], color: "#f0b911"}, {y:dataTableBedroom[2], color: "#8987c0"}, {y:dataTableBedroom[3], color: "#63bc9b"}],
                                    }],

                                    credits: {
                                        enabled: false,
                                    },
                                });';

                        echo    '$("#pdf").empty();';

                        echo    '$("#pdf").append(\'<table><colgroup><col class="warmthColor"/><col class="luxColor"/><col class="soundColor"/><col class="ventilationColor"/></colgroup><tr><th>WARMTH</th><th>LUX</th><th>SOUND</th><th>VENTILATION</th></tr><tr><td><a href="pdf/\'+pdfBedroom[0]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfBedroom[0]+\'.pdf</a></td><td><a href="pdf/\'+pdfBedroom[6]+\'.pdf" target="_blank" class="luxColorHover">\'+pdfBedroom[6]+\'.pdf</a></td><td><a href="pdf/\'+pdfBedroom[4]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfBedroom[4]+\'.pdf</a></td><td><a href="pdf/\'+pdfBedroom[7]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfBedroom[7]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfBedroom[1]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfBedroom[1]+\'.pdf</a></td><td></td><td><a href="pdf/\'+pdfBedroom[5]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfBedroom[5]+\'.pdf</a></td><td><a href="pdf/\'+pdfBedroom[8]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfBedroom[8]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfBedroom[2]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfBedroom[2]+\'.pdf</a></td><td></td><td></td><td></td></tr><tr><td><a href="pdf/\'+pdfBedroom[3]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfBedroom[3]+\'.pdf</a></td><td></td><td></td><td></td></tr></table>\')';
                    }

                    else {
                        echo    'var myChart = Highcharts.chart("chartContainer", {
                                    chart: {
                                        type: "bar",
                                    },

                                    title:{
                                        text:""
                                    },

                                    xAxis: {
                                        categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                    },        

                                    plotOptions: {
                                        series: {
                                            colorByPoint: true,
                                            colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b"],
                                        },
                                    },

                                    yAxis: {
                                        title: {text: "Percentage of Multi-Comfort experience"},
                                        min: 0,
                                        max: 100,
                                        minTickInterval: 5,
                                    },

                                    series: [{
                                        showInLegend: false,
                                        name: "Percentage of Multi-Comfort experience",
                                        data: [dataTableBedroom[0], dataTableBedroom[1], dataTableBedroom[2], dataTableBedroom[3]],
                                    }],

                                    credits: {
                                        enabled: false,
                                    },
                                });';

                        echo    '$("#pdf").empty()';
                    }
                ?>           
            }

            else if ($(".active").attr("id") == "livingroom") {

                <?php
                    if(isset($_SESSION["advice-livingroom"])) {

                        echo    'var myChart = Highcharts.chart("chartContainer", {
                                    chart: {
                                        type: "bar",
                                    },

                                    title:{
                                        text:""
                                    },

                                    tooltip: { 
                                            enabled: false 
                                        },

                                    xAxis: {
                                        categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                    },        

                                    plotOptions: {
                                        series: {
                                            colorByPoint: true,
                                            colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b"],
                                            stacking: "normal",
                                            events: {
                                                legendItemClick: function () {

                                                    if (this.visible) {
                                                        this.chart.series[0].update({
                                                            data: [{y:dataTableLivingroom[8], color: "#e58a84"}, {y:dataTableLivingroom[9], color: "#e3c97b"}, {y:dataTableLivingroom[10], color: "#deddf2"}, {y:dataTableLivingroom[11], color: "#a8ddc9"}],
                                                        });
                                                    }

                                                    else {
                                                        this.chart.series[0].update({
                                                            data: [{y:dataTableLivingroom[4], color: "#e58a84"}, {y:dataTableLivingroom[5], color: "#e3c97b"}, {y:dataTableLivingroom[6], color: "#deddf2"}, {y:dataTableLivingroom[7], color: "#a8ddc9"}],
                                                        });
                                                    }
                                                }
                                            }
                                        },
                                    },

                                    yAxis: {
                                        title: {text: "Percentage of Multi-Comfort experience"},
                                        min: 0,
                                        max: 100,
                                        minTickInterval: 5,
                                    },

                                    legend: {
                                        reversed: true
                                    },

                                    series: [{
                                        name: "Recommendations based on your answers to the questions",
                                        data: [{y:dataTableLivingroom[4], color: "#e58a84"}, {y:dataTableLivingroom[5], color: "#e3c97b"}, {y:dataTableLivingroom[6], color: "#deddf2"}, {y:dataTableLivingroom[7], color: "#a8ddc9"}],
                                    }, {
                                        name: "Your choices",
                                        data: [{y:dataTableLivingroom[0], color: "#e95b52"}, {y:dataTableLivingroom[1], color: "#f0b911"}, {y:dataTableLivingroom[2], color: "#8987c0"}, {y:dataTableLivingroom[3], color: "#63bc9b"}],
                                    }],

                                    credits: {
                                        enabled: false,
                                    },
                                });';

                        echo    '$("#pdf").empty();';

                        echo    '$("#pdf").append(\'<table><colgroup><col class="warmthColor"/><col class="luxColor"/><col class="soundColor"/><col class="ventilationColor"/></colgroup><tr><th>WARMTH</th><th>LUX</th><th>SOUND</th><th>VENTILATION</th></tr><tr><td><a href="pdf/\'+pdfLivingroom[0]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfLivingroom[0]+\'.pdf</a></td><td><a href="pdf/\'+pdfLivingroom[7]+\'.pdf" target="_blank" class="luxColorHover">\'+pdfLivingroom[7]+\'.pdf</a></td><td><a href="pdf/\'+pdfLivingroom[5]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfLivingroom[5]+\'.pdf</a></td><td><a href="pdf/\'+pdfLivingroom[6]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfLivingroom[6]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfLivingroom[1]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfLivingroom[1]+\'.pdf</a></td><td></td><td><a href="pdf/\'+pdfLivingroom[6]+\'.pdf" target="_blank" class="soundColorHover">\'+pdfLivingroom[6]+\'.pdf</a></td><td><a href="pdf/\'+pdfLivingroom[8]+\'.pdf" target="_blank" class="ventilationColorHover">\'+pdfLivingroom[8]+\'.pdf</a></td></tr><tr><td><a href="pdf/\'+pdfLivingroom[2]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfLivingroom[2]+\'.pdf</a></td><td></td><td></td><td></td></tr><tr><td><a href="pdf/\'+pdfLivingroom[3]+\'.pdf" target="_blank" class="warmthColorHover">\'+pdfLivingroom[3]+\'.pdf</a></td><td></td><td></td><td></td></tr></table>\')';
                    }

                    else {

                        echo    'var myChart = Highcharts.chart("chartContainer", {
                                    chart: {
                                        type: "bar",
                                    },

                                    title:{
                                        text:""
                                    },

                                    xAxis: {
                                        categories: ["Warmth", "Light", "Sound", "Ventilation"],
                                    },        

                                    plotOptions: {
                                        series: {
                                            colorByPoint: true,
                                            colors: ["#e95b52", "#f0b911", "#8987c0", "#63bc9b"],
                                        },
                                    },

                                    yAxis: {
                                        title: {text: "Percentage of Multi-Comfort experience"},
                                        min: 0,
                                        max: 100,
                                        minTickInterval: 5,
                                    },

                                    series: [{
                                        showInLegend: false,
                                        name: "Percentage of Multi-Comfort experience",
                                        data: [dataTableLivingroom[0], dataTableLivingroom[1], dataTableLivingroom[2], dataTableLivingroom[3]],
                                    }],

                                    credits: {
                                        enabled: false,
                                    },
                                });';

                        echo    '$("#pdf").empty()';
                    }
                ?>
            }            
        });
    });
</script>