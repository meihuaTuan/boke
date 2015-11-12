/**
 * =====================================================
 * project： 曹操
 * @VERSION@ (http://www.caocao.ddxq.mobi/)
 * Controller-date: 2014-09-24
 * Copyright 2013 叮咚小区
 * designed by @doob-yang.
 * @BUILD@
 * docs:
 * UI框架: ratchet
 * 类库: zepto
 * 主框架: require
 * 模板引擎: template
 * 打包工具: r
 * =====================================================
 */
window.__uri = function (uri) {
    return uri;
};
//require 配置
require.config({
    paths: {
        /* 类库部分 */
        jquery: 'jquery',
        template: 'baiduTemplate'
    },
    shim: {
        $: {exports: '$'},
        Fastclick: {exports: 'Fastclick'}
    }
});

require.intload = function () {
    require(['jquery','template'],function (jquery, template) {
        alert($)
 });
};
require.intload();






