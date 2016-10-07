<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
    <!-- <link href="/style/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="http://cdn.jsdelivr.net/editor/0.1.0/editor.css" rel="stylesheet" >
    <link href="/style/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="/style/css/main.css" rel="stylesheet">

    <script src="/style/js/jquery.min.js"></script>
    <script src="/style/js/perfect-scrollbar.jquery.min.js"></script>

      
</head>

<body>
    <div class="container">
        <!-- 标题 -->
        <div class="row clearfix">
            <div class="col-md-3 ">
            <!-- 网站名 -->
            <!-- <div style="float:left; height:40px; line-height:40px;">
                <h4>ThinkNote</h4>
            </div> -->
            <!-- 显示TAG的地方 -->
            <div style="float:left; margin-left:8px; margin-right:8px; height:40px; line-height:40px;">
                <span id="addTagGlyph" class="glyphicon glyphicon-plus" style="cursor:pointer;"></span>
            </div>
            <!-- <div id="tagView" style="float:left;width:19%;height:20px;overflow:hidden;"> height:auto --> 
            <div id="tagView" style="float:left;height:40px; line-height:36px;">
                    
                    <!-- <span id="notag"> 还没有标签哦</span> -->
                    
                    <span id="tag" class="label label-default">123</span>
                    <span id="tag" class="label label-default">123</span>
                    <span id="tag" class="label label-default">123</span>
                    <span id="tag" class="label label-default">123</span>
                    <span id="tag" class="label label-default">123</span>
                    
            </div>
            </div>
            <div class="col-md-9">
            <div style="float:left;height:40px; line-height:40px;">
                <!-- <p contentEditable="true"> -->点此添加标题点此添加标题点此添加标题点此添加标题点此添加标题点此添加标题
                <!-- </p> -->
            </div>
            <div style="float:right; height:40px; line-height:40px;">
                参考
            </div>
            <div style="float:right;  height:40px; line-height:40px;">
            <button class="btn btn-success btn-xs">保存</button>
            </div>
            </div>
        </div>

        <div id="tagWrapper" class="tagWrapper" style="position:fixed; display:none; width:360px; max-height:250px; overflow:auto; border:1px solid #ddd; padding:10px;">
            <div id="tag">
                <!-- <li>汽车</li><li>飞机</li><li>坦克</li><li>导弹</li> -->
            </div>

            <div>
                <input id="addTag" type="text" placeholder="回车增加标签"/>
                <button type="button" class="btn btn-default btn-sm" id="tagWrapperClose">关闭</button>
            </div>
        </div>
        <!-- 问题记录 -->
        <!-- 滚动条: 需要样式contentHolder, 需要固定高度$('#content').height(winHeight - offset - 100);-->
        <!-- bootstrap居中: style="display:table; width:auto; margin-left:auto; margin-right:auto"  -->
        <!-- perfect 默认显示滚动条：always-visible -->
        <!-- 监听resize：$(window).resize(function() {});  -->
        <!-- 隐藏滚动条：overflow:hidden -->
        <div class="row clearfix">
            <div id="title-wrapper" class="col-md-3 title-border">
                <div id="content" class="contentHolder" style="padding-top:0px;">
                    <div id="editContent">

                    </div>
                    <div id="displayContent">
                        
                    </div>
                </div>
                <div id="titleOpt" class="center" style="padding-top:20px;">
                    
                </div>
            </div>
            <div id="col-content-right" class="col-md-9">
                
                <div id="operation" style="height:30px;">
                    <div style="float:left;"><span id="section-title">xxxxxxx</span></div>
                    <div style="float:right;">
                        <button type="button" class="btn btn-default btn-xs">reference</button>
                    </div>
                </div>
                <!-- // -->
