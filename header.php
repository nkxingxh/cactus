<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if (!$_REQUEST['_pjax']) : ?>
    <!DOCTYPE html>
    <html lang="zh">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="HandheldFriendly" content="True">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="initial-scale=1,width=device-width,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="wap-font-scale" content="no">
        <meta http-equiv="Cache-Control" content="no-transform" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <meta property="og:type" content="blog" />
        <meta property="og:locale" content="zh_CN">
        <meta property="og:image" content="<?php if ($this->options->logoimg) : ?><?php $this->options->logoimg(); ?><?php else : ?><?php $this->options->themeUrl('images/logo.webp'); ?><?php endif; ?>">
        <meta property="og:site_name" content="<?php $this->options->title(); ?>">

        <?php if ($this->is('index')) : ?>
            <!-- <meta name="description" itemprop="description" content="<?php $this->options->description() ?>"> -->
            <meta property="og:url" content="<?php $this->options->siteUrl(); ?>" />
            <meta property="og:title" content="<?php $this->options->title(); ?>" />
            <meta property="og:author" content="<?php $this->author->name(); ?>" />
            <meta property="og:description" content="<?php $this->options->description(); ?>" />
        <?php endif; ?>

        <?php if ($this->is('post') || $this->is('page')) : ?>
            <!-- <meta name="description" itemprop="description" content="<?php $this->description(); ?>"> -->
            <meta property="og:url" content="<?php $this->permalink(); ?>" />
            <meta property="og:title" content="<?php $this->title(); ?> - <?php $this->options->title(); ?>" />
            <meta property="og:author" content="<?php $this->author(); ?>" />
            <meta property="og:description" content="<?php $this->description(); ?>" />
            <meta property="og:release_date" content="<?php $this->date(); ?>" />
        <?php endif; ?>

        <?php if ($this->is('tag') || $this->is('category')) : ?>
            <meta name="description" content="<?php
                    $this->archiveTitle(array(
                        'category' => _t('分类 %s 下的文章'),
                        'search' => _t('包含关键字 %s 的文章'),
                        'tag' => _t('标签 %s 下的文章'),
                        'author' => _t('%s 发布的文章')
                    ), '', ' - ');
                    $this->options->title(); ?>" />
        <?php endif; ?>

        <?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&commentReply='); ?>

        <title><?php
                $this->archiveTitle(array(
                    'category'  =>  _t('分类 %s 下的文章'),
                    'search'    =>  _t('包含关键字 %s 的文章'),
                    'tag'       =>  _t('标签 %s 下的文章'),
                    'author'    =>  _t('%s 发布的文章')
                ), '', ' - ');
                $this->options->title();
                if ($this->is('post')) {
                    echo ' - ';
                    $this->category(' - ', false, '未分类');
                    echo ' - ';
                    $this->tags('/', false, 'blog.nkxingxh.top');
                }
                ?></title>
        <?php if ($this->options->favicon) : ?>
            <link rel="shortcut icon" href="<?php $this->options->favicon(); ?>"><?php endif; ?>
        <?php if ($this->options->appleicon) : ?>
            <link rel="apple-touch-icon" sizes="180x180" href="<?php $this->options->appleicon(); ?>"><?php endif; ?>
        <link rel="manifest" href="<?php $this->options->themeUrl('/manifest.json'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
        <script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
        <script>
            document.addEventListener("error", function(e) {
                var elem = e.target;
                if (elem.tagName.toLowerCase() == 'img') {
                    elem.style.display = 'none'
                }
            }, true);
        </script>

        <?php if ($this->options->pjax == 'enable') : ?>
            <!-- PJAX -->
            <script src="https://cdn.staticfile.org/jquery.pjax/2.0.1/jquery.pjax.min.js" type="application/javascript"></script>
            <script>
                $(document).pjax('a', '#pjax-container', {
                    timeout: 3000
                });
            </script>
        <?php endif; ?>

        <script>
            var _hmt = _hmt || [];
            (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?2d8a5891cf8120815db57c86f5d23f17";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </head>

    <body>
        <div class="content index width mx-auto px3 my4" id="pjax-container">
        <?php else : ?>
            <script>
                document.title = "<?php echo addslashes($this->archiveTitle(array(
                                        'category'  =>  _t('分类 %s 下的文章'),
                                        'search'    =>  _t('包含关键字 %s 的文章'),
                                        'tag'       =>  _t('标签 %s 下的文章'),
                                        'author'    =>  _t('%s 发布的文章')
                                    ), '', ' - ') . $this->options->title()); ?>";
            </script>
        <?php endif; ?>