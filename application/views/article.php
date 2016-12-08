<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- <link href="/style/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../../style/css/main.css" rel="stylesheet">
    <link href="../../style/css/perfect-scrollbar.min.css" rel="stylesheet">
    <!-- <link href="http://cdn.jsdelivr.net/editor/0.1.0/editor.css" rel="stylesheet" > -->
    <script src="../../style/js/jquery.min.js"></script>
    <script src="../../style/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../style/js/md5.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../style/css/wangEditor.min.css">
    <script type="text/javascript" src="../../style/js/wangEditor.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- 问题记录 -->
        <!-- 滚动条: 需要样式contentHolder, 需要固定高度$('#content').height(winHeight - offset - 100);-->
        <!-- bootstrap居中: style="display:table; width:auto; margin-left:auto; margin-right:auto"  -->
        <!-- perfect 默认显示滚动条：always-visible -->
        <!-- 监听resize：$(window).resize(function() {});  -->
        <!-- 隐藏滚动条：overflow:hidden -->
        <!-- <h4>ThinkNote <small>Keep Thinking, Keep Noting</small></h4> -->
        <!-- <div id="content" class="content"></div> -->

        <div class="row clearfix">
            <div id="title-wrapper" class="col-md-3 title-border">
                
            </div>
            <div id="col-content-right" class="col-md-9">
                <!-- article title -->
                <div style="margin-top:10px; width:100%; ">
                    <div style="display:inline-block; width:65%; ">
                        <p contentEditable="true">点此添加标题点此添加标题点此添加标题点此添加标题点此添加标题点此添加标题</p>
                    </div>
                    <div id="articleRef" style="display:inline-block; width:14%; cursor: pointer; ">
                        全文参考
                    </div>
                    <div id="sectionRef" style="display:inline-block; width:14%; cursor: pointer;">
                        章节参考
                    </div>
                    <div style="display:inline-block;">
                        <button class="btn btn-success btn-xs">保存</button>
                    </div>
                </div>
                <!-- article title -->
                <!-- keywords -->
                <div id="tag-wrapper" class="tag-wrapper">
                </div>
                <!-- keywords -->
                <!-- reference -->
                <div id="reference" style="border:1px solid #ddd; padding:10px;">
                    <div class="addlink">
                        <a class="add" style="cursor:pointer;">新增</a>
                    </div>
                    <div class="reflist">
                        
                    </div>
                </div>
                <!-- reference -->
                <!-- 编辑器 -->
                <div id="section">
                    <div class="editor-wrapper">
                        <textarea id="editor" placeholder="Content here ...."></textarea>
                    </div>
                    <!-- <button class="btn btn-default btn-sm">保存</button> -->
                </div>
                <!-- 编辑器 -->
            </div>
        </div>
    </div>
<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%; height: 800px; margin: auto;">
        <div class="modal-content" style="width: 90%; height: 800px; margin: auto;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">模态框（Modal）标题</h4>
            </div>
            <div class="modal-body" >
                <input type="text" class="title" placeholder="标题, 可以不写">
                <div style="width:100%"> 
                    <div id="richText" style="height:400px;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary">提交更改</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
</body>
<script src="../../style/js/jquery-ui.min.js"></script>
<script src="../../style/js/title.js"></script>
<script src="../../style/js/tag.js"></script>
<!-- <script src="../../style/js/editor.js"></script>
<script src="../../style/js/marked.js"></script> -->
<script src="../../style/js/reference.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    // var editor = new Editor();
    // editor.render();
    // //editor.codemirror.getValue();

    var simplemde = new SimpleMDE();

    var title = new Title("title-wrapper", "section", simplemde);
    var tag = new Tag("tag-wrapper");"", "", "", ""
    var ref = new Reference({
        articleRef : "articleRef",
        sectionRef : "sectionRef",
        reference : "reference",
        modal : "myModal",
        submitBtn : "btn-primary",
        richText : "richText",
        section : "section",
    });
});
/*
1. 章节参考和全文参考都存在ARRAY里
2. 单独的AJAX去服务器请求可以解决新建文章和打开已有文章的矛盾
*/
function Reference(ids) {
    this.articleref = $("#" + ids.articleRef);
    this.sectionref = $("#" + ids.sectionRef);
    this.reference  = $("#" + ids.reference);
    this.modal = $("#" + ids.modal);
    this.submit = $("#" + ids.modal + " ." + ids.submitBtn);
    this.section = $("#" + ids.section);
    this.input = $("#" + ids.modal + " .title");
    console.log(this.input);
    this.add = $("#" + ids.reference + " .add");
    this.reflist = this.reference.children(".reflist");
    this.editor = new wangEditor(ids.richText);
    this.editor.create();
    this.which = 0;

    this.artlist = new Array(); // [{id, title, content}]
    this.seclist = new Array(); // [{id, secid:[{title, content},]}]
    this.init();
}

