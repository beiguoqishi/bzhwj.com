var config = {
    jingpin_goods: {
        same_brand: {
            "title": {"show": "同品牌其他系列", "fixed": true},
            "fields": {
                "title": {"show": "名称"},
                "url": {"show": "链接"},
                "img": {"show": "图片", "input_type": "file"}
            }
        },
        other_brand: {
            "title": {"show": "其他品牌", "fixed": true},
            "fields": {
                "title": {"show": "名称"},
                "url": {"show": "链接"},
                "img": {"show": "图片", "input_type": "file"}
            }
        }
    },
    lunbo_1: {
        "title": {"show": "首页第一屏轮播图", "fixed": true},
        "fields": {
            "title": {"show": "标题"},
            "url":{"show":"链接"},
            "img":{"show":"图片","input_type":"file"},
            "style": {"show": "样式"}
        }
    }
};