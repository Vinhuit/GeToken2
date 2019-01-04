
<meta charset="UTF-8" />
<script src="https://code.jquery.com/jquery.js"></script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
<span id="total"></span><center><font size="4" color="red"><p>Check ID Facebook Live - Die - VipFbNow.Com</p></font> </center>
<textarea id="list_id" class="form-control" rows="12" placeholder="List ID cần check mỗi dòng 1 UID"></textarea>
<input type="text" placeholder="Nhập 1 Token Live bất kỳ để check ....." id="token" class="form-control" />
<div class="col-md-12 text-center"><button onclick="check()" class="btn btn-danger">Submit</button></div>
<div class="hihi">
    Live: <span id="liveaccount"></span>
    <textarea id="live" class="form-control" rows="6" placeholder="Live Account"></textarea>
    Die: <span id="dieaccount"></span>
    <textarea id="die" class="form-control" rows="6" placeholder="Die Account"></textarea>
</div>

<script>
    function check(){;
        var token = $('#token').val();
        var listid = $('#list_id').val();
        if(listid.length == 0){
            alert('đéo nhập thì check cái gì');
            return false;
        }else if(token.length != 0){
            $.get('https://graph.facebook.com/me?access_token='+token)
            .fail(function(){
                alert('token die không thể check');
                return false;
            }).done(function(){    
                $('.hihi').css('display','block');
            })
        }else{
            alert('Chưa nhập token kìa ');
            return false;
        }
        var live = die = 0;
        id = listid.split('\n');
        $('#total').html(id.length);
        $.each(id,function(key,value){
           $.get('https://graph.facebook.com/'+value+'?access_token='+token)
            .done(function(data){
                if(data.gender){
                    $('#live').append(value+'\n');
                    live++;
                    $('#liveaccount').html(live);          
                }else{
                    die++;
                    $('#die').append(value+'\n');
                    $('#dieaccount').html(die);
                }
            })
            .fail(function(data){
                die++;
                $('#dieaccount').html(die);
                $('#die').append(value+'\n');
            })
        })
    }
</script>
<style>
.hihi{
    display: none;
}
</style>
