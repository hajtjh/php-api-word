<input type="hidden" name="file_name" value="<?php echo $data['file_name'];?>">
<input type="hidden" name="start_using" value="<?php echo $data['config']['start_using'];?>">
<input type="hidden" id="start_using_notes" value="//on开启 off关闭 严格区分大小写">

<div class="ayui-row">
    <div class="layui-col-md8">
        <div class="layui-form-item">
            <label class="layui-form-label">文档目录：</label>
            <div class="layui-input-block">
                <input type="text" name="dir_name"  id="record_number_value" autocomplete="off" class="layui-input" value="<?php echo $data['config']['dir_name'];?>">
                <input type="hidden" id="dir_name_notes" value="//文档存放目录">
            </div>

        </div>
    </div>
</div>
<div class="ayui-row">
    <div class="layui-col-md12" style="height:0">&nbsp;</div>
</div>


<script>
    layui.use(["jquery", "layer", "form", "element"], function() {
        var $ = layui.$;
        var layer = layui.layer,
            form = layui.form,
            element = layui.element;
        form.render();
        var web_token = $("#web_token").val();

        form.on("submit(setUp)", function(data) {
            var record_number_notes = $('#record_number_notes').val();
            var content_notes = $('#content_notes').val();
            var overhead_information_notes = $('#overhead_information_notes').val();
            var start_using_notes = $('#start_using_notes').val();
            var newData = [
                {"key":"start_using","value":data.field.start_using,"notes":start_using_notes},
                {"key":"record_number","value":data.field.record_number,"notes":record_number_notes},
                {"key":"content","value":data.field.content,"notes":content_notes},
                {"key":"overhead_information","value":data.field.overhead_information,"notes":overhead_information_notes}
            ];

            $.ajax({
                type: "post",
                url: "/control/setUp/0",
                headers: {
                    "Authorization": web_token
                },
                data: {file_name:data.field.file_name,data:JSON.stringify(newData)},
                success: function(result) {
                    result = JSON.parse(result);

                    if (result.code == 200) {
                        layer.msg(result.message);
                        setTimeout(function() {
                           window.location.href = result.url + "?token=" + web_token
                        }, 1000)
                    }
                    layer.msg(result.message)
                },
            })
            return false
        })
    });
</script>