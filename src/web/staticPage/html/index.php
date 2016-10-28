<div id="main">
    <div id="toolbar">
        <div id="tabsStatus" style="padding: 5px 0;">
            <div title="上线中" data-status="1" style="display:none;"></div>
            <div title="下线中" data-status="0" style="display:none;"></div>
        </div>
        <div class="tb_box">
            <input id="filterSearch" class="easyui-searchbox" style="width:150px;" data-options="prompt:'广告名称/ID'"/>
            全部人群：<input id="filterStation" class="easyui-combobox" value=""/>
            全部广告位：<input id="filterAd" class="easyui-combobox" value=""/>
            <a href="#" class='easyui-linkbutton J-search' plain="true" iconcls="icon-search">搜索</a>
        </div>
    </div>
    <table id="list"></table>
</div>

<!--编辑-->
<div style="display: none;">
    <div id="dialogInput" style="padding: 10px;">
        <form id="formInput" method="post">
            <input type="hidden" name="_id"/>
            <input id="formInputHdStationId" type="hidden" name="station_id"/>
            <input id="formInputHdPlatform" type="hidden" name="platform"/>
            <input id="formInputHdMaterialId" type="hidden" name="material_id"/>
            <input id="formInputforce" type="hidden" name="force"/>
            <ul>
                <li class="f_item">
                    <div class="box">
                        <div class="f_label">
                            <span>广告名称: </span>

                        </div>
                        <div class="box_flex f_content">
                            <input type="text" name="name" value="" style="width:300px;" class="easyui-textbox"
                                   required="true"/>
                        </div>
                    </div>
                </li>
                <li class="f_item">
                    <div class="box">
                        <div class="f_label">
                            <span>目标广告位: </span>
                        </div>
                        <div class="box_flex f_content">
                            <input id="formInputAdId" style="width: 300px;" class="easyui-combobox" name="ad_id"
                                   required="true"/>
                        </div>
                    </div>
                </li>

                <li class="f_item">
                    <div class="box">
                        <div class="f_label">
                            <span>所属平台: </span>
                        </div>
                        <div class="box_flex f_content">
                            <input id="formInputPlatform" style="width: 300px;" class="easyui-combobox" name="platforms[]"
                                   required="true"/>
                        </div>
                    </div>
                </li>


                <li class="f_item">
                    <div class="box">
                        <div class="f_label">
                            <span>目标人群: </span>
                        </div>
                        <div class="box_flex f_content">
                            <input id="formInputStations" class="easyui-combobox" name="station_ids[]" required="true"/>
                        </div>
                    </div>
                </li>
                <li class="f_item">
                    <div class="box">
                        <div class="f_label">
                            <span>投放区域: </span>
                        </div>
                        <div class="box_flex f_content">
                            <input id="formInputArea" class="easyui-textbox" name="area" required="true" style="width:200px;"/>
                            <a id="btn_area" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'">添加</a>
                        </div>
                    </div>
                </li>
                <li class="f_item">
                    <div class="box">
                        <div class="f_label">
                            <span>广告标题: </span>

                        </div>
                        <div class="box_flex f_content">
                            <input type="text" name="title" value="" style="width:300px;" class="easyui-textbox"/>
                        </div>
                    </div>
                </li>

                <li class="f_item">
                    <div class="box">
                        <div class="f_label">
                            <span>广告副标题: </span>

                        </div>
                        <div class="box_flex f_content">
                            <input type="text" name="subtitle" value="" style="width:300px;" class="easyui-textbox"/>
                        </div>
                    </div>
                </li>

                <li class="f_item">
                    <div class="box">
                        <div class="f_label">
                            <span>副标题样式: </span>
                        </div>
                        <div class="box_flex f_content">
                            <input id="formInputStyle" name="subtitle_style"/>
                        </div>
                    </div>
                </li>

                <li class="f_item">
                    <div class="box">
                        <div class="f_label">
                            <span>广告物料: </span>
                        </div>
                        <div class="box_flex f_content">
                            <input id="formInputMaterialId" type="text" name="material_ids[]" value=""/>
                        </div>
                    </div>
                </li>

                <li class="f_item">
                    <div class="box">
                        <div class="f_label">
                            <span>更多连接到: </span>

                        </div>
                        <div class="box_flex f_content">
                            <input type="text" name="url" value="" style="width:300px;" class="easyui-textbox"/>
                        </div>
                    </div>
                </li>

                <li class="f_item">
                    <div class="box">
                        <div class="f_label">
                            <span>广告状态: </span>
                        </div>
                        <div class="box_flex f_content">
                            <input id="formInputStatus" name="status"/>
                        </div>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</div>
