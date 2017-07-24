<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加产品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link rel="stylesheet" type="text/css" href="/Public/Admin/css/mine.css" />
        <script type="text/javascript" src="/Public/Common/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="/Public/Common/js/previewImage.js"></script>
        <!-- UCenter -->
        <link rel="stylesheet" type="text/css" href="/Public/Common/ueditor/themes/default/css/umeditor.css" />
        <script type="text/javascript" src="/Public/Common/ueditor/third-party/jquery.min.js"></script>
        <script type="text/javascript" src="/Public/Common/ueditor/third-party/template.min.js"></script>
        <script type="text/javascript" src="/Public/Common/ueditor/umeditor.config.js"></script>
        <script type="text/javascript" src="/Public/Common/ueditor/umeditor.min.js"></script>
        <script type="text/javascript" src="/Public/Common/ueditor/lang/zh-cn/zh-cn.js"></script>
        <!-- validation -->
        <!-- <script src="/Public/Common/validation/lib/jquery.js"></script> -->
        <!-- <script src="/Public/Common/validation/dist/jquery.validate.min.js"></script> -->

        <style type="text/css">
            label.error { color: #f00; }
        </style>

    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：产品管理-》添加产品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('showlist');?>">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="<?php echo U('add');?>" method="post" id="reg_form" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>产品名称</td>
                    <td>
                        <input type="text" name="name" placeholder="必填；最大30个字符" />
                    </td>
                </tr>
                <tr>
                    <td>产品编号</td>
                    <td>
                        <input type="text" name="number" placeholder="必填；最大30个字符" />
                    </td>
                </tr>
                <tr>
                    <td>产品分类</td>
                    <td>
                        <select name="cate_id">
                            <option value="">请选择</option>
                            <?php if(is_array($cate_data)): foreach($cate_data as $key=>$c): ?><option value="<?php echo ($c["id"]); ?>"><?php echo ($c["cate_name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">
                        产品规格 <a href="javascript:;" class="type_add">[+]</a>
                    </td>
                    <td>
                        规格描述 <input type="text" name="type[]" placeholder="最大30个字符" />
                    </td>
                </tr>
                <tr>
                    <td>
                        产品价格（元）<input type="text" name="price[]" placeholder="保留2位小数" />
                    </td>
                </tr>
                <tr>
                    <td>封面图片</td>
                    <td>
                        <input type="file" name="image" onchange="previewImage(this)" accept="image/png,image/jpeg" />
                        <div id="preview" style="display: none;">
                            <img id="imghead" border=0 src=''>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>产品说明</td>
                    <td>
                        <script name="content" type="text/plain" id="myEditor" style="width:600px;height:240px;"></script>
                        <script type="text/javascript">
                            // 实例化UCenter
                            var um = UM.getEditor('myEditor');
                        </script>
                    </td>
                </tr>
                <tr>
                    <td>是否显示</td>
                    <td><select name="status" id="">
                        <option value="1">显示</option>
                        <option value="-1">不显示</option>
                    </select></td>
                </tr>
                <tr>
                    <td>是否推送</td>
                    <td><select name="is_push" id="">
                        <option value="1">推送</option>
                        <option value="0">不推送</option>
                    </select></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <script type="text/javascript">
            $(function(){
                // 增加产品规格
                $('.type_add').on('click',function(){
                    new_tr = '<tr><td rowspan="2">产品规格 <a href="javascript:;" class="type_mus"">[-]</a></td><td>规格描述 <input name="type[]" type="text"></td></tr><tr><td>产品价格（元） <input name="price[]" type="text" placeholder="保留2位小数"></td></tr>';
                    this_tr = $(this).parents('tr').next('tr');
                    this_tr.after(new_tr);
                })
                // 减少产品规格
                $('table').delegate('.type_mus','click',function(){
                    $(this).parents('tr').next('tr').remove();
                    $(this).parents('tr').remove();
                })
                // 表单验证-使用插件
                // 验证产品名称、产品编号、产品分类
                $("#reg_form").validate({
                    rules: {
                        name:{
                            required:true,
                            maxlength:30
                        },
                        number:{
                            required:true,
                            maxlength:30
                        },
                        cate_id:{
                            required:true
                        },
                    },
                    messages: {
                        name:{
                            required:"请输入产品名称",
                            maxlength:"最多输入30个字符"
                        },
                        number:{
                            required:"请输入产品编号",
                            maxlength:"最多输入30个字符"
                        },
                        cate_id:{
                            required:"必须选择产品分类"
                        },
                    }
                });
            })
        </script>
        <script type="text/javascript">
            // 表单验证-自定义
            // 验证产品规格
            $(function(){
                $("#reg_form").submit(function(){
                    var typeEmpty = 0;
                    $(":input[name='type[]']").each(function(){
                        var type = $(this);
                        var price = $(this).parents("tr").next("tr").find(":input[name='price[]']");
                        if ((type.val()!="" && price.val()=="") || (type.val()=="" && price.val()!="")) {
                            label = '<label class="error error_1">&nbsp;&nbsp;规格和价格必须一一对应</label>';
                            type.after(label);
                            price.after(label);
                            return false;
                        }else if(type.val().length>30){
                            label = '<label class="error error_2">&nbsp;&nbsp;最多输入30个字符</label>';
                            type.after(label);
                            return false;
                        }else if (type.val()!="" && price.val()!="") {
                            typeEmpty = 1;
                        }
                    })
                    if (typeEmpty == 0) {
                        label = '<label class="error error_3">&nbsp;&nbsp;必须有至少一组规格和价格</label>';
                        $(":input[name='type[]']").after(label);
                        $(":input[name='price[]']").after(label);
                        return false;
                    }
                });
                $("tr").delegate(":input[name='type[]']","blur",function(){
                    var type = $(this);
                    var price = $(this).parents("tr").next("tr").find(":input[name='price[]']");
                    if (type.val()!="") {
                        if (type.val().length<=30) {
                            type.siblings("label.error_2").remove();
                        }
                        if (price.val()!="") {
                            type.siblings("label.error_1").remove();
                            price.siblings("label.error_1").remove();
                            $(":input[name='type[]']").each(function(){
                                var t = $(this);
                                var p = $(this).parents("tr").next("tr").find(":input[name='price[]']");
                                t.siblings("label.error_3").remove();
                                p.siblings("label.error_3").remove();
                            })
                        }
                    }
                });
                $("tr").delegate(":input[name='price[]']","blur",function(){
                    var type = $(this).parents("tr").prev("tr").find(":input[name='type[]']");
                    var price = $(this);
                    if ((type.val()!="") && (price.val()!="")) {
                        type.siblings("label.error_1").remove();
                        price.siblings("label.error_1").remove();
                        $(":input[name='type[]']").each(function(){
                            var t = $(this);
                            var p = $(this).parents("tr").next("tr").find(":input[name='price[]']");
                            t.siblings("label.error_3").remove();
                            p.siblings("label.error_3").remove();
                        })
                    }
                });
            })
        </script>
    </body>
</html>