Reference.prototype = {
    init: function() {
        this.create();
        this.hide();
        this.bindEvent();

    },
    create: function(){
        // this.reference.append('');
        // this.add = this.reference.children(".add");
    },
    hide: function() {
        this.reference.hide();
    },
    show: function() {
        this.reference.show();
    },
    bindEvent: function() {
        var _this = this;
        // 如果
        _this.articleref.click(function(){
            if(1 == _this.which || 0 == _this.which) {
                _this.reference.toggle();
            } else {
                _this.flush(1);
                _this.show();
            }
            _this.which = 1;
        });
        _this.sectionref.click(function(){
            if(2 == _this.which || 0 == _this.which) {
                _this.reference.toggle();
            } else {
                _this.flush(2);
                _this.show();
            }
            _this.which = 2;
            _this.secid = _this.section.attr("secid");
        });
        _this.add.click(function(){
            _this.displayEditor();
        });
        _this.submit.click(function(){
            _this.saveRef();
        });
        _this.reflist.on("click", "a", function(){
            _this.aOnClick($(this));
        });
    },
    flush: function(flag) {
        this.reflist.empty();
        var list;
        if(1 == flag) {
            list = this.artlist;
        } else {
            for (var i = 0; i < this.seclist.length; i++) {
                if(this.secid == this.seclist[i].secid) {
                    list = this.seclist[i].list;
                    break;
                }
            }
        }
        var str = '';
        if(list) {
            for (var i = 0; i < list.length; i++) {
                str += '<a class="title" refid="' + list[i].id + '">' + list[i].title + '</a> <br />';
            }
            this.reflist.append(str);
        }
    },
    displayEditor: function() {
        this.modal.modal("show");
    },
    saveRef: function() {
        var html = this.editor.$txt.html();
        var text = this.editor.$txt.text();
        var title = this.input.val();
        if(title == "") {
            title = text.substring(0, 15);
        }
        console.log(title);
        if(this.which == 1) {
            console.log("文章");
            this.addArtRef(title, html);
        } else if(this.which == 2){
            console.log("章节");
            this.addSecRef(title, html);
        } else {
            console.log("NOTHING");
        }
        this.input.val("");
        this.editor.$txt.html('<p><br></p>');
        this.modal.modal("hide");
    },
    // [{title, content}]
    addArtRef: function(title, html) {
        var id = md5("articleref" + (new Date()).getTime());
        this.artlist.push({
            id : id,
            title : title,
            content : html,
        });
        this.reflist.append('<a class="title" refid="' + id + '">' + title + '</a> <br />');
        console.log(this.artlist);
    },
    // [{secid, list[{title, content},]}]
    addSecRef: function(title, html) {
        var len = this.seclist.length;
        var id = md5("sectionref" + (new Date()).getTime());
        for (var i = 0; i < len; i++) {
            var t = this.seclist[i];
            if(t.secid == this.secid) {
                t.list.push({
                    id : id,
                    title : title,
                    content : html,
                });
                break;
            }
        }
        if(i == len) {
            var o = {
                secid : this.secid,
                list : [ {
                    id : id,
                    title : title,
                    content : html,
                }]
            };
            this.seclist.push(o);
        }
        this.reflist.append('<a class="title" refid="' + id + '">' + title + '</a> <br />');
        console.log(this.seclist);
    },

    aOnClick: function(o){
        console.log(o);
        var refid = o.attr("refid");
        var list ;

        this.input.val("");
        this.editor.$txt.html('<p><br></p>');
        if(1 == this.which) {
            list = this.artlist;
        } else {
            for (var i = 0; i < this.seclist.length; i++) {
                if(this.secid == this.seclist[i].secid) {
                    list = this.seclist[i].list;
                    break;
                }
            }
        }
        if(list) {
            for (var i = 0; i < list.length; i++) {
                var obj = list[i];
                if(obj.id == refid) {
                    console.log(obj);
                    this.input.val(obj.title);
                    this.editor.$txt.html(obj.content);
                    this.displayEditor();
                    break;
                }
            }
        }

    },

};

/////////////////////////////////////////////////////////


</script>

</html>