<div class="tab" role="tabpanel">
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist" style="margin-top:0px;" id="docTabs">
<li role="presentation" class="active"><a href="#Section_new"
aria-controls="home" role="tab" data-toggle="tab"> 最新最新最新最新最新最新最新最新最新最新</a></li>
<li role="presentation"><a href="#Section_week"
aria-controls="profile" role="tab" data-toggle="tab">7天热门7天热门7天热门7天热门7天热门7天热门7天热门</a></li>
<li role="presentation"><a href="#Section_month"
aria-controls="messages" role="tab" data-toggle="tab">30天热门</a></li>
<li role="presentation"><a href="#Section_week"
aria-controls="profile" role="tab" data-toggle="tab">7天热门</a></li>
<li role="presentation"><a href="#Section_month"
aria-controls="messages" role="tab" data-toggle="tab">30天热门</a></li>
<li role="presentation"><a href="#Section_week"
aria-controls="profile" role="tab" data-toggle="tab">7天热门</a></li>
<li role="presentation"><a href="#Section_month"
aria-controls="messages" role="tab" data-toggle="tab">30天热门</a></li>
<li role="presentation"><a href="#Section_week"
aria-controls="profile" role="tab" data-toggle="tab">7天热门</a></li>
<li role="presentation"><a href="#Section_month"
aria-controls="messages" role="tab" data-toggle="tab">30天热门</a></li>
<li role="presentation"><a href="#Section_week"
aria-controls="profile" role="tab" data-toggle="tab">7天热门</a></li>
<li role="presentation"><a href="#Section_month"
aria-controls="messages" role="tab" data-toggle="tab">30天热门</a></li>
<li role="presentation"><a href="#Section_week"
aria-controls="profile" role="tab" data-toggle="tab">7天热门</a></li>
<li role="presentation"><a href="#Section_month"
aria-controls="messages" role="tab" data-toggle="tab">30天热门</a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="Section_new">
<p>
    tab1中的内容
</p>
</div>
<div role="tabpanel" class="tab-pane fade" id="Section_week">
<p>
     tab2中的内容
</p>
</div>
<div role="tabpanel" class="tab-pane fade" id="Section_month">
<p>
    tab3中的内容
</p>
</div>
</div>
</div>

                <!-- // -->
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

</body>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/style/js/editor.js"></script>
<script src="/style/js/marked.js"></script>
<script type="text/javascript">
var g_winHeight = 0;


function initEditor() {
    var editor = new Editor();
    editor.render();
}

function setTitleWrapperHeight() {
    //浏览器当前窗口可视区域高度
    var winHeight = $(window).height();
    var offset = $("#content").offset().top;
    $('#content').height(winHeight - offset - 100);
    $('#title-wrapper').height(winHeight - offset);
}

function initScrollbar() {
    $('#content').perfectScrollbar();
}

function initTagWrapper() {
    //$("#tagWrapper").hide();

    $("#addTagGlyph").click(function(){
        setTagWrapperOffset();
        $("#tagWrapper").toggle();
    });

    $("#tagWrapper").on('click', 'li', function(){
        //alert($("#notag").length > 0);
        //<span id="notag"> 还没有标签哦</span>
        //console.log($(this));
        if ($(this).hasClass("in")) {
            $(this).removeClass("in");
            var curTag = $(this).text();
            //console.log($("#tagList #tag").length);
            $("#tagView #tag").each(function(){
                if( curTag == $(this).text()) {
                    $(this).remove();
                }
            });

            if($("#tagView #tag").length == 0) {
                $("#tagView").append('<span id="notag"> 还没有标签哦</span>');
            }
        } else {
            $(this).addClass("in");
            if($("#notag").length > 0) {
                $("#notag").remove();
            }

            $("#tagView").append('<span id="tag" class="label label-default">' + $(this).text() + '</span>');
        }

    });

    $("#tagWrapperClose").click(function(){
        $("#tagWrapper").toggle();
    });

    $("#addTag").keydown(function(event){
        //console.log(event);
        if(event.keyCode == 13){
             addTag($(this));
        }   
    });
}
// 1. 新建文章时初始化标题部分
// 2. 显示editContent, 隐藏displayContent
function initTitleContent() {
    addEditTitle(1);
    displayEditContent();
}

function initSortable() {
    $("#displayContent").sortable();
}

$(document).ready(function() {

    initEditor();
    
    setTitleWrapperHeight();

    initScrollbar();

    initTagWrapper();

    <?php if($flag == 'create') { ?>
    initTitleContent();
    addEditEvent();
    displayEnsure();
    <?php } ?>

    initSortable();
});

function hash(str) {
    var date = new Date();
    return str + date.getTime();
}
function addTag(obj) {
    //将tag显示
    $.ajax({
      type: 'POST',
      url: 'http://localhost/index.php/tag/add',
      data: {
        name:obj.val()
      },
      success: function(data) {
        console.log('success');
        console.log(data);
        $("#tagWrapper #tag").append("<li>" + obj.val() + "</li>");
        obj.val("");
      },
      error: function(data) {
        console.log('failed');
        console.log(data);
      },
      dataType: 'json'
    });
    //console.log($("#tagWrapper #tag").html());
    

    //传到数据库
}

// 窗口变化时需要
// 1. 重新计算标题栏高度，因为滚动条需要明确的高度
// 2. 更新滚动条
$(window).resize(function() {
    var winHeight = $(window).height(); //浏览器当前窗口可视区域高度
    var offset = $("#content").offset().top;
    $('#content').height(winHeight - offset - 100);
    $('#content').perfectScrollbar("update");
});