<!--/编辑-->
<link rel="stylesheet" href="http://cache.amap.com/lbs/static/main1119.css" />
<link href="/static/manage/modules/system/village.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=78051f9e939fa823e65b292318c5aaf0&plugin=AMap.Autocomplete,AMap.PlaceSearch,AMap.Geocoder,AMap.Scale,AMap.OverView,AMap.ToolBar,AMap.DistrictSearch,AMap.PolyEditor,AMap.CircleEditor,AMap.DistrictSearch"></script>
<script type="text/javascript" src="/static/manage/modules/system/map.js"></script>
<script src="/static/manage/widget/upload.js"></script>

<script>


;
(function (app) {
    var wWidth = $(window).width();
    var wHeight = $(window).height();

    var AD_COM_DATA = <?php echo json_encode($ad) ?>;
    var PLATFORM_DATA = [
        {"value": 1, "text": "iOSApp"},
        {"value": 2, "text": "安卓App"},
        {"value": 3, "text": "微信"}
    ];
    var MATERIAL_DATA = <?php echo json_encode($material) ?>;

    app.page = {
        options: {
            name: ''
        },
        init: function (opts) {
            $.extend(this.options, opts);
            this.api = this.options.api;
            this.columns = this.options.columns;
            this._initData();
            this._initAttr();
            this._initPage();
            this._initList();
            this._initInput();
            this._initEvents();
            this.refreshComponents();
        },
        //刷新组件状态
        refreshComponents: function () {

        },
        // 初始化数据
        _initData: function () {
            this.listType = 'Sale';
        },
        // 初始化属性
        _initAttr: function () {
            var that = this;
        },
        // 初始化页面
        _initPage: function () {
            var that = this;
            this.$container = $("#main");
            this.$container.on('click', '.J-search', function () {
                that.search();
            });
        },
        //初始化列表组件
        _initList: function () {
            var that = this;
            this.$tabsStatus = $("#tabsStatus");
            this.$tabsStatus.tabs({
                border: false,
                plain: true,
                onSelect: function (title) {
                    if (that.isInit) {
                        that.search();
                    }
                }
            });

            this.$filterSearch = $("#filterSearch");
            this.$filterSearch.searchbox({
                searcher: function (value) {
                    that.search();
                }
            });

            this.$filterStation = $("#filterStation");
            this.$filterStation.combobox({
                width: 150,
                editable: false,
                multiple: false,
                valueField: '_id',
                textField: 'name',
                data: DDXQ.configData.get({
                    url: this.api['stationComboboxList'],
                    success: function (res) {
                        res.unshift(DDXQ.enum.COMBOBOX_ALL);
                    }
                })
            });

            this.$filterAd = $("#filterAd");
            this.$filterAd.combobox({
                width: 150,
                editable: false,
                multiple: false,
                valueField: 'value',
                textField: 'text',
                data: AD_COM_DATA
            });


            this.$list = $("#list");
            this.$list.datagrid({
                url: this.api['getRows'],
                height: wHeight - 20,
                title: this.getTitle('列表'),
                fitColumns: true,
                autoRowHeight: true,
                striped: true,
                toolbar: '#toolbar',
                tools: [{
                    iconCls: 'icon-add',
                    handler: function () {
                        that.add();
                    }
                }],
                singleSelect: true,
                selectOnCheck: false,
                checkOnSelect: false,
                pagination: true,
                pageList: [20, 30, 50],
                pageSize: 20,
                nowrap: false,
                idField: '_id',
                sortName: 'sort',
                sortOrder: 'desc',
                columns: this.columns,
                queryParams: {
                    filter_status: 1
                },
                onClickRow: function (index, row) {

                },
                onBeforeLoad: function () {
                    that.refreshComponents();
                    $(this).datagrid('uncheckAll');
                },
                onLoadSuccess: function () {
                    that.isInit = true;
                }
            });
        },
        //初始化编辑&添加的输入
        _initInput: function () {
            var that = this;

            this.$dialogInput = $("#dialogInput");
            this.$dialogInput.dialog({
                title: that.getTitle('录入'),
                width: 500,
                height: 400,
                modal: true,
                closed: true,
                buttons: [{
                    text: '确认',
                    iconCls: 'icon-ok',
                    handler: function () {
                        that.$formInput.submit();
                    }
                }, {
                    text: '取消',
                    iconCls: 'icon-cancel',
                    handler: function () {
                        that.$dialogInput.dialog('close');
                    }
                }]
            });


            this.$formInputAdId = $("#formInputAdId");
            var adData = AD_COM_DATA.concat([]);
            adData.shift();
            console.log("formInputAdId");
            console.log(adData);

            this.$formInputAdId.combobox({
                width: 300,
                editable: false,
                multiple: false,
                required: true,
                valueField: 'value',
                textField: 'text',
                data: adData
            });

            this.$formInputAdId.combobox({
                onChange: function (n,o) {
                    console.log("getText:"+$("#formInputAdId").combobox('getText'))
                    console.log("getValue:"+$("#formInputAdId").combobox('getValue'))
                }
            });




            this.$formInputPlatform = $("#formInputPlatform");
            this.$formInputHdPlatform = $("#formInputHdPlatform");

            this.$formInputPlatform.combobox({
                width: 300,
                editable: false,
                multiple: true,
                required: true,
                valueField: 'value',
                textField: 'text',
                data: PLATFORM_DATA
            });

            this.$formInputStations = $("#formInputStations");
            this.$formInputHdStationId = $("#formInputHdStationId");
            this.$formInputStations.combobox({
                width: 300,
                editable: true,
                multiple: true,
                valueField: '_id',
                textField: 'name',
                required: true,
                data: DDXQ.configData.get({
                    url: this.api['stationComboboxList']
                })
            });

            MATERIAL_DATA.shift();
            this.$formInputMaterialId = $("#formInputMaterialId");
            this.$formInputHdMaterialId = $("#formInputHdMaterialId");
            this.$formInputMaterialId.combobox({
                width: 300,
                editable: true,
                multiple: true,
                valueField: 'value',
                textField: 'text',
                required: true,
                data: MATERIAL_DATA
            });

            this.$formInputMaterialId.combobox({
                onChange: function (n,o) {
                    if($("#formInputAdId").combobox('getValue'))
                    console.log("getText:"+$("#formInputAdId").combobox('getText'))
                    console.log("getValue:"+$("#formInputAdId").combobox('getValue'))
                }
            });

            this.$formInputStatus = $("#formInputStatus");
            this.$formInputStatus.combobox({
                width: 120,
                editable: true,
                valueField: '_id',
                textField: 'name',
                required: true,
                data: [
                    {
                        _id: "1",
                        name: "上线"
                    },
                    {
                        _id: "0",
                        name: "下线"
                    }
                ]
            });

            this.$formInputStyle = $("#formInputStyle");
            this.$formInputStyle.combobox({
                width: 120,
                editable: true,
                valueField: '_id',
                textField: 'name',
                required: true,
                data: [
                    {
                        _id: "1",
                        name: "橙色"
                    },
                    {
                        _id: "0",
                        name: "灰色"
                    }
                ]
            });

            this.$formInput = $("#formInput");
            this.$formInput.form({
                onSubmit: function () {
                    var $this = $(this);
                    this.url = $this.attr('action');
                    var isValid = $this.form('validate');

                    if (isValid) {
                        that.$formInputHdStationId.val(that.$formInputStations.combobox("getValues").join(','));
                        that.$formInputHdPlatform.val(that.$formInputPlatform.combobox("getValues").join(','));
                        that.$formInputHdMaterialId.val(that.$formInputMaterialId.combobox("getValues").join(','));
                        $.messager.progress();
                    } else {
                        $.messager.alert('提示', '请填写完整');
                    }
                    return isValid;
                },
                success: function (res) {
                    $.messager.progress('close');
                    var res = JSON.parse(res);
                    if (res.success&&(res.code!=2)) {
                        that.$dialogInput.dialog('close');
                        var status = that.$formInputStatus.combobox("getValue");
                        that.$tabsStatus.tabs("select", status == 0 ? 1 : 0);
                        that.$list.datagrid('reload');
                        showAlert(res.msg, res.success);
                    }
                    else if(res.code==2)
                    {
                        $.messager.confirm('上线提示','广告位上已经有其他“上线中”的广告了,继续上线会使之前的广告下线，确定继续上线吗？',function(r){
                            if (r){
                                $('#formInputforce').val('1');
                                $("#formInput").submit();
                            }
                        });
                    }else{
                        showAlert(res.msg, res.success);
                    }
                }
            });

        },
        // 初始化事件
        _initEvents: function () {
            var that = this;

            //编辑
            this.$container.delegate('.J-edit', 'click', function () {
                that.edit($(this).data('id'));
            });

            //删除
            this.$container.delegate('.J-remove', 'click', function () {
                that.remove($(this).data('id'));
            });
            //区域选择
            $(document).delegate('#btn_area', 'click', function(){
                var area=$("#formInput input[name='area']").val();
                var obj={
                    eventTarget:$(this),//发生事件对象
                    address:"上海市",
                    byAddress:true,
                    district:true, //是否显示行政区域
                    areaShow:true,  //区域选择
                    rightMenuShow:true,
                    areaSleDiv:false //小区是否显示
                };
                if(area){
                    var areaArr=[];
                    var jsonArea=JSON.parse(area);
                    $.each(jsonArea,function(index,value){
                        var newArr=[];newArr.push(value);
                        areaArr.push({
                            type: "Polygon",
                            coordinates:newArr
                        })
                    });
                    obj.areaval=areaArr;
                }
                mapSelect.mapPostion(obj);
            });
            //区域选择
            $(document).delegate('.sure-map', 'click', function(){
                var areaResult=mapSelect.getValue_polygon();
                $.ajax({
                    url:'/map/map/save',
                    type:"POST",
                    dataType:"json",
                    data:{
                        type:3,    //广告类型
                        area:JSON.stringify(areaResult),  //区域数组
                        channel_id:$("#formInput input[name='_id']").val()  //广告id
                    },
                    success: function(data){
                        $.messager.alert('提示',data.msg);
                        mapSelect.attrs.default.mapId.hide();
                        $("#formInputArea").textbox('setValue',"已选择");
                        $("#formInput input[name='area']").val(JSON.stringify(areaResult));
                    }
                });
            });
        },
        getTitle: function (name){
            return this.options.name + name;
        },
        add: function () {
            this.$formInput.form("clear");
            this.$formInput.attr("action", this.api['insert']);
            this.$formInput.form("load", {});
            this.$dialogInput.dialog('open');
        },
        //编辑
        edit: function () {
            this.$formInput.form("clear");
            this.$formInput.attr("action", this.api['update']);
            var item = $.extend({}, this.$list.datagrid("getSelected"));

            item.station_id = [item.station_id];

            if ($.isArray(item.platform)) {
                item["platforms[]"] = item.platform;
            } else {
                item["platforms[]"] = (item.platform+"").split(',');
            }

            if ($.isArray(item.station_id)) {
                item["station_ids[]"] = item.station_id[0];
            } else if (typeof item.platform == 'string') {
                item["station_ids[]"] = item.station_id.split(',');
            }

            if ($.isArray(item.material)) {
                item["material_ids[]"] = item.material;
            } else if (typeof item.material == 'string') {
                item["material_ids[]"] = (item.material+"").split(',');
            }
            console.log(item);
           //TODO:
            this.$formInput.form("load", item);
            this.$dialogInput.dialog('open');
        },
        //列表
        list: function (params) {
            this.$list.datagrid(params);
        },
        reload: function () {
            this.$list.datagrid("reload");
        },
        //搜索
        search: function () {
            this.list({
                url: this.api['getRows'],
                pageNum: 1,
                queryParams: {
                    filter_status: this.$tabsStatus.tabs('getSelected').data('status'),
                    search: this.$filterSearch.searchbox('getValue'),
                    filter_station: this.$filterStation.combobox('getValue'),
                    filter_ad: this.$filterAd.combobox('getValue')
                }
            });
        },
        //删除
        remove: function (ids, callback) {
            var that = this;
            if ($.isEmptyObject(ids)) {
                return $.messager.alert('提示', "请先选择要删除的" + this.options.name);
            }

            if ($.isArray(ids)) {
                ids = ids.join(',');
            }

            var params = {
                _id: ids
            };

            var title = '删除' + this.options.name;
            var tip = '删除后' + this.options.name + '不能再查询和编辑，确定将选中' + this.options.name + '删除吗？';

            $.messager.confirm(title, tip, function (isConfirm) {
                if (isConfirm) {
                    $.messager.progress();
                    $.ajax({
                        type: 'post',
                        url: that.api['delete'],
                        data: params,
                        dataType: "json",
                        success: function (data) {
                            $.messager.progress('close');
                            if (data.success) {
                                if ($.isFunction(callback)) {
                                    callback(data);
                                } else {
                                    that.reload();
                                }
                                $.messager.show({
                                    title: '提示',
                                    msg: data.message,
                                    timeout: 2500,
                                    showType: 'slide'
                                });
                            } else {
                                $.messager.alert('提示', data.message, 'error');
                            }
                        },
                        error: function () {
                            $.messager.progress('close');
                        }
                    });
                }
            });
        }
    };

}(window));

