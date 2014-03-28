<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link href="/themes/resource/js/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
<h1>美容院列表</h1>
<ul class="list-group store-list"></ul>
<script type="text/template" id="store_item">
<span class="name"><%=store_name%></span>
<a class="badge" href="/<%=store_id%>" target="_blank">编辑</a>
</script>
<script>
    var store_list = <?php echo $this->_var['stores']; ?>;
</script>
<script src="/themes/resource/js/require.js"></script>
<script src="/themes/resource/js/store_grade.js"></script>
</body>
</html>