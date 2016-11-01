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
    <script src="../../style/js/jquery.min.js"></script>
    <script src="../../style/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../style/js/md5.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                    <!-- <div id="tag-plus" class="disp mid">
                        <span id="glyph" class="glyphicon glyphicon-plus cursor"></span>
                    </div>
                    <div id="tag-view" class="disp top view">
                        <span id="none"> 还没有标签哦</span>
                    </div>
                    <div id="tag-more" class="disp more">
                        <span class="more">更多</span>
                    </div> -->
                </div>
                <!-- keywords -->
                <!-- <div id="operation" style="height:30px; display:block;">
                    <div style="float:left;"><span id="section-title">xxxxxxx</span></div>
                    <div style="float:right;">
                        <button type="button" class="btn btn-default btn-xs">reference</button>
                    </div>
                </div> -->
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
<script src="../../style/js/jquery-ui.min.js"></script>
<script src="../../style/js/title.js"></script>
<script src="../../style/js/tag.js"></script>
<script type="text/javascript">


/////////////////////////////////////////////////////////
var title = new Title("title-wrapper");
var tag = new Tag("tag-wrapper");

</script>

</html>
