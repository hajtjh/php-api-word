博客地址：https://www.php63.cc <br>
####使用说明<br>
    1.注释规范<br>
    /**<br>
     * @method 注册用户<br>
     * @url    email/send?token=xxx<br>
     * @http  POST<br>
     * @param  token              string [必填] 调用接口凭证 (post|get)<br>
     * @param  type               int    [必填] 用户类型：1普通 2代理<br>
     * @param  phone              string [必填] 注册手机号<br>
     * @author soul<br>
     * @copyright 2017/4/13<br>
     * @return {"status":false,"data":'失败原因',"code":0}<br>
     */<br>
     2.使用方法，将文件夹放入你指定的地方，引入word.class.php 然后实例化下即可<br>
