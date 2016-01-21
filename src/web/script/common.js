var Common=function(headTpl,footerTpl){
    this.headTpl='/modules/header/header.tpl';
    this.footerTpl='/modules/footer/footer.tpl';
};
Common.prototype= {
    header: $(".boke-common-header"),
    footer: $(".boke-common-footer"),
    ajaxCommon:{
        type: "GET",
        dataType: "html",
        error:function(){
            alert("系统出错");
        }
    },
    initHedaer: function(){
        var that=this;
        var params=$.extend(true,{},that.ajaxCommon,{
            url:that.headTpl,
            success:function(data){
                that.header.html(data);
            }
        });
        $.ajax(params);
     },
    initFooter: function () {
        var that=this;
        var params=$.extend(true,{},that.ajaxCommon,{
            url:that.footerTpl,
            success:function(data){
                that.footer.html(data);
            }
        });
        $.ajax(params);
    }
};

$(function(){
    var headerFn = new Common();
    headerFn.initHedaer();
    headerFn.initFooter();
});











