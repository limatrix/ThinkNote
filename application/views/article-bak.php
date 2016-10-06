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
            <!-- 网站名 -->
            <div style="float:left; height:40px; line-height:40px;">
                <h4>ThinkNote</h4>
            </div>
            <!-- 显示TAG的地方 -->
            <div style="float:left; margin-left:8px; margin-right:8px; height:40px; line-height:40px;">
                <span id="addTagGlyph" class="glyphicon glyphicon-plus" style="cursor:pointer;"></span>
            </div>
            <!-- <div id="tagView" style="float:left;width:19%;height:20px;overflow:hidden;"> height:auto --> 
            <div id="tagView" style="float:left;width:17%; height:40px; line-height:36px;">
                    
                    <!-- <span id="notag"> 还没有标签哦</span> -->
                    
                    <span id="tag" class="label label-default">123</span>
                    <span id="tag" class="label label-default">123</span>
                    <span id="tag" class="label label-default">123</span>
                    <span id="tag" class="label label-default">123</span>
                    <span id="tag" class="label label-default">123</span>
                    
            </div>
            <div style="float:left;width:50%; height:40px; line-height:40px;">
                <!-- <p contentEditable="true"> -->点此添加标题点此添加标题点此添加标题点此添加标题点此添加标题点此添加标题
                <!-- </p> -->
            </div>
            <div style="float:left; height:40px; line-height:40px;">
                参考
            </div>
            <div style="float:right;  height:40px; line-height:40px;">
            <button class="btn btn-success btn-xs">保存</button>
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
                    <?php //if($flag == 'create') { ?>
                        <!-- <p><a seq="1" href="">点击添加章节标题</a></p>
                        <p><a seq="2" href="">点击添加章节标题</a></p>
                        <p><a seq="3" href="">点击添加章节标题</a></p> -->
                    <?php //} ?>
                </div>
                <div id="titleOpt" class="center" style="padding-top:20px;">
                    <button class="btn btn-default btn-sm" onclick="editTitle();">编辑</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-default btn-sm">排序</button>
                </div>
            </div>
            <div id="col-content-right" class="col-md-9">
                
                <div id="operation" style="height:30px;">
                    <div style="float:left;"><span id="section-title">xxxxxxx</span></div>
                    <div style="float:right;">
                        <button type="button" class="btn btn-default btn-xs">reference</button>
                    </div>
                    
                </div>
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
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/style/js/editor.js"></script>
<script src="/style/js/marked.js"></script>
<script type="text/javascript">
var g_winHeight = 0;

function hash(str) {
    var date = new Date();
    return str + date.getTime();
}




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

            $("#tagView").append('<span id="tag" class="label label-default spangap">' + $(this).text() + '</span>');
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

function initTitleDefault() {
    //title-wrapper content
    //<p seq="1" titid="">点击添加章节标题</p>
    $("#content").append('<p><a seq="1" href="" titid="' + hash('tit') + '">点击添加章节标题</a></p>');
}

$(document).ready(function() {

    initEditor();
    
    setTitleWrapperHeight();

    initScrollbar();

    initTagWrapper();

    <?php if($flag == 'create') { ?>
    initTitleDefault();
    editTitle();
    var articleId = hash('article');
    <?php } ?>
});

    // $("#content").on("click", "a", function(){
    //     //alert($(this).text());
    //     $("#section-title").text($(this).text());
    //     return false;
    // });

// 窗口变化时需要
// 1. 重新计算标题栏高度，因为滚动条需要明确的高度
// 2. 更新滚动条
$(window).resize(function() {
    var winHeight = $(window).height(); //浏览器当前窗口可视区域高度
    var offset = $("#content").offset().top;
    $('#content').height(winHeight - offset - 100);
    $('#content').perfectScrollbar("update");
});

// 需计算seq值
function addTitle(nextSeq) {
    $("#content").append("<p seq=\"" + nextSeq + "\" titid=\"" + hash("tit") + "\" contentEditable=\"true\">点击添加章节标题</p>");
    $('#content').perfectScrollbar("update");

    //将滚动条移动到最下面
    var divHeight = $("#content").height();
    if ($('#content').prop("scrollHeight") > divHeight) {
        $('#content').scrollTop($('#content').prop("scrollHeight") - divHeight + 100);
        $('#content').perfectScrollbar("update");
    }
}

function addEvent() {

    $("#content").on("click", "p", function() {
        // 清空预留字
        if ($(this).text() == "点击添加章节标题") {
            $(this).text("");
        }
        // 如果点击的是最后一个，新增
        var pLen = $("#content p").length;
        var seq = $(this).attr("seq");
        //alert('length ' + pLen + " seq " + seq);
        if (pLen == seq) {
            addTitle(parseInt(seq) + 1);
        }

    });

    // 失去焦点
    $("#content").on("blur", "p", function() {
        // 如果什么也没写，就恢复默认
        if ($(this).text() == "") {
            $(this).text("点击添加章节标题");
            return;
        }


    });
}

function saveHrefTitle() {
    var arr = [];
    $("#content a").each(function() {
        var seq = $(this).attr("seq");
        var titid = $(this).attr("titid");
        var text = $(this).text();
        arr.push("<p seq=\"" + seq + "\" titid=\"" + titid + "\" contentEditable=\"true\">" + text + "</p>");
    });
    console.log(arr);
    return arr;
}

function clearHrefTitle() {

    $("#content").empty(); //删除子元素 remove()连这个元素都删
}

function displayEditTitle(arr) {
    arr.forEach(function(p) {
        $("#content").append(p);
    });
}

function hideEditAndSort() {

    $("#titleOpt").empty();
}

function displaySave() {

    $("#titleOpt").append('<button class="btn btn-default btn-sm" onclick="saveTitle();">返回</button>');
}

function editTitle() {
    // 保存Href所有信息
    var arr = saveHrefTitle();
    // 清空
    clearHrefTitle();
    // 重新加载
    displayEditTitle(arr);
    // 添加事件
    addEvent();
    // 隐藏 编辑/排序
    hideEditAndSort();
    // 显示保存
    displaySave();
}
function savePTitle() {
    var arr = {};
    $("#content p").each(function(){
        var seq = $(this).attr("seq");
        var titid = $(this).attr("titid");
        var text = $(this).text();
        //<p><a seq="1" href="" titid="' + hash('tit') + '">点击添加章节标题</a></p>
        arr.push('<p><a seq="'+seq+'" href="" titid="'+titid+'">'+text+'</a></p>');
    });
    return arr;
}

function saveTitle() {
    var arr = savePTitle();
    
}


function openSection(obj) {
    console.log($(this));
    $("#section-title").text("ssss");
}

function setTagWrapperOffset() {
    var tagTop = $("#tagView").offset().top;
    var tagleft = $("#tagView").offset().left;
    var tagHeight = $("#tagView").height();

    $("#tagWrapper").css('left', tagleft - 12 + 'px');
    $("#tagWrapper").css('top', tagTop + tagHeight - 5 + 'px');
}
</script>

</html>