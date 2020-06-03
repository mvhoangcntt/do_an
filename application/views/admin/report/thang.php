<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$controller = $this->router->fetch_class();
// dd($controller);
$method = $this->router->fetch_method();
?>
<link rel="icon" href="<?php echo $this->templates_assets.'/favicon.png'?>" type="image/x-icon">
  <?php $asset_css[] = '../bower_components/bootstrap/dist/css/bootstrap.min.css'; ?>
  <?php $asset_css[] = '../bower_components/font-awesome/css/font-awesome.min.css'; ?>
  <?php $asset_css[] = '../bower_components/Ionicons/css/ionicons.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bs-iconpicker/css/bootstrap-iconpicker.min.css'; ?>
  <?php $asset_css[] = '../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'; ?>
  <?php $asset_css[] = '../bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css'; ?>
  <?php $asset_css[] = '../bower_components/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css'; ?>
  <?php $asset_css[] = '../bower_components/datatables.net-rowreorder-bs/css/rowReorder.bootstrap.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-daterangepicker/daterangepicker.css'; ?>
  <?php $asset_css[] = '../bower_components/fancybox/dist/jquery.fancybox.min.css'; ?>
  <?php $asset_css[] = '../plugins/pace/pace.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-sweetalert/dist/sweetalert.css'; ?>
  <?php $asset_css[] = '../bower_components/toastr/toastr.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-daterangepicker/daterangepicker.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'; ?>
  <?php $asset_css[] = '../css/bootstrap-datetimepicker.min.css'; ?>
  <?php $asset_css[] = '../bower_components/select2/dist/css/select2.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css'; ?>
  <?php $asset_css[] = 'AdminLTE.min.css'; ?>
  <?php $asset_css[] = 'skins/_all-skins.min.css'; ?>
  <?php $asset_css[] = 'custom.css'; ?>
  <?php $asset_css[] = 'myproduct.css'; ?>
  <?php $asset_css[] = 'orders.css'; ?>
  <?php
  minifyCSS($asset_css, $this->templates_assets, false, true);
  ?>
<style type="text/css" media="screen">
#container {
    height: 400px; 
}
#container1 {
    height: 400px; 
}

.highcharts-figure, .highcharts-data-table table {
    min-width: 420px; 
    max-width: 1000px;
    margin: 1em auto;
}
.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}


/* ----------------- */


</style>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                
<script src="<?php echo base_url('public/admin/js') ?>/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url('public/admin/js') ?>/highcharts.js"></script>
<script src="<?php echo base_url('public/admin/js') ?>/highcharts-more.js"></script>
<script src="<?php echo base_url('public/admin/js') ?>/exporting.js"></script>
<script src="<?php echo base_url('public/admin/js') ?>/export-data.js"></script>
<script src="<?php echo base_url('public/admin/js') ?>/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
   <!--  <p class="highcharts-description">
        Chart with buttons to modify options, showing how options can be changed
        on the fly. This flexibility allows for more dynamic charts.
    </p> -->

    <button id="plain">Biểu đồ cột</button>
    <button id="inverted">Cột ngang</button>
    <button id="polar">Hình tròn</button>

<div class="row">
    <form>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="year">Chọn năm</label>
                <select name="year" id="year" class="form-control">
                    <option value="">Chọn năm</option>
                    <?php for ($i=date("Y"); $i >= 2019; $i--) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group" style="margin-left: 15px">
            <input type="submit" class="btn btn-primary" value="Lọc">
        </div>
    </form>
</div>

</figure>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
var chart = Highcharts.chart('container', {

    title: {
        text: 'Biểu đồ phát triển tháng'
    },

    subtitle: {
        text: 'Cột dọc'
    },

    yAxis: {
        title: {
            text: 'Số đơn đặt hàng'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },

    xAxis: {
        categories: <?php echo json_encode($numberday); ?>
    },

    series: [{
        type: 'column',
        colorByPoint: true,
        data: <?php echo json_encode($data); ?>,
        showInLegend: false
    }]

});


$('#plain').click(function () {
    chart.update({
        chart: {
            inverted: false,
            polar: false
        },
        subtitle: {
            text: 'Cột dọc'
        }
    });
});

$('#inverted').click(function () {
    chart.update({
        chart: {
            inverted: true,
            polar: false
        },
        subtitle: {
            text: 'Cột ngang'
        }
    });
});

$('#polar').click(function () {
    chart.update({
        chart: {
            inverted: false,
            polar: true
        },
        subtitle: {
            text: 'Hình tròn'
        }
    });
});


</script>