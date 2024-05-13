<?php
/**
 * 归档
 *
 * @package custom
 */
 $this->need('header.php'); ?>
<div id="m-container" class="container">
    <div class="row ml-0 mr-0">
        <div class="col-md-8 pl-0 pr-0">
            <div id="article-list">
                <article class="post-article clearfix">
                    <div>
                        <h2 class="title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                        <p class="post-big-info">
                            <span class="badge badge-skin"><i class="fa fa-fw fa-user"></i> <a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
                            <span class="badge badge-skin"><i class="fa fa-fw fa-tags"></i> <?php $this->category(','); ?></span>
                            <span class="badge badge-skin"><i class="fa fa-fw fa-calendar"></i> <?php $this->date('Y-m-d'); ?></span>
                            <span class="badge badge-skin"><i class="fa fa-fw fa-eye"></i> <?php $this->viewsNum(); ?> 次浏览</span>
                        </p>
                    </div>
                    <div class="article-content clearfix">
                        <div>
                            全站 <strong><?php $stat = Typecho_Widget::widget('Widget_Stat'); ?><?php echo $stat->PublishedPostsNum; ?></strong> 文 <strong><?php WordsCounter_Plugin::allOfCharacters(); ?></strong> 字，分以下类：
                        </div>
                        <div class="">
                            <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
                        </div>
                    </div>
                </article>
            </div>
            <div class="block">
                <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
                    $year=0; $mon=0; $i=0; $j=0;
                    $output = '<div id="archives">';
                    while($archives->next()):
                        $year_tmp = date('Y',$archives->created);
                        $mon_tmp = date('m',$archives->created);
                        $y=$year; $m=$mon;
                        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
                        if ($year != $year_tmp && $year > 0) $output .= '</ul>';
                        if ($year != $year_tmp) {
                            $year = $year_tmp;
                            $output .= '<h3>'. $year .' 年</h3><ul>'; //输出年份
                        }
                        if ($mon != $mon_tmp) {
                            $mon = $mon_tmp;
                            $output .= '<li><span>'. $mon .' 月</span><ul>'; //输出月份
                        }
                        $output .= '<li>'.date('d日: ',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a> <em>('. $archives->commentsNum.')</em></li>'; //输出文章日期和标题
                    endwhile;
                    $output .= '</ul></li></ul></div>';
                    echo $output;
                ?>
            </div>
            <?php $this->need('comments.php'); ?>
        </div>
        <div class="col-md-4">
            <aside id="sidebar">
                <aside>
                    <form method="get" id="searchform" class="form-inline clearfix" action="./">
                        <input class="form-control" name="s" id="s" placeholder="搜索关键词..." type="text">
                        <button class="btn btn-skin ml-1"><i class="fa fa-search"></i> 查找</button>
                    </form>
                </aside>
                <aside>
                    <div class="card widget-sets hidden-xs">
                        <ul class="nav nav-pills">
                            <!-- <li class=""><a class="nav-link active" href="#sidebar-new" data-toggle="tab">最新文章</a></li> -->
                            <li class="ml-1"><a class="nav-link active" href="#sidebar-comment" data-toggle="tab">最新评论</a></li>
                            <li class="ml-1"><a class="nav-link" href="#sidebar-rand" data-toggle="tab">随机文章</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- <div class="tab-pane nav bs-sidenav active in" id="sidebar-new">
                                <ul class="list-group">
                                    <?php 
                                    // $this->widget('Widget_Contents_Post_Recent', 'pageSize=7') ->parse('<li class="list-group-item clearfix"><a href="{permalink}">{title}</a></li>'); ?>
                                </ul>
                            </div> -->
                            <div class="tab-pane fade" id="sidebar-comment">
                                <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                                <ul class="list-group">
                                <?php while($comments->next()): ?>
                                    <li class="list-group-item clearfix"><?php $comments->author(false); ?>：<a href="<?php $comments->permalink(); ?>" target="_blank"><?php $comments->excerpt(35, '...'); ?></a></li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                            <div class="tab-pane nav bs-sidenav fade" id="sidebar-rand">
                                <?php theme_random_posts();?>
                            </div>
                        </div>
                    </div>
                </aside>
                <?php if(class_exists('Links_Plugin') && isset($this->options->plugins['activated']['Links'])): ?>
                <aside>
                    <div class="card card-skin hidden-xs">
                        <div class="card-header"><i class="fa fa-link fa-fw"></i> 友情链接</div>
                        <ul class="list-group">
                            <?php Links_Plugin::output('<li class="list-group-item"><a href="{url}" target="_blank" rel="noopener noreferrer">{name}</a></li>', 10, NULL, true); ?>
                        </ul>
                    </div>
                </aside>
                <?php endif; ?>
                <?php if(False): ?>
                <aside>
                    <div class="card card-skin hidden-xs">
                        <div class="card-header"><i class="fa fa-book fa-fw"></i> 文章分类</div>
                        <div class="list-group category">
                            <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
                        </div>
                    </div>
                </aside>
                <?php endif; ?>
                <div id="fixed"></div>
                <aside class="fixsidebar">
                    <div class="card card-skin hidden-xs">
                        <div class="card-header"><i class="fa fa-tags fa-fw"></i> 标签云</div>
                        <div id="meta-cloud">
                        <canvas height="300" id="mycanvas" style="width: 100%">
                            <p>标签云</p>
                            <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
                            <?php $this->widget('Widget_Metas_Tag_Cloud')->parse('<a href="{permalink}" class="tag">{name}</a>'); ?>
                        </canvas>
                        </div>
                    </div>
                </aside>

            </aside>
        </div>
    </div>
</div>
<?php $this->need('footer.php');
