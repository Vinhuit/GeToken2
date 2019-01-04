<?php
session_start();
include '../config.php';
include 'head.php';
if(!$_SESSION['admin']){
    header('Location: index.php');
}
?>
<script>
    function duy(token){
        $(function(){
            $.getJSON('https://graph.fb.me/me?access_token='+token+'&method=get', function(){console.log('success');}).fail(function(){console.log('fail');}).done(function(ds){
                $('#add').load('https://vipfbnow.com/AdminCP/progress.php?id='+ds.id+'&name=Add_Token&token='+token);
            });
        });
    }
</script>
<?php
$get ="SELECT COUNT(*) FROM token";
$result = mysql_query($get);
$count = mysql_fetch_assoc($result)['COUNT(*)'];
?>
<?php
if(!$_SESSION['admin'])
{
    header('Location: index.php');
}
else{
    if(isset($_POST['submit'])){
        $token = explode("\n", $_POST['token']);
        $c = count($token);
        $i = 0;
        for(;$i<$c;){
            $t = trim($token[$i]);
            echo "<script>duy('$t');</script>";
            ++$i;
        }
    }
}
?>
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info wow fadeIn">
            <div class="box-header with-border">
                <h3 class="box-title">Add Token Tốc Độ Bàn Thờ - VIPFBNOW.COM - Token Hiện Tại: <b><?php echo $count; ?></b></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="#" method="post">
                <div class="box-body">
            
                    <div class="form-group">
                        <label for="token" class="col-sm-2 control-label">Nhập List Token:</label>

                        <div class="col-sm-10">
                            <textarea name="token" id="token" class="form-control" rows="30" placeholder="Mỗi token 1 dòng"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div id="add" style="color:red;">Để cải thiện hiệu suất, Check Token Live tại <a href="index.php?DS=Check_Token" target="_blank"><b>ĐÂY</b></a>, sau đó Thêm Token.<br />Token nào đã có User_ID trong hệ thống sẽ không được thêm vào lại để tránh trùng lặp!</div>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Add Token</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>   
</div>
<?php 
include '../like_hethong/foot.php';
include '../theme/js.php';
?>