//初始化页面
$(function () {
    var baseUrl = '/advertise/adPublish/';

    var ENUMS = {
        STATUS: {
            '0': '下线',
            '1': '上线'
        },
        PLATFORM: {
            '0': '全部',
            '1': 'iOSApp',
            '2': '安卓App',
            '3': '微信'
        }
    };

    window.page.init({
        name: '广告',
        key: 'adPublish',
        api: {
            'insert': baseUrl + 'insert',
            'update': baseUrl + 'update',
            'getRows': baseUrl + 'list',
            'stationComboboxList': '/serviceStation/station/comboboxList',
            'adPositionComboboxList': '/data/advertise/adPosition/list'
        },
        columns: [[{
            field: '_id',
            title: '_id',
            hidden: true
        }, {
            field: 'number',
            title: '序号',
            align: 'center',
            formatter: function (value, row, index) {
                return (index + 1);
            }
        }, {
            field: 'name',
            title: '广告',
            width: 50
        }, {
            field: 'ad_id',
            title: '广告位ID',
            width: 10,
            align: 'center'
        }, {
            field: 'ad_text',
            title: '广告位',
            align: 'center',
            width: 20,
            formatter: function (value) {
                return value.name + '<br />(' + value.format + ')';
            }
        }, {
            field: 'material_text',
            title: '物料',
            align: 'center',
            width: 20,
            formatter: function (result){
                var html="";
                $.each(result,function(i,value){
                    if(!$.isEmptyObject(value)){
                        var str=value.name;
                        html=html+str+";";
                    }
                });
                return html;
            }
        },
            {
                field: 'station_text',
                title: '人群',
                align: 'center',
                width: 20
            },

            {
                field: 'platform',
                title: '平台',
                align: 'center',
                width: 10,
                formatter: function (value) {
                    var list = [];
                    if ($.isArray(value)) {
                        list = value;
                    }else{
                        list = (value+"").split(',');
                    }

                    var v = [];
                    for (var i = 0; i < list.length; i++) {
                        v.push(ENUMS['PLATFORM'][list[i]])
                    }
                    return v.join(',');
                }
            },
            {
                field: 'status',
                title: '状态',
                align: 'center',
                width: 10,
                formatter: function (value) {
                    return ENUMS['STATUS'][value];
                }
            },
            {
                field: 'update_time',
                title: '更新时间',
                width: 15,
                align: 'center',
                formatter: function (value) {
                    return timeFormat(value ? value : value);
                }
            },
            {
                field: 'actions',
                title: '操作',
                width: 15,
                align: 'center',
                formatter: function (value, row) {
                    var html = '<a class="J-edit btn btn-info" href="javascript:;" data-id="' + row._id + '" data-name="' + row.name + '">编辑</a> ';
                    return html;
                }
            }]]
    });
});
</script>