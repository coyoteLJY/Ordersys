<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\wamp64\www\Ordersys\public/../application/index\view\user\userAdd.html";i:1517555585;}*/ ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">新增用户</h4>
                        <p class="category">请填写用户基本信息</p>
                    </div>
                    <div class="card-content">
                        <form action="<?php echo url('user/upload'); ?>" method="post" enctype="multipart/form-data" >
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">用户名</label>
                                        <input type="text" class="form-control" name="userAccount" onkeyup="CU(this.value)" min="5" maxlength="10" required>
                                        <span id="tips"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">职务</label>
                                        <select class="control-label" name="role" style="width: 100%">
                                            <?php if(is_array($role) || $role instanceof \think\Collection || $role instanceof \think\Paginator): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$role): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $role['roleId']; ?>"><?php echo $role['roleName']; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <input type="text" id="ImgURL" name="ImgURL" placeholder="图片地址" class="form-control" value="" disabled>

                                        <button type="button" class="am-btn am-btn-default am-btn-sm">
                                            <i class="am-icon-cloud-upload"></i> 浏览</button>
                                        <input id="doc-form-file" type="file" name="faceImg" onchange='PreviewImage(this)' multiple>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div id="imgPreview" class="am-u-sm-4 am-u-sm-centered am-u-end">
                                        <img id="img1" src="" alt="" style="width: 150px;height: 150px"/><!-- 显示缩略图 -->
                                    </div>
                                </div>

                            </div>


                            <input type="submit" class="btn btn-primary pull-right" id="upsubmit"/>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(function() {
        $('#doc-form-file').on('change', function() {
            var fileNames = '';
            $.each(this.files, function() {
                fileNames +=  this.name ;
            });
            $('#ImgURL').val(fileNames);
        });
    });
    //===【浏览文件上传地址写入文本框】结束

    //缩略图显示方法
    function PreviewImage(imgFile)
    {
        var filextension=imgFile.value.substring(imgFile.value.lastIndexOf("."),imgFile.value.length);
        filextension=filextension.toLowerCase();
        if ((filextension!='.jpg')&&(filextension!='.gif')&&(filextension!='.jpeg')&&(filextension!='.png')&&(filextension!='.bmp'))
        {
            alert("对不起，系统仅支持标准格式的照片，请您调整格式后重新上传，谢谢 !");
            document.getElementById("imgPreview").innerHTML="<img id=\"img1\" src=\"\" alt=\"\" style=\"width: 150px;height: 150px\"/>";
            imgFile.focus();
        }
        else
        {
            var path;
            if(document.all)//IE
            {
                imgFile.select();
                path = document.selection.createRange().text;
                document.getElementById("imgPreview").innerHTML="";
                document.getElementById("imgPreview").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\"" + path + "\")";//使用滤镜效果
            }
            else//FF
            {
                path=window.URL.createObjectURL(imgFile.files[0]);// FF 7.0以上
                //path = imgFile.files[0].getAsDataURL();// FF 3.0
                document.getElementById("imgPreview").innerHTML = "<img id='img1' style=\"width: 150px;height: 150px\"  src='"+path+"'/>";
                //document.getElementById("img1").src = path;
            }
        }
    }

    function CU(str){
//                return alert(str);

        var xmlhttp;
        if (str.length==0)
        {
            document.getElementById("tips").innerHTML="";
            return;
        }
        if (str.length>=5){
        xmlhttp=new XMLHttpRequest();

        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {

                if (xmlhttp.responseText){
                    document.getElementById("tips").innerHTML="可以使用该用户名";
                    document.getElementById("upsubmit").disabled = false;
                }else{
                    document.getElementById("tips").innerHTML="用户名已存在";
                    document.getElementById("upsubmit").disabled = true;
                }
            }
        }

        xmlhttp.open("GET","/index/user/register?userAccount="+str,true);
        xmlhttp.send();
        }else{
            document.getElementById("tips").innerHTML="用户名不能少于5个字符,超过10个字符";
            document.getElementById("upsubmit").disabled = true;
        }
    }

</script>