function addEditEvent() {

    $("#editContent").on("focus", "p", function() {
        // 清空预留字
        if ($(this).text() == "点击添加章节标题") {
            $(this).text("");
        }
        // 如果点击的是最后一个，新增
        var pLen = $("#editContent p").length;
        var seq = $(this).attr("seq");
        //alert('length ' + pLen + " seq " + seq);
        if (pLen == seq) {
            addEditTitle(parseInt(seq) + 1);
        }

    });

    // 失去焦点, 复制到对应的displayContent
    $("#editContent").on("blur", "p", function() {
        // 如果什么也没写，就恢复默认
        if ($(this).text() == "") {
            $(this).text("点击添加章节标题");
        } else {
            var seq = $(this).attr("seq");
            var text = $(this).text();
            $("#displayContent p").each(function(){
                if(seq == $(this).attr("seq")) {
                    $(this).text(text);
                }
            });
        }
    });

    $("#displayContent").on("click", "p", function(){
        openSection($(this));
    });
}

function reSequenceTitle() {
    var seq = 1;
    $("#editContent p").each(function(){
        $(this).attr("seq", seq);
        seq = seq + 1;
    });

    seq = 1;
    $("#displayContent p").each(function(){
        $(this).attr("seq", seq);
        seq = seq + 1;
    });
}


// 1. 删掉默认的没被修改的TITLE
// 2. 重排SEQ
function ensureTitle() {
    if($("#editContent p").length > 1) {
        cancelDefaultTitle();
        reSequenceTitle();
    }

    displayEditAndSort();
    hideEditContent();
    // $("#displayContent").sortable({disabled:true});
    $("#displayContent").sortable("option", "disabled", true);
    // $( ".selector" ).sortable({
    //   stop: function( event, ui ) {}
    // });
}

function editTitle() {
    displayEditContent();
    displayEnsure();
}

function dragTitle() {
    $("#displayContent").sortable("option", "disabled", false);
    displayEnsure();
}

function openSection(obj) {
    console.log(obj);
    $("#section-title").text(obj.text());
}

function setTagWrapperOffset() {
    var tagTop = $("#tagView").offset().top;
    var tagleft = $("#tagView").offset().left;
    var tagHeight = $("#tagView").height();

    $("#tagWrapper").css('left', tagleft - 12 + 'px');
    $("#tagWrapper").css('top', tagTop + tagHeight - 5 + 'px');
}


//子函数
//========================================================================

/*-----------------------------------------------------------------------
 * TITLE 
 *----------------------------------------------------------------------*/
function displayEditContent() {
    $("#editContent").css('display', 'block');
    $("#displayContent").css('display', 'none');
}

function hideEditContent() {
    $("#editContent").css('display', 'none');
    $("#displayContent").css('display', 'block');
}

function cancelDefaultTitle() {
    $("#editContent p").each(function() {
        if($(this).text() == "点击添加章节标题") {
            var seq = $(this).attr("seq");
            $("#displayContent p").each(function(){
                if(seq == $(this).attr("seq")) {
                    if($(this).text() == "点击添加章节标题") {
                        $(this).remove();
                    } else {
                        console.log("标题栏内容不一致");
                    }
                }
            });
            $(this).remove();
        }
    });
}

function displayEditAndSort() {
    var titleOpt = $("#titleOpt");
    var str = '<button class="btn btn-default btn-sm" onclick="editTitle();">编辑</button><button class="btn btn-default btn-sm" onclick="dragTitle()">排序</button>';
    titleOpt.empty();
    titleOpt.append(str);
}

function displayEnsure() {
    var titleOpt = $("#titleOpt");
    var str = '<button class="btn btn-default btn-sm" onclick="ensureTitle();">确定</button>';
    titleOpt.empty();
    titleOpt.append(str);
}

// 1. 增加TITLE, editContent与displayContent一一对应
// 2. 更新滚动条
// 3. 将滚动条移动到最下面
function addEditTitle(nextSeq) {
    var content = $("#content");
    var editContent = $("#editContent");
    var displayContent = $("#displayContent");
    var titid = hash('tit');

    editContent.append('<p seq="'+nextSeq+'" titid="'+titid+'" contentEditable="true">点击添加章节标题</p>');
    displayContent.append('<p seq="'+nextSeq+'" titid="'+titid+'" >点击添加章节标题</p>');

    content.perfectScrollbar("update");

    //将滚动条移动到最下面
    var divHeight = content.height();
    if (content.prop("scrollHeight") > divHeight) {
        content.scrollTop(content.prop("scrollHeight") - divHeight + 100);
        content.perfectScrollbar("update");
    }
}


</script>

</html>