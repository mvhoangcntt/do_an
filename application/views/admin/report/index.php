<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$controller = $this->router->fetch_class();
// dd($controller);
$method = $this->router->fetch_method();
?>
<style type="text/css" media="screen">
#container1 {
    height: 614px;
}
</style>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <dfn>
                <fieldset>
                    <legend><?php echo $title_form; ?></legend>
                    <table style="font-size: 20px;" cellpadding="0" cellspacing="0" width="100%" class="table table-bordered" id="checkAll">
                        <tbody>
                          <tr>
                             <th style="width: 50%;" colspan="2">Thống kê giao dịch</th>
                             <th style="width: 50%;" colspan="2">Doanh số, sản phẩm</th>
                          </tr>
                          <tr>
                             <td style="width: 25%;">
                                Tổng giao dịch : 
                             </td>
                             <td style="width: 25%;">
                                <b style="color: red;">
                                <?php echo $tonggd; ?></b>
                             </td>
                             <td style="width: 25%;">
                                Tổng doanh số đã bán :
                             </td>
                             <td style="width: 25%;">
                                <b style="color: red;">
                                <?php echo number_format($total_money->amount_total); ?> đ</b>
                             </td>
                          </tr>

                          <tr>
                             <td>
                                Giao dịch thành công :
                             </td>
                             <td>
                                <b style="color: red;">
                                <?php echo $gd_success; ?></b>
                             </td>
                             <td>
                                Tổng sản phẩm :
                             </td>
                             <td>
                                <b style="color: red;">
                                <?php echo $total_product; ?></b>
                             </td>
                          </tr>

                          <tr>
                             <td>
                                Giao dịch thất bại :
                             </td>
                             <td>
                                <b style="color: red;">
                                <?php echo $gd_failure; ?></b>
                             </td>
                             <td>
                                Sản phẩm đã hết :
                             </td>
                             <td>
                                <b style="color: red;">
                                <?php echo $total_over; ?></b>
                             </td>
                          </tr>

                          <tr>
                             <td>
                                Đang vận chuyển :
                             </td>
                             <td>
                                <b style="color: red;">
                                <?php echo $transport_fee; ?></b>
                             </td>
                             <td>
                                Sản phẩm còn hàng :
                             </td>
                             <td>
                                <b style="color: red;">
                                <?php echo $total_conhang; ?></b>
                             </td>
                          </tr>

                          <tr>
                             <td>
                                Đã xác nhận :
                             </td>
                             <td>
                                <b style="color: red;">
                                <?php echo $confirm; ?></b>
                             </td>
                             <td>
                                Sản phẩm tồn (30 ngày) :
                             </td>
                             <td>
                                <b style="color: red;">
                                <?php echo $total_inventory; ?></b>
                             </td>
                          </tr>

                          <tr>
                             <td>
                                Chờ xử lý :
                             </td>
                             <td>
                                <b style="color: red;">
                                <?php echo $waiting; ?></b>
                             </td>
                             <td>
                                <!-- Doanh số tháng này : -->
                             </td>
                             <td>
                                <!-- <b style="color: red;"> -->
                                <!-- 0 đ</b> -->
                             </td>
                          </tr>

                          <tr>
                             <td>
                                Nhận tiền mặt :
                             </td>
                             <td>
                                <b style="color: red;">
                                <?php echo $cash; ?></b>
                             </td>
                             <td>
                                Thanh toán trực tuyến :
                             </td>
                             <td>
                                <b style="color: red;">
                                <?php echo $online; ?></b>
                             </td>
                          </tr>
                        </tbody>
                    </table>
                </fieldset>
            </dfn>
            <form style="padding-left: 5px; padding-bottom: 5px;">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="day">Chọn ngày</label>
                        <input type="date" name="day" class="form-control" value="" placeholder="">
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="month">Chọn tháng</label>
                        <select name="month" id="month" class="form-control">
                            <option value="">Chọn tháng</option>
                            <?php for ($i=12; $i >= 1; $i--) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-4">
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
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-4">
            <div class="box" style="padding-bottom: 1px;">
                <div class="tt-content">Lượt xem nhiều nhất trong tuần</div>
                <?php foreach ($listview as $news_item): ?>
                <a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>">
                <div class="list-item">
                    <div class="list-item1">
                        <img width="50px" height="50px" src="<?php echo getImageThumb($news_item->thumbnail, 360, 360); ?>" alt="<?php echo $news_item->title; ?>">
                    </div>
                    <div>
                        <?php echo $news_item->title; ?>
                    </div>
                </div>
                </a>
                <?php endforeach; ?> 
            </div>
        </div>
        <div class="col-xs-4">
            <div class="box" style="padding-bottom: 1px;">
                <div class="tt-content"><a href="<?php echo base_url('admin/report/?hangton=all'); ?>">Hàng tồn</a></div>
                <?php foreach ($hangton as $news_item): ?>
                <a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>">
                <div class="list-item">
                    <div class="list-item1">
                        <img width="50px" height="50px" src="<?php echo getImageThumb($news_item->thumbnail, 360, 360); ?>" alt="<?php echo $news_item->title; ?>">
                    </div>
                    <div>
                        <?php echo $news_item->title; ?>
                    </div>
                </div>
                </a>
                <?php endforeach; ?> 
            </div>
        </div>
        <div class="col-xs-4">
            <div class="box" style="padding-bottom: 1px;">
                <div class="tt-content"><a href="<?php echo base_url('admin/report/?hanghet=all'); ?>">Hết hàng</a></div>
                <?php foreach ($hanghet as $news_item): ?>
                <a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>">
                <div class="list-item">
                    <div class="list-item1">
                        <img width="50px" height="50px" src="<?php echo getImageThumb($news_item->thumbnail, 360, 360); ?>" alt="<?php echo $news_item->title; ?>">
                    </div>
                    <div>
                        <?php echo $news_item->title; ?>
                    </div>
                </div>
                </a>
                <?php endforeach; ?> 
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div id="container1">
                <iframe data-src="<?php echo base_url() ?>admin/report/bieudongay" width = "100%" height = "100%" scrolling="no" frameborder="0" src="<?php echo base_url() ?>admin/report/bieudongay"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div id="container1">
                <iframe data-src="<?php echo base_url() ?>admin/report/bieudothang" width = "100%" height = "100%" scrolling="no" frameborder="0" src="<?php echo base_url() ?>admin/report/bieudothang"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
